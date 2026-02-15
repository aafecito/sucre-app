<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tema extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tema';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'descripcion',
        'sustentacion',
        'numero',
        'semana',
        'numero_horas',
        'id_unidad',
    ];

    public function unidad(): BelongsTo
    {
        return $this->belongsTo(Unidad::class, 'id_unidad', 'id_unidad');
    }

    public function subtemas(): HasMany
    {
        return $this->hasMany(Subtema::class, 'id_tema', 'id_tema');
    }
}
