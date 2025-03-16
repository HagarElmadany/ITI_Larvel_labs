<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //if false, it will return 403 error so we need to change it to true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            //
            'title' => ['required', 'min:3'],     //at least 3 chars
            'description' => ['required', 'min:5'], 
            'post_creator' => ['required', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Override title required',
            'description.required' => 'Override description required',
        ];
    }
}
