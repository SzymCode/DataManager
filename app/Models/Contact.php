<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int id
 * @property int user_id
 * @property string first_name
 * @property string last_name
 * @property string email
 * @property string personal_phone
 * @property string work_phone
 * @property string address
 * @property DateTime birthday
 * @property array contact_groups
 * @property string role
 */

class Contact extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'personal_phone',
        'work_phone',
        'address',
        'birthday',
        'contact_groups',
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
}
