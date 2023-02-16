<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResetPasswordRequest extends FormRequest
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
            'email' => ['required', 'email'],
            'code' => [
                'required',
                Rule::exists('reset_password_codes', 'code')->where(function ($query) {
                    $query->where('email', $this->email);
                }),
            ],
            'password' => ['required', 'min:8', 'confirmed'],
        ];
    }

        /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() : array
    {
        return [
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'Por favor introduce una dirección de correo electrónico válida.',
            'code.required' => 'El campo código es obligatorio.',
            'code.exists' => 'El código ingresado no es válido o ha expirado.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        ];
    }
}
