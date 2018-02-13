<?php namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class PlaceCreateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->isPublisher();
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|string|max:50',
            'region_id'   => 'exists:regions,id',
            'category_id' => 'required|exists:categories,id',
            'url'         => 'required|url',
            'ad_type_id'  => 'required|exists:ad_types,id'
        ];
    }
}
