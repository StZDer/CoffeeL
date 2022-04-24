<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле название продукта является обязательным',
            'price.required' => 'Поле цена является обязательным',
            'description.required' => 'Поле описание является обязательным',
            'category_id.required' => 'Поле категория является обязательным'
        ];
    }
}
