<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Imagens extends Model
{
    use HasFactory;
	protected $table = 'imagens_imoveis';
	public $timestamps = false;

	public function imovel(): BelongsTo
    {
        return $this->belongsTo(Imovel::class, 'id_imovel');
    }
}