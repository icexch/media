<?php namespace App\Models\User;


use App\Models\Place;

class Publisher extends User
{
    const ROLE = 3;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function places()
    {
        return $this->hasMany(Place::class);
    }
}
