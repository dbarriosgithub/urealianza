<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PersonaForm;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PersonaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view("persona.index")->with('persona', \App\Persona::paginate(2)->setPath('persona'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("persona.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PersonaForm $personaForm)
	{
		$persona = new \App\Persona;
	 	
		$persona->per_nombres = \Request::input('per_nombres');
	 
		$persona->per_apellidos = \Request::input('per_apellidos');
	 
		$persona->save();
 
		return redirect('persona/create')->with('message', 'Post saved');
	}

}
