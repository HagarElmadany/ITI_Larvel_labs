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
        // dd($this->all());
        return [
            //
            'title' => ['required', 'min:3'],     //at least 3 chars
            'description' => ['required', 'min:5'], 
            'post_creator' => ['required', 'exists:users,id'],
            'image' => ['nullable', 'image', 'mimes:jpg,png', 'max:2048'],  //extensions are only(.jpg, .png)
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Override title required',
            'description.required' => 'Override description required',
            'image.image' => 'The image must be a valid image file.',
            'image.mimes' => 'The image must be a file of type: jpg, png.',
            'image.max' => 'The image size must not exceed 2MB.',
        ];
    }
}
