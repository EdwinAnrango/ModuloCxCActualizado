<?php

namespace cuentasCobrar\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CajeroFormRequest extends FormRequest
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
            
        'nombrecajero'=>'required|max:200|string',
        'fechanacimiento'=>'required|date|before_or_equal:yesterday',
        'ciudadnacimiento'=>'required|max:100|alpha',
        'direccion'=>'required|max:200',
        'telefono'=>'required|max:999999999|min:1000000|numeric',
        'email'=>'required|max:100|email',
        'idusuario'=>'required',
        'estado'=>'1',
        ];
    }

    public function messages()
    {
        return [
        'idcajero.min'=>'El numero de cédula consta de minimo 10 números',
        'idcajero.max'=>'El numero de ruc o pasaporte exedio el campo',
        'fechanacimiento.before_or_equal'=>'La fecha debe ser inferior a la actual',
        'telefono.min'=>'el numero de teléfono debe tener minimo 7 dígitos',
        'telefono.max'=>'el numero de teléfono debe tener maximo 9 dígitos sin el 0 inicial',
        'telefono.numeric'=>'El campo teléfono solo reconoce numeros',
           ];

    }
}
