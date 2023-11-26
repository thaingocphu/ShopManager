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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'price' => 'required|min:1',
            'active' => 'required|in:0, 1'

        ];
    }

    public function message(){
        return [
            'name.required' => 'plsease enter product name',
            'image.required' => 'plsease upload product image',
            'price.required' => 'plsease enter product price',
        ];

    }
}
