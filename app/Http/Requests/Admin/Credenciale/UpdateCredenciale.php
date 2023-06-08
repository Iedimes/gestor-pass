<?php

namespace App\Http\Requests\Admin\Credenciale;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCredenciale extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.credenciale.edit', $this->credenciale);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'usuario' => ['sometimes', 'string'],
            'contraseña' => ['sometimes', 'string'],
            'enlace' => ['sometimes', 'string'],
            'servidor' => ['sometimes', ''],
            'tipodeconexion' => ['sometimes', ''],
            'estado' => ['sometimes', ''],
            'cat_informaciones' => ['sometimes', ''],
            'grupo' => ['sometimes', ''],

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




 public function getTipodeconexionId()
    {
        return $this->get('tipodeconexion')['id'];
    }

    public function getCatInformacioneId()
    {
        return $this->get('cat_informaciones')['id'];
    }


    public function getGrupoId()
    {
        return $this->get('grupo')['id'];
    }

    public function getEstadoId()
    {
        return $this->get('estado')['id'];
    }
}
