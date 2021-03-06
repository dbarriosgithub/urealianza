<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditVotanteForm;
use App\Http\Requests\VotanteForm;
use Illuminate\Http\Request;

class VotanteController extends Controller {

	/**
	 * Display a listing of the resource.
	 *}
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

	        $votante = \App\Votante::searchName($field,$request->get('qsearch'))->paginate(1);
	    }
	    else  
	        $votante = \App\Votante::name()->paginate(1);  
		   
		 //parámetros que se van a enviar a la vista
	     $paramview = array('votante'=>$votante,'title'=>'::Listado de votantes','view'=>'rol.tableVotanteRol','route'=>'votante.index','destroy'=>'votante.destroy');
	     
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

		$lider= \App\Lider::nameAll()->get();
		
		//convertimos en array para pasar al dropdown
		$list_lider = $lider->lists('per_nombres','lid_consecutivo');
		
		return view("rol.createUpdateRol",array('titlePanel'=>'Registrar Votante','route'=>'votante.store','persona'=>$person,'foreignkey'=>'vot_votante','list_lider'=>$list_lider));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(VotanteForm $votanteForm)
	{
	   $alcalde =  \App\Alcalde::first();

	   $votante = new \App\Votante;
	   $votante->vot_votante = \Request::input('vot_votante');
	   $votante->vot_idlider = \Request::input('vot_idlider');
	   
	   $votante->vot_numeromesavotacion = \Request::input('vot_numeromesavotacion');
       $votante->vot_lugarvotacion = \Request::input('vot_lugarvotacion');
       $votante->vot_observacion = \Request::input('vot_observacion');
	   
       //se valida si el lider es el alcalde
       $lider = \App\Lider::find($votante->vot_idlider);

	  if($alcalde->persona->per_consecutivo == $lider->persona->per_consecutivo)
	     $votante->vot_soloalcalde = true;

	    $votante->save();
		return redirect('votante/create')->with('message','El votante ha sido registrado!!');
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
		$lider = \App\Lider::nameAll()->get();

		$votante = \App\Votante::find($id);

		$person = $votante->persona;

		//convertimos en array para pasar al dropdown
		$list_lider = $lider->lists('per_nombres','lid_consecutivo');
		
		return view("rol.editRol",array('titlePanel'=>'Editar votante','route'=>'votante.update','persona'=>$person,'foreignkey'=>'vot_votante','consecutivo'=>$id,'model'=>$votante,'list_lider'=>$list_lider));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,EditVotanteForm $editvotanteform)
	{
		$alcalde =  \App\Alcalde::first();

		$votante = \App\Votante::find($id);
	 
		$votante->vot_consecutivo = $id;

		$votante->vot_votante = \Request::input('vot_votante');
	 
		$votante->vot_idlider = \Request::input('vot_idlider');

		$votante->vot_numeromesavotacion = \Request::input('vot_numeromesavotacion');

		$votante->vot_lugarvotacion = \Request::input('vot_lugarvotacion');

		$votante->vot_observacion = \Request::input('vot_observacion');
		
		//se valida si el lider es el alcalde
        $lider = \App\Lider::find($votante->vot_idlider);

	   if($alcalde->persona->per_consecutivo == $lider->persona->per_consecutivo)
	     $votante->vot_soloalcalde = true;
		
		 $votante->save();
	 
		return redirect()->route('votante.edit', ['votante' => $id])->with('message', 'Datos del votante han sido actualizados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$votante = \App\Votante::where('vot_consecutivo', '=',$id);
        $votante->delete();
 
		return redirect('votante/')->with('message', 'El votante ha sido eliminado');
	}

}
