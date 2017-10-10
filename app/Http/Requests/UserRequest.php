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
            'email' => 'required|unique:users,email,'.$this->route('user'),
            'identification_card' => 'required',
            'name' => 'required',
            'password' => 'required|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'El :attribute es obligatorio.',
            'email.unique' => 'El :attribute que intenta registrar ya existe en la base de datos.',
            'identification_card.unique' => 'El :attribute que intenta registrar ya existe en la base de datos.',
            'name.required' => 'El :attribute es obligatorio',
            'password.required' => 'La :attribute es obligatoria',
            'password.confirmed' => 'La :attribute no coincide',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'correo',
            'name' => 'nombre',
            'password' => 'contraseña',
            'identification_card' => 'documento',
        ];
    }
}
