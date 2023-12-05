<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int id
 * @property string name
 * @property string email
 * @property string password
 * @property string role
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->createContactFromUserDetails();
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // AUTH METHODS
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // CONTACT METHODS
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }
    private function createContactFromUserDetails(): void
    {
        $userId = $this->getAttribute('id');
        $userName = $this->getAttribute('name');
        $userEmail = $this->getAttribute('email');

        $contactData = [
            'user_id' => $userId,
            'first_name' => $userName,
            'email' => $userEmail
        ];

        $this->contacts()->create($contactData);
    }
}
