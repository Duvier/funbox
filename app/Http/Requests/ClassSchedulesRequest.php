<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassSchedulesRequest extends FormRequest
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
            'date' => 'required',
            'time' => 'required',
            'quotas' => 'required',
            'users_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'date.required' => 'La :attribute es obligatorio.',
            'time.required' => 'La :attribute es obligatorio',
            'quotas.required' => 'La :attribute es obligatorio',
            'users_id.required' => 'El :attribute es obligatorio',
        ];
    }

    public function attributes()
    {
        return [
            'date' => 'fecha',
            'time' => 'hora',
            'quotas' => 'cuota',
            'users_id' => 'usuario',
        ];
    }
}
