<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
    'nome',
    'preco',
    'quantidade',
    'descricao',
    'categoria_id',
    'marca_id',
    'fornecedor_id',

    ];

    public function categoria (): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }

}
