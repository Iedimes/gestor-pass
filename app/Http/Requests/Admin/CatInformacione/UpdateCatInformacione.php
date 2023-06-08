<?php

namespace App\Http\Requests\Admin\CatInformacione;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCatInformacione extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.cat-informacione.edit', $this->catInformacione);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'credenciales_id' => ['sometimes', 'string'],
            'tipo_debd_id' => ['sometimes', 'string'],
            'nombredebd' => ['sometimes', 'string'],
            'versiones' => ['sometimes', 'string'],
            'ssl' => ['sometimes', 'string'],
            'fecha_vec_dominio' => ['sometimes', 'date'],
            'fecha_vec_ssl' => ['sometimes', 'date'],
            
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
