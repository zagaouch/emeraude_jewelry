<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $fillable = [
        'nom',
        'description', 
        'prix',
        'image',
        'category_id',
        'rating',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'produit_id');
    }

    
    public function reviews()
    {
        return $this->hasMany(Review::class, 'produit_id');
    }

    public function userReviews()
        {
            /** @var \App\Models\User $user */
            //'user_id' is a column in database

            $user = Auth::user();
            return $this->hasMany(Review::class)->where('user_id', $user->id);
        }
//this function does note work yet
    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'produit_id');
    }
   
}
