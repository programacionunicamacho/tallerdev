<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class PersonaFormRequest extends FormRequest
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
            
            'documento_identidad' => 'required',
            'nombre' => 'required',
            'email'=>'email',            

        ];
    }

    public function messages()
    {
       return [
           'documento_identidad.required' => 'El documento es un campo requerido',
           'nombre.required' => 'El nombre debe ser un campo requerido',
           'email.email' => 'El correo debe tener un formato correcto',
       ];
   }    
    

}
