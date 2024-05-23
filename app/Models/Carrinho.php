<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carrinho extends Model
{
    use HasFactory;
    protected $table = 'carrinho';
    protected $fillable = [
        'userId',
        'finalizado'
    ];
    public function carrinho()
    {
        return $this->hasMany(ProdutoCarrinho::class, 'carrinhoId', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }


}
