<?php namespace App\Models;

class AdType extends BaseModel
{
    protected $casts = [
        'name' => 'string',
        'cpc'        => 'double',
        'cpc_value'  => 'int',
        'cpv'        => 'double',
        'cpv_value'  => 'int',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adMaterials()
    {
        return $this->hasMany(AdMaterial::class);
    }
}
