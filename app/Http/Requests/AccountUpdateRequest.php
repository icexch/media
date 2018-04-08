<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountUpdateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name'                 => 'required|string|max:255',
            'email'                => 'required|string|email|max:255|unique:users,email,' . $this->user()->id,
            'password'             => 'nullable|string|min:6',
            'profile'              => 'array',
            'profile.company_name' => 'nullable|string',
            'profile.city'         => 'nullable|string',
            'profile.country'      => 'nullable|string',
            'profile.phone'        => 'nullable|numeric'
        ];
    }
}