<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SistemaDeEvaluacion extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_sistema_evaluacion';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'numero_unidad',
        'trabajo_autonomo',
        'evaluaciones_parciales',
        'trabajos_en_clase',
        'examen_parcial',
        'desarrollo_de_practicas',
        'proyecto_final',
        'id_asignatura',
    ];

    public function asignatura(): BelongsTo
    {
        return $this->belongsTo(Asignatura::class, 'id_asignatura', 'id_asignatura');
    }
}
