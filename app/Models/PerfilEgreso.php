<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PerfilEgreso extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_perfil_egreso';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'descripcion',
        'numero',
        'estado',
        'id_carrera',
    ];

    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'id_carrera', 'id_carrera');
    }

    public function objetivosAprendizaje(): BelongsToMany
    {
        return $this->belongsToMany(
            ObjetivoAprendizaje::class,
            'objetivo_pdes',
            'id_perfil_egreso',
            'id_objetivo_aprendizaje',
            'id_perfil_egreso',
            'id_objetivo_aprendizaje'
        );
    }

    public function resultadosAprendizaje(): BelongsToMany
    {
        return $this->belongsToMany(
            ResultadoAprendizaje::class,
            'resultado_pdes',
            'id_perfil_egreso',
            'id_resultado_aprendizaje',
            'id_perfil_egreso',
            'id_resultado_aprendizaje'
        );
    }
}
