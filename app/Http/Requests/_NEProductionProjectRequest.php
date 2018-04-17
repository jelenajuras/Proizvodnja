<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductionProjectRequest extends FormRequest
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
            'id'  =>'required',
			'projekt_id'  =>'required',
			'investitor_id'  =>'required',
			'naziv'  =>'required',
			'voditelj'  =>'required'
        ];
    }
	
	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages()
	{
		return [
			'id.required' => 'Unos broja projekta je obavezan.',
			'projekt_id.required' => 'Unos broja projekta je obavezan.',
			'investitor_id.required'  => 'Unos investitora je obavezan',
			'naziv.required'  => 'Unos naziva je obavezan',
			'voditelj.required'  => 'Unos voditelja je obavezan'
		];
	}
}
