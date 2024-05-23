<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'Pedido';
    protected $fillable = [
        'produtoCarrinhoId',
        'cartaoId',
        'enderecoId',
        'statusId',
    ];

    /**
     * Get the user that owns the Pedido
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function cartao()
    {
        return $this->belongsTo(DadosCartao::class, 'cartaoId', 'id');
    }
    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'enderecoId', 'id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'statusId', 'id');
    }
    public function produtoCarrinho()
    {
        return $this->belongsTo(ProdutoCarrinho::class, 'produtoCarrinhoId', 'id');
    }
}




