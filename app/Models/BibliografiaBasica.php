<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BibliografiaBasica extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_bibliografia_basica';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'numero',
        'descripcion',
        'sustentacion',
        'id_asignatura',
    ];

    public function asignatura(): BelongsTo
    {
        return $this->belongsTo(Asignatura::class, 'id_asignatura', 'id_asignatura');
    }
}
