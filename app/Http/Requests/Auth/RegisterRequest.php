<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'max:40'],
            'username' => ['required', 'max:40', 'unique:users'],
            'email' => ['required', 'email', 'unique:users', 'max:40'],
            'password' => ['required', 'min:6', 'max:30'],
            'phone' => ['required', 'integer', 'min_digits:6','max_digits:8'],
            'birthdate' => ['required', 'date'],
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
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener más de :max caracteres.',
            'username.required' => 'El usuario es obligatorio.',
            'username.max' => 'El usuario no puede tener más de :max caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo electrónico válida.',
            'email.unique' => 'No puedes ocupar este correo electrónico.',
            'email.max' => 'El correo electrónico no puede tener más de :max caracteres.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña no puede tener menos de :min caracteres.',
            'password.max' => 'La contraseña no puede tener mas de :max caracteres.',
            'phone.required' => 'El teléfono es obligatorio.',
            'phone.integer' => 'El teléfono es invalido',
            'phone.min_digits' => 'El teléfono no puede tener menos de :min dígitos.',
            'phone.max_digits' => 'El teléfono no puede tener más de :max dígitos.',
            'birthdate.required' => 'La fecha de nacimiento es obligatoria.',
            'birthdate.date' => 'La fecha de nacimiento debe ser una fecha válida.'
        ];
    }
}
