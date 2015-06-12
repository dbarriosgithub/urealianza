<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonaForm extends Request {

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
			"per_cedula"	=>	"required|min:7|max:45",
			"per_nombres"	=>	"required|min:3|max:45",
			"per_apellidos"	=>	"required|min:3|max:45",
			"pr_direccion"	=>	"required|min:5|max:45",
			"pr_celular"	=>	"required|min:10|max:18",
		];
	}

	public function messages()
	{
	    return [
	        'per_nombres.required' => 'El campo per_nombres es requerido!',
	        'per_nombres.min' => 'El campo per_nombres no puede tener menos de 5 carácteres',
			'per_nombres.max' => 'El campo per_nombres no puede tener más de 45 carácteres',
			'per_apellidos.required' => 'El campo per_apellidos es requerido!',
	        'per_apellidos.min' => 'El campo per_apellidos no puede tener menos de 5 carácteres',
			'per_apellidos.max' => 'El campo per_apellidos no puede tener más de 45 carácteres',
	    ];
	}

}
