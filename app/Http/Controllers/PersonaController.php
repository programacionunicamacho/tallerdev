<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona; 
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonaFormRequest;


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  return view('persona.index');
      $persona=Persona::orderBy('id','ASC')->paginate(3);
      return view('persona.index',compact('persona')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('persona.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaFormRequest $request)
    {
        $personas=new Persona;
        $personas->documento_identidad=$request->get('documento_identidad');
        $personas->nombre=$request->get('nombre');
        $personas->apellido=$request->get('apellido');
        $personas->email=$request->get('email');
        $personas->telefono=$request->get('telefono');
        $personas->save();
        return Redirect::to('persona');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona=Persona::findOrFail($id);
        return view("persona.edit",["persona"=>$persona]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $personas=Persona::findOrFail($id);
       $personas->documento_identidad=$request->get('documento_identidad');
       $personas->nombre=$request->get('nombre');
       $personas->apellido=$request->get('apellido');
       $personas->email=$request->get('email');
       $personas->telefono=$request->get('telefono');
        
       $personas->update();
       return Redirect::to('persona');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personas=Persona::findOrFail($id);
        $personas->delete();
        return Redirect::to('persona');

    }
}
