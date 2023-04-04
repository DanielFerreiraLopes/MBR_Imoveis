<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Imovel extends Model
{
    use HasFactory;
	protected $table = 'imovel';
	public $timestamps = false;

	public function imagens(): HasMany
    {
        return $this->hasMany(Imagens::class, 'id_imovel');
    }

	public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
