<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Asignaciondocente;

use App\Models\Asignatura;
use App\Models\Persona;
use App\Models\Curso;

use Illuminate\Support\Facades\Redirect;

class AsignaciondocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaciond=Asignaciondocente::orderBy('id','DESC')->get();

        return view('asignaciond.index',["asignaciond"=>$asignaciond]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
//Consulta de Personas
     $personas=Persona::orderBy('id','DESC')
      ->select('personas.id','personas.nombre', 'personas.apellido', 'personas.documento_identidad')
       ->get();
  
       //Consulta de Asignaturas
     $asignaturas=Asignatura::orderBy('id','DESC')
     ->select('asignaturas.id','asignaturas.codigo_asignatura', 'asignaturas.nombre_asignatura') 
     ->get();

     //Consulta de Cursos
   $cursos=Curso::orderBy('id','DESC')
->select('cursos.id', 'cursos.curso', 'cursos.nombre') 
->get();

return view('asignaciond.create')->with('personas',$personas)->with('asignaturas',$asignaturas)->with('cursos',$cursos);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $asignaciond=new Asignaciondocente;
      $asignaciond->asignaturas_id=$request->get('asignaturas_id');
      $asignaciond->personas_id=$request->get('personas_id'); 
      $asignaciond->cursos_id=$request->get('cursos_id');
       $asignaciond->ano_lectivo=$request->get('ano_lectivo');
       
      $asignaciond->save();
      
      return Redirect::to('asignaciond');
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
      $asignaciond=Asignaciondocente::findOrFail($id);

      //Consulta de Personas
    $personas=Persona::orderBy('id','DESC') 
    ->select('personas.id','personas.nombre', 'personas.apellido', 'personas.documento_identidad')
    ->whereNotIn('personas.id',[$asignaciond->personas_id]) 
    ->get();
 
      //Consulta de Asignaturas
      $asignaturas=Asignatura::orderBy('id','DESC') 
      ->select('asignaturas.id','asignaturas.codigo_asignatura', 'asignaturas.nombre_asignatura') 
      ->whereNotIn('asignaturas.id',[$asignaciond->asignaturas_id])
      ->get();

      //Consulta de Cursos
      $cursos=Curso::orderBy('id','DESC') 
      ->select('cursos.id', 'cursos.curso', 'cursos.nombre') 
      ->whereNotIn('cursos.id',[$asignaciond->cursos_id])
      ->get();


      return view("asignaciond.edit")->with('asignaciond',$asignaciond)->with('personas',$personas)->with('asignaturas',$asignaturas)->with('cursos',$cursos);

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
      $asignaciond=Asignaciondocente::findOrFail($id); 
      $asignaciond->asignaturas_id=$request->get('asignaturas_id'); 
      $asignaciond->personas_id=$request->get('personas_id'); 
      $asignaciond->cursos_id=$request->get('cursos_id');
       $asignaciond->ano_lectivo=$request->get('ano_lectivo'); 
       $asignaciond->update();


       $personas=new Persona;
       $personas->documento_identidad=$request->get('ano_lectivo');
       $personas->nombre=$request->get('ano_lectivo');
       $personas->apellido=$request->get('ano_lectivo');
       $personas->email=$request->get('ano_lectivo');
       $personas->telefono=$request->get('ano_lectivo');
       $personas->save();




      return Redirect::to('asignaciond');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}