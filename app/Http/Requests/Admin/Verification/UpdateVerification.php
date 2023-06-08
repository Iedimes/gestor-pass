<?php

namespace App\Http\Requests\Admin\Verification;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateVerification extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.verification.edit', $this->verification);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'admin_users_id' => ['sometimes', ''],
            'password' => ['required', 'confirmed', 'min:7', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/', 'string'],

        ];
    }

    public function messages()
    {
        return [
            'admin_users_id.required' => 'Debe cargar un usuario.',
            'admin_users_id.unique' => 'El usuario al que desea colocar una contraseña, ya tiene una contraseña asignada.',
            'password.required' => 'Debe cargar una contraseña.',
            'password.min' => 'La contraseña debe tener un minimo de 7 caracteres.',
            'password.confirmed' => 'La contraseña de verificación no coincide.',
            'password.regex' => 'No cumple con el formato de contraseña solicitado.',

        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }

    // public function getUsuarioId()
    // {
    //     return $this->get('admin_users_id')['id'];
    // }
}
