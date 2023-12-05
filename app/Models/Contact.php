<?php

namespace App\Models;

use App\Contracts\ContactShouldReceiveFields;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

class Contact extends Model implements ContactShouldReceiveFields
{
    use HasFactory, Notifiable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string, string, string, string, string, string, DateTime, array, string>
     */
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

    public function getUserId(): int
    {
        return $this->user_id;
    }

    // AUTH METHODS
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
