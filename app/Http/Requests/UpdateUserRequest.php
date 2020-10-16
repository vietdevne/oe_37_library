<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UpdateUserRequest extends FormRequest
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
    public function rules(User $user)
    {
        return [
            'fullname' => 'required|string|max:30',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->user->user_id.',user_id',
            'gender' => 'required|integer|in:0,1',
            'role' => 'required|integer|in:0,1',
            'phone' => 'nullable|string|min:10|max:11',
            'birthday' => 'nullable|date_format:Y-m-d|before:today',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => trans('admin.validation.required_fullname'),
            'gender.required' => trans('admin.validation.required_gender'),
            'role.required' => trans('admin.validation.required_role'),
            'birthday.date_format' => trans('admin.validation.format_date'),
            'birthday.before' => trans('admin.validation.before_date'),
            'email.unique' => trans('admin.validation.unique_email'),
        ];
    }
}
