<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosCartao extends Model
{
    use HasFactory;
    protected $table = 'dadoscartao';
    protected $fillable = [
        'userId',
        'nome',
        'numero',
        'vencimento',
        'cvv',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    /**
     * Get all of the comments for the DadosCartao
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartao()
    {
        return $this->hasMany(DadosCartao::class, 'cartaoId', 'id');
    }
}
