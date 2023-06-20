<?php

namespace App\Http\Requests\Admin\CatInformacione;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCatInformacione extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.cat-informacione.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'credenciales_id' => ['required'],
            'tipo_debd_id' => ['required'],
            'nombredebd' => ['required', 'string'],
            'versiones' => ['required', 'string'],
            'ssl' => ['required', 'string'],
            'fecha_vec_dominio' => ['required', 'date'],
            'fecha_vec_ssl' => ['required', 'date'],
            'tipo_servicios_id' => [],

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
}
