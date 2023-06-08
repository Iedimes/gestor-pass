<?php

namespace App\Http\Requests\Admin\Servidor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateServidor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.servidor.edit', $this->servidor);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'grupo' => ['sometimes', ''],
            'ip' => ['sometimes', 'string'],
            'puerto' => ['sometimes', ''],
            'tipodeconexion' => ['sometimes', ''],

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

    public function getTipodeconexionId()
    {
        return $this->get('tipodeconexion')['id'];
    }


    public function getGrupoId()
    {
        return $this->get('grupo')['id'];


    }
}
