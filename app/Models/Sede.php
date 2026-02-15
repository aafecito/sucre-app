<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sede extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_sede';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'descripcion',
        'codigo',
        'direccion',
        'telefono',
        'estado',
    ];

    public function carreras(): HasMany
    {
        return $this->hasMany(Carrera::class, 'id_sede', 'id_sede');
    }

    public function scopeActivas($query)
    {
        return $query->where('estado', 1);
    }
}
