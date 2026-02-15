<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HorasSemanales extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_hora_semanal';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'tipo',
        'subtipo',
        'horas',
        'id_asignatura',
    ];

    public function asignatura(): BelongsTo
    {
        return $this->belongsTo(Asignatura::class, 'id_asignatura', 'id_asignatura');
    }
}
