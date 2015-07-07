<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlcaldeForm;
use Illuminate\Http\Request;

class AlcaldeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *}
	 * @return Response
	 */
	public function index()
	{
		$alcalde =  \App\Alcalde::all();

		if($alcalde->isEmpty())
		{
		  \Session::flash('message-error','NO existe un alcalde registrado!!');	
		  return redirect('alcalde/create');
		}

		return view('persona.createUpdate',array('titlePanel'=>'Editar Alcalde'))->with('persona', \App\Persona::find($alcalde[0]->alc_idpersona));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    $person = new \App\Persona;
		return view("rol.createUpdateRol",array('titlePanel'=>'Registrar Alcalde','route'=>'alcalde.store','persona'=>$person,'foreignkey'=>'alc_idpersona'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AlcaldeForm $alcaldeForm)
	{
		$result  =  \App\Alcalde::all();

		if(!($result->isEmpty()))
		{
		  \Session::flash('message-error','Ya existe un alcalde registrado!!');	
		  return redirect('alcalde/create');
		}
         
		$alcalde = new \App\Alcalde;
		$alcalde->alc_idpersona = \Request::input('alc_idpersona');
		$alcalde->save();
		return redirect('alcalde/create')->with('message','El alcalde ha sido registrado!!');
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
		//
	}

}
