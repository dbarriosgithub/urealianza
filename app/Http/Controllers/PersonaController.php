<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PersonaForm;
use App\Http\Requests\EditPersonaForm;
use App\Http\Controllers\Controller;
use \Response;

use Illuminate\Http\Request;

class PersonaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
	   $person = \App\Persona::	cedula($request->get('qcedula'))->paginate(1);
	   return view("persona.index")->with('persona', $person);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("persona.createUpdate",array('titlePanel'=>'Ingresar Persona'));
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function search($id,Request $request)
	{		
	  $person = \App\Persona::cedula($id)->get();
	  return Response::json($person);
	}

	public function show($id)
	{
        return view('persona.show')->with('persona',\App\Persona::find($id));
	}

	public function edit($id)
	{
		return view('persona.createUpdate',array('titlePanel'=>'Editar datos persona'))->with('persona', \App\Persona::find($id));
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function update($id, EditPersonaForm $personaForm)
	{
		$persona = \App\Persona::find($id);
	 
		$persona->per_consecutivo = $id;

		$persona->per_cedula = \Request::input('per_cedula');
	 
		$persona->per_apellidos = \Request::input('per_apellidos');
	 	
		$persona->per_nombres = \Request::input('per_nombres');
	 
		$persona->pr_direccion= \Request::input('pr_direccion');

		$persona->pr_celular =  \Request::input('pr_celular');

		$persona->per_profesion =  \Request::input('per_profesion');

		$persona->per_expectativa =  \Request::input('per_expectativa');
	 
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
	 
		$persona->per_profesion =  \Request::input('per_profesion');

		$persona->per_expectativa =  \Request::input('per_expectativa');

		$persona->save();
 
		return redirect('persona/create')->with('message', 'La persona ha sido registrada');
	}

	public function destroy($id)
	{
		try
		{
			$persona = \App\Persona::where('per_consecutivo', '=',$id);
	        $persona->delete();
	    }
	    catch(\Illuminate\Database\QueryException $e)
        {        
            return redirect('persona/')->withErrors('Este registro contiene datos vinculados que restringen su eliminación!!');
        }
 
		return redirect('persona/')->with('message', 'La persona ha sido eliminada');
	}

}
