<?php

namespace App\Http\Requests\Admin\Servidor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreServidor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.servidor.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'grupo' => ['', ''],
            'ip' => ['required', 'string'],
            'puerto' => ['required', 'string'],
            'tipodeconexion' => ['required', ''],

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
    public function getGrupoId()
    {
        return $this->get('grupo')['id'];


    }

    public function getTipodeconexionId()
    {
        return $this->get('tipodeconexion')['id'];
    }
}
