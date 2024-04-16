<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $table = 'endereco';
    protected $fillable = [
        'userId',
        'nome',
        'Estado',
        'CEP',
        'cidade',
        'rua',
        'numero',
        'complemento',
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }
    /**
     * Get all of the comments for the Endereco
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedido()
    {
        return $this->hasMany(Endereco::class, 'enderecoId', 'id');
    }
}
