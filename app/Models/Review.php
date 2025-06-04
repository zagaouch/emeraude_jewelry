<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   protected $fillable = [
    'produit_id', 
    'user_id',
    'note',
    'commentaire'
];

public function product()
{
    return $this->belongsTo(Product::class, 'produit_id');
}

public function user()
{
    return $this->belongsTo(User::class);
}
}
