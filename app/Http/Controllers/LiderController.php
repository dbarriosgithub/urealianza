<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LiderForm;
use Illuminate\Http\Request;

class LiderController extends Controller {

	/**
	 * Display a listing of the resource.
	 *}
	 * @return Response
	 */
	public function index(Request $request)
	{  
		$alcalde = \App\Alcalde::all();

		//Control de creación de alcalde para referenciarlo como lider
		//dd($alcalde);
		if($alcalde->isEmpty())
	      return redirect('alcalde/create')->withErrors('Debe registrar un alcalde!!');
	   

		if($request->get('qsearch'))
      	{
	        if($request->get('searchOp')=='qcedula')
	        	$field = 'per_cedula';
	        else  	
	        	$field = 'per_nombres';

	        $lider = \App\Lider::searchName($field,$request->get('qsearch'),$alcalde[0]->persona->per_consecutivo)->paginate(1);
	    }
	    else  
	        $lider = \App\Lider::name($alcalde[0]->persona->per_consecutivo)->paginate(1);  
		   
		 //parámetros que se van a enviar a la vista
	     $paramview = array('lider'=>$lider,'title'=>'::Listado de lideres','view'=>'rol.tableLiderRol','route'=>'lider.index','destroy'=>'lider.destroy');
	     
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

		$jefepolitico= \App\Jefepolitico::name()->get();
		$concejal= \App\Concejal::name()->get();

		//convertimos en array para pasar al dropdown
		$list_concejal = $concejal->lists('per_nombres','con_consecutivo');
		
		//convertimos en array para pasar al dropdown
		$list_jefepolitico = $jefepolitico->lists('per_nombres','jep_consecutivo');
		
		return view("rol.createUpdateRol",array('titlePanel'=>'Registrar Lider','route'=>'lider.store','persona'=>$person,'foreignkey'=>'lid_idpersona','list_concejal'=>$list_concejal,'list_jefepolitico'=>$list_jefepolitico));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(LiderForm $liderForm)
	{
		$lider = new \App\Lider;
		$lider->lid_idpersona = \Request::input('lid_idpersona');
		$lider->lid_idconcejal = \Request::input('lid_idconcejal');
		$lider->lid_idjefepolitico = \Request::input('lid_idjefepolitico');
		$lider->save();
		return redirect('lider/create')->with('message','El lider ha sido registrado!!');
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
		$jefepolitico= \App\Jefepolitico::name()->get();

		$concejal= \App\Concejal::name();

		$lider = \App\Lider::find($id);

		$person = $lider->persona;

		//convertimos en array para pasar al dropdown
		$list_concejal = $concejal->lists('per_nombres','con_consecutivo');

		//convertimos en array para pasar al dropdown
		$list_jefepolitico = $jefepolitico->lists('per_nombres','jep_consecutivo');
		
		return view("rol.editRol",array('titlePanel'=>'Editar Lider','route'=>'lider.update','persona'=>$person,'foreignkey'=>'lid_idpersona','model'=>$lider,'consecutivo'=>$id,'list_concejal'=>$list_concejal,'list_jefepolitico'=>$list_jefepolitico));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$lider = \App\Lider::find($id);
	 
		$lider->lid_consecutivo = $id;

		$lider->lid_idpersona = \Request::input('lid_idpersona');
	 
		$lider->lid_idjefepolitico = \Request::input('lid_idjefepolitico');
		$lider->save();
	 
		return redirect()->route('lider.edit', ['lider' => $id])->with('message', 'Datos del lider actualizados');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try
		{
		  $lider = \App\Lider::where('lid_consecutivo', '=',$id);
          $lider->delete();
        }
        catch(\Illuminate\Database\QueryException $e)
        {        
            return redirect('lider/')->withErrors('Este registro contiene datos vinculados que restringen su eliminación!!');
        }
 
		return redirect('lider/')->with('message','El lider ha sido eliminado satisfactoriamente!!');
	}

}
