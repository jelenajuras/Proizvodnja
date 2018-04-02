<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CabinetRequest extends FormRequest
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
            'id' 	=> 'required|min:3',
			'projekt_id'  => 'required',
			'naziv'  => 'required',
			'velicina'  => 'required',
			'tip'  => 'required',
			'model'  => 'required',
			'materijal'  => 'required',
			'izvedba'  => 'required'
        ];
    }
	
	public function messages()
	{
		return [
			'id.required'	 => 'Unos broja ormara je obavezan!',
			'id.min'	 => 'Broj ormara treba imati minimalno 5 brojeva!',
			'projekt_id.required'  => 'Unos projekta je obavezan!',
			'naziv.required'  => 'Unos projekta je obavezan!',
			'tip.required'  => 'Unos projekta je obavezan!',
			'model.required'  => 'Unos projekta je obavezan!',
			'materijal.required'  => 'Unos projekta je obavezan!',
			'velicina.required'  => 'Unos projekta je obavezan!',
			'izvedba.required'  => 'Unos projekta je obavezan!'
		];
	}
}