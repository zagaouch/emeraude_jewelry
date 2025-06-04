<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'nom',
        'image'
    ];
// la relation entre produit et categorie

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}


