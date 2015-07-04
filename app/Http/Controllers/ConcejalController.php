<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\http\Requests\ConcejalForm;

use Illuminate\Http\Request;

class ConcejalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		if($request->get('qsearch'))
      	{
	        if($request->get('searchOp')=='qcedula')
	        	$field = 'per_cedula';
	        else  	
	        	$field = 'per_nombres';

      	    $person = \App\Concejal::searchName($field,$request->get('qsearch'))->paginate(1);
      	}
      	else	
		    $person = \App\Concejal::name()->paginate(1);

        //parámetros que se van a enviar a la vista
	     $paramview = array('persona'=>$person,'title'=>'::Listado de concejales','view'=>'partials.formTablePersona','route'=>'concejal.index','destroy'=>'concejal.destroy');
	     return view("rol.indexMainRol",$paramview);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$person = new \App\Persona;
		return view("rol.createUpdateRol",array('titlePanel'=>'Registrar Concejal','route'=>'concejal.store','persona'=>$person,'foreignkey'=>'con_idpersona'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ConcejalForm $concejalForm)
	{
		$concejal = new \App\Concejal;
		$concejal->con_idpersona = \Request::input('con_idpersona');
		$concejal->save();
		return redirect('concejal/create')->with('message','El concejal ha sido registrado!!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$concejal = \App\Concejal::where('con_idpersona','=',$id);
        $concejal->delete();
 
		return redirect('concejal/')->with('message', 'El concejal ha sido eliminado satisfactoriamente!!');
	}

}
