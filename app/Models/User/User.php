<?php namespace App\Models\User;

use App\Models\BaseModel;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Builder;
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

    protected $table = 'users';

    const MODERATOR_SLUG = 'moderator';
    const ADVERTISER_SLUG = 'advertiser';
    const PUBLISHER_SLUG = 'publisher';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
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

    public static function boot()
    {
        self::creating(function(User $user) {
            $user->role = static::ROLE;
        });
    }

    /**
     * {@inheritdoc}
     */
    public function newQuery()
    {
        $newBuilder = parent::newQuery();

        if (defined('static::ROLE')) {
            $newBuilder->whereRole(constant('static::ROLE'));
        }

        return $newBuilder;
    }

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
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeModerators(Builder $query)
    {
        return $query->where('role', Moderator::ROLE);
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeAdvertisers(Builder $query)
    {
        return $query->where('role', Advertiser::ROLE);
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopePublishers(Builder $query)
    {
        return $query->where('role', Publisher::ROLE);
    }

    /**
     * @param string $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @return bool
     */
    public function isModerator()
    {
        return $this->role === Moderator::ROLE;
    }

    /**
     * @return bool
     */
    public function isAdvertiser()
    {
        return $this->role === Advertiser::ROLE;
    }

    /**
     * @return bool
     */
    public function isPublisher()
    {
        return $this->role === Publisher::ROLE;
    }
}
