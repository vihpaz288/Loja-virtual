<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'Pedido';
    protected $fillable = [
        'carrinhoId',
        'cartaoId',
        'enderecoId',
    ];

    /**
     * Get the user that owns the Pedido
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carrinho()
    {
        return $this->belongsTo(Carrinho::class, 'carrinhoId', 'id');
    }
    public function cartao()
    {
        return $this->belongsTo(DadosCartao::class, 'cartaoId', 'id');
    }
    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'enderecoId', 'id');
    }
}




