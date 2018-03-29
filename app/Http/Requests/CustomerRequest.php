<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'naziv'   => 'required',
			'adresa'  => 'required',
			'grad' => 'required',
			'oib' => 'required'
        ];
    }
	
	public function messages()
	{
		return [
			'naziv.required'   => 'Unos naziva firme je obavezan!',
			'adresa.required'  => 'Unos adrese je obavezan!',
			'grad.required' => 'Unos grada je obavezan!',
			'oib.required' => 'Unos OIB-a je obavezan!'
		];
	}
}
