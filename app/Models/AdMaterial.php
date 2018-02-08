<?php namespace App\Models;

use App\Models\User\Advertiser;

class AdMaterial extends BaseModel
{
    protected $casts = [
        'name'       => 'string',
        'user_id'    => 'int',
        'ad_type_id' => 'int',
        'cpc'        => 'double',
        'cpc_value'  => 'int',
        'cpv'        => 'double',
        'cpv_value'  => 'int',
        'is_active'  => 'bool'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function advertiser()
    {
        return $this->belongsTo(Advertiser::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adType()
    {
        return $this->belongsTo(AdType::class);
    }
}
