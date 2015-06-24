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
		return view("rol.createUpdateRol",array('titlePanel'=>'Registrar Alcalde','route'=>'alcalde.store','persona'=>$person,'foreignkey'=>'alc_idpersona'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AlcaldeForm $alcaldeForm)
	{
		
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
