<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngModifyRequest extends FormRequest
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
            'precioIngr'=> 'numeric',
            'descripcionIngr'=>'max:50',
            'descripcionImagenIngr'=> 'max:50'
        ];
    }
}
