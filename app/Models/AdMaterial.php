<?php namespace App\Models;


class AdMaterial extends BaseModel
{
    protected $casts = [
        'name'       => 'string',
        'ad_type_id' => 'int',
        'cpc'        => 'double',
        'cpc_value'  => 'int',
        'cpv'        => 'double',
        'cpv_value'  => 'int'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adType()
    {
        return $this->belongsTo(AdType::class);
    }
}
