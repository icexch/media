<?php namespace App\Models;

use \App\Models\User\Publisher;

class Place extends BaseModel
{
    protected $casts = [
        'name'        => 'string',
        'user_id'     => 'int',
        'ad_type_id'  => 'int',
        'region_id'   => 'int',
        'category_id' => 'int',
        'is_active'   => 'bool',
        'url'         => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'user_id');
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
