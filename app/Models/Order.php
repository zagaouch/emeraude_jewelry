<?php
// app/Models/Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'subtotal',
        'shipping',
        'total',
        'status',
        'shipping_address',
        'shipping_city',
        'shipping_country',
        'shipping_zip',
        'payment_method'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}