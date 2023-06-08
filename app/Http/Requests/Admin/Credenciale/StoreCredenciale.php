<?php

namespace App\Http\Requests\Admin\Credenciale;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCredenciale extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.credenciale.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'usuario' => ['required', 'string'],
            'contraseña' => ['required', 'string'],
            'enlace' => ['required', 'string'],
            'fecha' => ['', 'date'],
            'servidor' => ['', ''],
            'tipodeconexion' => ['', ''],
            'estado' => ['', ''],
            'grupo' => ['', ''],

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

    public function getServidorId()
    {
        return $this->get('servidor')['id'];
    }


    public function getEstadoId()
    {
        return $this->get('estado')['id'];
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
