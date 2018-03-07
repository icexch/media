<?php namespace App\Models;

use App\Models\User\Advertiser;
use SleepingOwl\Admin\Traits\OrderableModel;

class AdMaterial extends BaseModel
{
    protected $casts = [
        'name'       => 'string',
        'user_id'    => 'int',
        'ad_type_id' => 'int',
        'is_active'  => 'bool',
        'url'        => 'string'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return string
     */
    public function getMaterialUrlAttribute()
    {
        if (isset($this->attributes['material_url'])) {
            return env('APP_URL') . '/' . $this->attributes['material_url'];
        }

        return null;
    }
}
