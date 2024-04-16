<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduto extends Model
{
    use HasFactory;
    protected $table = 'image_produto';
    protected $fillable = [
        'produtoId',
        'image',

    ];

    public function produto()
    {
        return $this->belongsTo(User::class, 'produtoId', 'id');
    }
    /**
     * Get all of the comments for the ImageProduto
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function image()
    {
        return $this->hasMany(ImageProduto::class, 'imageId', 'id');
    }
}
