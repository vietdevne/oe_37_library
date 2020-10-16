<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'cate_name' => 'required',
            'parent_id' => 'sometimes|nullable|numeric',
            'cate_desc' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [ 
            'cate_name.required' => trans('admin.validation.required_cate_name'),
        ];
    }
}

