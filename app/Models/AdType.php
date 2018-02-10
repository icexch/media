<?php namespace App\Models;

class AdType extends BaseModel
{
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adMaterials()
    {
        return $this->hasMany(AdMaterial::class);
    }
}
