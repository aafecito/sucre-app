<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjetivoPde extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_objetivo_pde';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_objetivo_aprendizaje',
        'id_perfil_egreso',
    ];

    // Esta es una tabla pivot que conecta ObjetivoAprendizaje con PerfilEgreso
    // Las relaciones se definen en los modelos ObjetivoAprendizaje y PerfilEgreso
}
