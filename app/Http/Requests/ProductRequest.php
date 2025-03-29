<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name'=>'min:5|required',
            'description'=>'required',
            "price"=>'gt:0'
        ];

    }
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est requis',
            'name.min' => 'Le nom doi depasser  5 caracteres',
            'price.required' => 'le prix est requis ',
            'price.gt'=>'le prix doit etre positif',
        ];
    }
}
