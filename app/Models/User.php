<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    const ROLE_CUSTOMER = 'customer';
    const ROLE_ADMIN = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isCustomer()
    {
        return $this->role === self::ROLE_CUSTOMER;
    }

    /**
     * The attributes that should be hidden for serialization.
     *ie:var here is a phpdoc ,that helps the ide to complete and understand the php code,used to define the type of variable
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *The return annotation in PHPDoc is used to specify the return type of a function or method
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // la relation entre user et reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
