<?php

namespace App\Models;

use App\Contracts\ContactShouldReceiveFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 *  Fix error: Property accessed via magic method
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $personal_phone
 * @property string|null $work_phone
 * @property string|null $address
 * @property string|null $birthday
 * @property mixed|null $contact_groups
 * @property string $role
 * @property integer $created_at
 * @property integer $updated_at
 */
class Contact extends Model implements ContactShouldReceiveFields
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

    public function getUserId(): int
    {
        return $this->user_id;
    }

    // AUTH METHODS
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
    public function isStaff(): bool
    {
        return $this->role === 'staff';
    }
}
