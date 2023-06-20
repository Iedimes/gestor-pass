<?php

namespace App\Http\Requests\Admin\CatInformacione;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class IndexCatInformacione extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.cat-informacione.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'orderBy' => 'in:id,credenciales_id,tipo_debd_id,nombredebd,versiones,ssl,fecha_vec_dominio,fecha_vec_ssl,tipo_servicios_id|nullable',
            'orderDirection' => 'in:asc,desc|nullable',
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',

        ];
    }
}
