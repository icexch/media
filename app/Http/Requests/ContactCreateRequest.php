<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactCreateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title'   => 'required|string|max:30',
            'email'   => 'required|email',
            'message' => 'required|string'
        ];
    }
}
