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
        'produtoID',
        'userId',
        'imageId',
        'quantidade',
        'finalizado'
    ];
    public function produtos()
    {
        return $this->belongsTo(Produto::class, 'produtoID', 'id');
    }
    public function image()
    {
        return $this->belongsTo(ImageProduto::class, 'imageId', 'id');
    }

    public function carrinho()
    {
        return $this->hasMany(Carrinho::class, 'carrinhoId', 'id');
    }
}
