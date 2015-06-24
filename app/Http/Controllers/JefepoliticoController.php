<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\http\Requests\JefepoliticoForm;

use Illuminate\Http\Request;

class JefepoliticoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
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
		return view("rol.createUpdateRol",array('titlePanel'=>'Registrar Jefe político','route'=>'jefepolitico.store','persona'=>$person,'foreignkey'=>'jep_idpersona'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(JefepoliticoForm $jefepoliticoForm)
	{
		$jefepolitico = new \App\Jefepolitico;
		$jefepolitico->jep_idpersona = \Request::input('jep_idpersona');
		$jefepolitico->save();
		return redirect('jefepolitico/create')->with('message','El jefe político ha sido registrado!!');
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
