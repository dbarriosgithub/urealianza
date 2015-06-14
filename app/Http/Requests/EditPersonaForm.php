<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;


class EditPersonaForm extends Request {

	private $route;

	public function __construct(Route $route)
	{
		$this->route = $route;
	}

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
			"per_cedula"	=>	"required|max:45|unique:tpersona,per_cedula,".$this->route->getParameter('persona').",per_consecutivo",
			"per_nombres"	=>	"required|min:3|max:45",
			"per_apellidos"	=>	"required|min:3|max:45",
			"pr_direccion"	=>	"required|min:5|max:45",
		];
	}

	public function messages()
	{
	    return [
	        'per_cedula.unique' => 'Este número de CÉDULA ya ha sido registrado',
	        'per_nombres.required' => 'El campo nombres es requerido!',
	        'per_nombres.min' => 'El campo nombres no puede tener menos de 3 carácteres',
			'per_nombres.max' => 'El campo nombres no puede tener más de 45 carácteres',
			'per_apellidos.required' => 'El campo apellidos es requerido!',
	        'per_apellidos.min' => 'El campo apellidos no puede tener menos de 3 carácteres',
			'per_apellidos.max' => 'El campo apellidos no puede tener más de 45 carácteres',
			'pr_direccion.required' => 'El campo dirección es requerido!',
	    ];
	}

}
