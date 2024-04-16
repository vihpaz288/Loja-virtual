<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produto';
    protected $fillable = [
        'nome',
        'valor',
        'quantidade',
        'descrição',
    ];
    public function Produtos()
    {
        return $this->hasMany(Carrinho::class, 'produtoID', 'id');
    }

    public function image()
    {
        return $this->hasMany(ImageProduto::class, 'produtoId', 'id');
    }

}

