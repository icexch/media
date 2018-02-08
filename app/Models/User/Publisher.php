<?php namespace App\Models\User;


use App\Models\Platform;

class Publisher extends User
{
    const ROLE = 3;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function platforms()
    {
        return $this->hasMany(Platform::class);
    }
}
