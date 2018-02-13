<?php namespace App\Http\Requests;

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
        return [
            'name'        => 'required|string|max:50',
            'ad_type_id'  => 'required|exists:ad_types,id',
            'region_id'   => 'exists:regions,id',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
