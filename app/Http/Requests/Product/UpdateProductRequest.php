<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'sku' => ['nullable', 'string', 'max:255', Rule::unique(Product::class, 'sku')->ignore($this->route('id'))],
            'quantity' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'name.string' => 'El nombre del producto debe ser un texto',
            'name.max' => 'El nombre del producto no debe ser mayor a :max caracteres',
            'sku.string' => 'El SKU del producto debe ser un texto',
            'sku.max' => 'El SKU del producto no debe ser mayor a :max caracteres',
            'sku.unique' => 'El SKU del producto ya está siendo utilizado',
            'quantity.required' => 'El campo cantidad es obligatorio',
            'quantity.integer' => 'La cantidad debe ser un número entero',
            'quantity.min' => 'La cantidad debe ser un número entero positivo',
            'price.required' => 'El campo precio es obligatorio',
            'price.numeric' => 'El precio debe ser un número',
            'price.min' => 'El precio debe ser un número positivo',
            'description.string' => 'La descripción del producto debe ser un texto',
            'image.image' => 'La imagen debe ser un archivo de imagen',
            'image.max' => 'La imagen no debe pesar más de :max kilobytes',
        ];
    }
}
