<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:100'],
            'sku' => ['nullable', 'max:50', 'unique:products,sku'],
            'quantity' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'max:500'],
            'image' => ['nullable', 'image', 'max:2048']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'name.max' => 'El campo nombre no debe ser mayor a :max caracteres',
            'sku.max' => 'El campo SKU no debe ser mayor a :max caracteres',
            'sku.unique' => 'El SKU del producto ya está siendo utilizado',
            'quantity.required' => 'El campo cantidad es obligatorio',
            'quantity.integer' => 'El campo cantidad debe ser un número entero',
            'quantity.min' => 'El campo cantidad debe ser mayor a :min',
            'price.required' => 'El campo precio es obligatorio',
            'price.numeric' => 'El campo precio debe ser un número',
            'price.min' => 'El campo precio debe ser mayor o igual a :min',
            'description.max' => 'El campo descripción no debe ser mayor a :max caracteres',
            'image.image' => 'El archivo debe ser una imagen',
            'image.max' => 'El archivo de imagen no debe pesar más de :max kilobytes'
        ];
    }
}
