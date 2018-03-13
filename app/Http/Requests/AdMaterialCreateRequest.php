<?php namespace App\Http\Requests;

use App\Models\AdMaterial;
use Illuminate\Foundation\Http\FormRequest;

class AdMaterialCreateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->isAdvertiser();
    }

    /**
     * @return array
     */
    public function rules()
    {
        $sourceRule = $this->input('type') === AdMaterial::TYPE_IMG ? 'image|max:102400' : 'string';

        return [
            'name'        => 'required|string|max:50',
            'ad_type_id'  => 'required|exists:ad_types,id',
            'region_id'   => 'exists:regions,id',
            'category_id' => 'required|exists:categories,id',
            'source'      => 'required|' . $sourceRule,
            'type'        => 'required|in:' . implode(',', [AdMaterial::TYPE_IMG, AdMaterial::TYPE_HTML]),
            'ad_url'      => 'url'
        ];
    }
}
