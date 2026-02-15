<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ObjetivoAprendizaje extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_objetivo_aprendizaje';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'descripcion',
        'numero',
        'tipo',
        'id_asignatura',
    ];

    public function asignatura(): BelongsTo
    {
        return $this->belongsTo(Asignatura::class, 'id_asignatura', 'id_asignatura');
    }

    public function perfilEgresos(): BelongsToMany
    {
        return $this->belongsToMany(
            PerfilEgreso::class,
            'objetivo_pdes',
            'id_objetivo_aprendizaje',
            'id_perfil_egreso',
            'id_objetivo_aprendizaje',
            'id_perfil_egreso'
        );
    }
}
