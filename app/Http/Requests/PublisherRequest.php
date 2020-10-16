<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
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
            'pub_name' => 'required|unique:publishers',
            'pub_desc' => 'required',
            'pub_logo' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'pub_name.required' => trans('admin.validate_publisher.name_required'),
            'pub_name.unique' => trans('admin.validate_publisher.name_unique'),
            'pub_desc.required' => trans('admin.validate_publisher.pub_desc'),
            'pub_logo.required' => trans('admin.validate_publisher.pub_logo'), 
        ];
    }
}
