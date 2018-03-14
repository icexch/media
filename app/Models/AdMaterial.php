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
        'type'       => 'string',
        'source'     => 'string',
        'hash'     => 'string'
    ];

    const TYPE_IMG = 'IMG';
    const TYPE_HTML = 'HTML';

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
}
