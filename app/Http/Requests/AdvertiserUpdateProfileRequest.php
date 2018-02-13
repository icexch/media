<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertiserUpdateProfileRequest extends FormRequest
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
            'name'                 => 'required|string|max:255',
            'email'                => 'required|string|email|max:255|unique:users,email,' . $this->user()->id,
            'profile'              => 'array',
            'profile.company_name' => 'string',
            'profile.city'         => 'string',
            'profile.country'      => 'string',
            'profile.phone'        => 'numeric'
        ];
    }
}