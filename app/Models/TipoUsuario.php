<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoUsuario extends Model
{
    use HasFactory;

    protected $table = 'tipo_usuario';
    protected $primaryKey = 'id_tipo_usuario';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'descripcion',
        'estado',
    ];

    public function usuarios(): HasMany
    {
        return $this->hasMany(Usuario::class, 'id_tipo_usuario', 'id_tipo_usuario');
    }
}
