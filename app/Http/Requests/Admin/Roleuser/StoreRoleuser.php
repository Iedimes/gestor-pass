<?php

namespace App\Http\Requests\Admin\Roleuser;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreRoleuser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.roleuser.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'admin_users_id' => 'required|unique:roleusers|max:255',
            'role_id' => ['required'],

        ];
    }

    public function messages()
    {
        return [
            'admin_users_id.required' => 'Debe cargar un usuario.',
            'admin_users_id.unique' => 'El usuario que desea agregar, ya cuenta con un rol asignado.',
            'role_id.required' => 'Debe cargar un rol.',
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
    public function getRolId()
    {
        return $this->get('role')['id'];
    }
}
