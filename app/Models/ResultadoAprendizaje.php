<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ResultadoAprendizaje extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_resultado_aprendizaje';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'descripcion',
        'numero',
        'estado',
    ];

    public function perfilEgresos(): BelongsToMany
    {
        return $this->belongsToMany(
            PerfilEgreso::class,
            'resultado_pdes',
            'id_resultado_aprendizaje',
            'id_perfil_egreso',
            'id_resultado_aprendizaje',
            'id_perfil_egreso'
        );
    }
}
