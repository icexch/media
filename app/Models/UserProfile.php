<?php namespace App\Models;

class UserProfile extends BaseModel
{
    protected $casts = [
        'name'         => 'string',
        'company_name' => 'string',
        'city'         => 'string',
        'country'      => 'string',
        'phone'        => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
