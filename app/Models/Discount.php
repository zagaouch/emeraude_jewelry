<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Discount extends Model
{
    protected $table = 'remises';
    protected $primaryKey = 'remise_id';

  
    protected $fillable = [
        'code',
        'montant_remise',
        'type',
        'date_expiration',
        'max_uses',
    ];

    public function commandes(): HasMany
    {
        return $this->hasMany(Order::class, 'remise_id');
    }

    // Cleaned and unified isActive method
    public function isActive(): bool
    {
        // Check if expired
        if ($this->date_expiration && now()->gt($this->date_expiration)) {
            return false;
        }

        // Check usage limit
        
        return true;
    }
   
    public function getRouteKeyName()
    {
        return 'remise_id'; // Use remise_id for route binding
    }
}

