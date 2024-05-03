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
    public function Produtos()
    {
        return $this->belongsTo(Produto::class, 'produtoId', 'id');
    }

    public function carrinho()
    {
        return $this->belongsTo(Carrinho::class, 'carrinhoId', 'id');
    }

}
