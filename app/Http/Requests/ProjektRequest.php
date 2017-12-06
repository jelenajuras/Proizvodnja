<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjektRequest extends FormRequest
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
            'narucitelj_id' => 'required',
			'name'          => 'required'
        ];
    }
	
	public function messages()
	{
		return [
			'narucitelj_id.required' => 'Unos naručitelja je obavezan!'
			'name.required'          => 'Unos naziva projekta je obavezan!'
		]
	}
}
