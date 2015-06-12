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
		return view("persona.createUpdate");
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function edit($id)
	{
		return view('persona.createUpdate')->with('persona', \App\Persona::where('per_consecutivo', $id)->first());
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function update($id, PersonaForm $personaForm)
	{
		$persona = \App\Persona::where('per_consecutivo', $id)->first();
	 
		$persona->per_consecutivo = $id;

		$persona->per_cedula = \Request::input('per_cedula');
	 
		$persona->per_apellidos = \Request::input('per_apellidos');
	 	
		$persona->per_nombres = \Request::input('per_nombres');
	 
		$persona->pr_direccion= \Request::input('pr_direccion');

		$persona->pr_celular =  \Request::input('pr_celular');
	 
		$persona->save();
	 
		return redirect()->route('persona.edit', ['persona' => $id])->with('message', 'Persona actualizada');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(PersonaForm $personaForm)
	{
		$persona = new \App\Persona;

		$persona->per_cedula = \Request::input('per_cedula');
	 
		$persona->per_apellidos = \Request::input('per_apellidos');
	 	
		$persona->per_nombres = \Request::input('per_nombres');
	 
		$persona->pr_direccion= \Request::input('pr_direccion');

		$persona->pr_celular =  \Request::input('pr_celular');
	 
		$persona->save();
 
		return redirect('persona/create')->with('message', 'La persona ha sido registrada');
	}

	public function destroy($id)
	{
		$persona = \App\Persona::where('per_consecutivo', '=',$id);
        $persona->delete();
 
		return redirect('persona/')->with('message', 'La persona ha sido eliminada');
	}

}
