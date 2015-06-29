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
	public function index()
	{
		//
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
		
		//convertimos en array para pasar al dropdown
		$list_jefepolitico = $jefepolitico->lists('per_nombres','jep_consecutivo');
		
		return view("rol.createUpdateRol",array('titlePanel'=>'Registrar Lider','route'=>'lider.store','persona'=>$person,'foreignkey'=>'lid_idpersona','list_jefepolitico'=>$list_jefepolitico));
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
