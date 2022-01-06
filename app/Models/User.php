<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use \Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * App\Models\User
 *
 * @property int    $id
 * @property string $name
 * @property string $surname
 * @property string $username
 * @property string $phone
 * @property string $email
 * @property string $password
 * @property Carbon $email_verified_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function swipe(): MorphMany
    {
        return $this->morphMany(Swipe::class, 'swipeable');
    }

    public function chats()
    {
//        return $this->hasMany(Chat::class);
    }
}
