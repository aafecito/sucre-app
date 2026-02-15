<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DocenteAsignatura extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_docente_asignatura';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'requisito_experiencia_docente',
        'id_docente',
        'id_asignatura',
    ];

    public function docente(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_docente', 'id_usuario');
    }

    public function asignatura(): BelongsTo
    {
        return $this->belongsTo(Asignatura::class, 'id_asignatura', 'id_asignatura');
    }

    // Esta es una tabla pivot que conecta User (docentes) con Asignatura
    // Las relaciones belongsToMany se definen en los modelos User y Asignatura
}
