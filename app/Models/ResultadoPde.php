<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadoPde extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_resultado_aprendizaje_pde';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_resultado_aprendizaje',
        'id_perfil_egreso',
    ];

    // Esta es una tabla pivot que conecta ResultadoAprendizaje con PerfilEgreso
    // Las relaciones se definen en los modelos ResultadoAprendizaje y PerfilEgreso
}
