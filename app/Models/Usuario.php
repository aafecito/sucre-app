<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Usuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_usuario';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'tipo',
        'estado',
        'id_user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function asignaturasAsignadas(): BelongsToMany
    {
        return $this->belongsToMany(
            Asignatura::class,
            'docente_asignaturas',
            'id_docente',
            'id_asignatura',
            'id_usuario',
            'id_asignatura'
        )->withPivot('requisito_experiencia_docente')
            ->withTimestamps();
    }

    public function scopeActivas($query)
    {
        return $query->where('estado', 1);
    }
}
