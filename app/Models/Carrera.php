<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Carrera extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_carrera';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'descripcion',
        'codigo',
        'semestres',
        'estado',
        'id_sede',
    ];

    public function sede(): BelongsTo
    {
        return $this->belongsTo(Sede::class, 'id_sede', 'id_sede');
    }

    public function asignaturas(): HasMany
    {
        return $this->hasMany(Asignatura::class, 'id_carrera', 'id_carrera');
    }

    public function perfilEgresos(): HasMany
    {
        return $this->hasMany(PerfilEgreso::class, 'id_carrera', 'id_carrera');
    }

    public function scopeActivas($query)
    {
        return $query->where('estado', 1);
    }
}
