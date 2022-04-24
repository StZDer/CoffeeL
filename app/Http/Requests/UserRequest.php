<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:9'],
            'dob' => ['required', 'date'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'group' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Поле имя является обязательным',
            'phone.required' => 'Поле номера телефона является обязательным',
            'dob.required' => 'Поле дата рождения является обязательным',
            'gender.required' => 'Поле пол является обязательным',
            'email.required' => 'Поле email является обязательным',
            'group.required' => 'Поле группы прав является обязательным',
            'name.max' => 'Поле имя может содержать максимум 255 символов',
            'dob.date' => 'Поле даты рождения может содержать только дату',
            'email.email' => 'Поле email должно подходить под формат email',
        ];
    }
}
