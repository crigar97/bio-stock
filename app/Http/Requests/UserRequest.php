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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Es obligatorio proporcionar un nombre.',
            'email.required'  => 'Es obligatorio proporcionar un email.',
            'email.email' => 'Debes proporcional un email válido.',
            'email.unique' => 'El email proporcionado ya pertenece a un usuario.',
            'password.required' => 'Es obligatorio proporcionar una contraseña.',
            'password.min' => 'La contraseña debe de constar de 4 caracteres mínimo.'
        ];
    }
}
