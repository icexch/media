<?php namespace App\Models;

class Platform extends BaseModel
{
    protected $casts = [
        'user_id'     => 'int',
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
        return $this->belongsTo(\App\Models\User\Publisher::class, 'user_id');
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
