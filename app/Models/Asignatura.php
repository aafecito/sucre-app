<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Asignatura extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_asignatura';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'descripcion',
        'codigo',
        'tipo',
        'semestre',
        'educacion_ambiental',
        'estado',
        'id_carrera',
    ];

    public function carrera(): BelongsTo
    {
        return $this->belongsTo(Carrera::class, 'id_carrera', 'id_carrera');
    }

    public function objetivosAprendizaje(): HasMany
    {
        return $this->hasMany(ObjetivoAprendizaje::class, 'id_asignatura', 'id_asignatura');
    }

    public function unidades(): HasMany
    {
        return $this->hasMany(Unidad::class, 'id_asignatura', 'id_asignatura');
    }

    public function horasSemanales(): HasMany
    {
        return $this->hasMany(HorasSemanales::class, 'id_asignatura', 'id_asignatura');
    }

    public function practicasMinimas(): HasMany
    {
        return $this->hasMany(PracticaMinima::class, 'id_asignatura', 'id_asignatura');
    }

    public function sugerenciasDidacticas(): HasMany
    {
        return $this->hasMany(SugerenciaDidactica::class, 'id_asignatura', 'id_asignatura');
    }

    public function formasDeEvaluar(): HasMany
    {
        return $this->hasMany(FormaDeEvaluar::class, 'id_asignatura', 'id_asignatura');
    }

    public function sistemasDeEvaluacion(): HasMany
    {
        return $this->hasMany(SistemaDeEvaluacion::class, 'id_asignatura', 'id_asignatura');
    }

    public function bibliografiasBasicas(): HasMany
    {
        return $this->hasMany(BibliografiaBasica::class, 'id_asignatura', 'id_asignatura');
    }

    public function docentesAsignados(): BelongsToMany
    {
        return $this->belongsToMany(
            Usuario::class,
            'docente_asignaturas',
            'id_asignatura',
            'id_docente',
            'id_asignatura',
            'id_usuario'
        )->withPivot('requisito_experiencia_docente')
            ->withTimestamps();
    }

    public function scopeActivas($query)
    {
        return $query->where('estado', 1);
    }
}
