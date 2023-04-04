<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    use HasFactory;
	protected $table = 'usuario';
	public $timestamps = false;

	public function imoveis(): HasMany
    {
        return $this->hasMany(Imovel::class, 'id_usuario');
    }
}
