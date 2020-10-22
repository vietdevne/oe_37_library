<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBookRequest extends FormRequest
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
            'book_title' => 'required',
            'cate_id' => 'required',
            'author_id' => 'required',
            'pub_id' => 'required',
            'quantity' => 'required|numeric|min:0|max:1000',
            'book_desc' => 'nullable',
            'book_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'book_title.required' => trans('admin.validate_author.name_required'),
            'author_name.unique' => trans('admin.validate_author.name_unique'),
            'author_desc.required' => trans('admin.validate_author.author_desc'),
            'author_avatar.required' => trans('admin.validate_author.author_avatar'), 
        ];
    }
}
