<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'min:3',
                Rule::unique('posts', 'title')->ignore($this->route('post')), 
            ],
            'description' => 'required|min:10',
            'post_creator' => [
                'required',
                'exists:users,id'
            ],
            'image' => 'nullable|image|mimes:jpg,png|max:2048' 
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title is required!',
            'title.min' => 'The title must be at least 3 characters long!',
            'title.unique' => 'This title is already in use!',
            'description.required' => 'The description is required!',
            'description.min' => 'The description must be at least 10 characters long!',
            'post_creator.required' => 'The post creator must be specified!',
            'post_creator.exists' => 'This user does not exist!',
            'image.image' => 'The file must be an image!',
            'image.mimes' => 'The image must be in jpg or png format!',
            'image.max' => 'The image size must not exceed 2MB!',
        ];
    }
}
