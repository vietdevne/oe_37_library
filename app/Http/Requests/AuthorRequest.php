<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'author_name' => 'required|unique:authors',
            'author_desc' => 'required',
            'author_avatar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'author_name.required' => trans('admin.validate_author.name_required'),
            'author_name.unique' => trans('admin.validate_author.name_unique'),
            'author_desc.required' => trans('admin.validate_author.author_desc'),
            'author_avatar.required' => trans('admin.validate_author.author_avatar'), 
        ];
    }
}
