<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoCarrinho extends Model
{
    use HasFactory;
    protected $table = 'produtocarrinho';
    protected $fillable = [
        'produtoId',
        'carrinhoId',
        'quantidade',
        'valor',
    ];

    // Altere este método de 'belongsTo' para 'hasMany'
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'id', 'produtoId');
    }

    public function carrinho()
    {
        return $this->belongsTo(Carrinho::class, 'carrinhoId', 'id');
    }
}
