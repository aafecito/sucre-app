<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subtema extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_sub_tema';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'descripcion',
        'numero',
        'id_tema',
    ];

    public function tema(): BelongsTo
    {
        return $this->belongsTo(Tema::class, 'id_tema', 'id_tema');
    }
}
