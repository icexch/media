<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends BaseModel implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Notifiable, Authenticatable, Authorizable, CanResetPassword;

    const MODERATOR_ROLE = 1;
    const ADVERTISER_ROLE = 2;
    const PUBLISHER_ROLE = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Role mutator, protect against change.
     *
     * @param $val
     */
    public function setRoleAttribute($val)
    {
        if (defined('static::ROLE') && constant('static::ROLE') !== (int)$val) {
            throw new \LogicException('Trying to change user type');
        }

        $this->attributes['role'] = $val;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id');
    }

    /**
     * @return bool
     */
    public function isModerator()
    {
        return $this->role === self::MODERATOR_ROLE;
    }

    /**
     * @return bool
     */
    public function isAdvertiser()
    {
        return $this->role === self::ADVERTISER_ROLE;
    }

    /**
     * @return bool
     */
    public function isPublisher()
    {
        return $this->role === self::PUBLISHER_ROLE;
    }
}
