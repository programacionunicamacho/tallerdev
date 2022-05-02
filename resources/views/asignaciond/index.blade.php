@extends('layout.plantilla')
@section('contenido')
<div class="row">
   <div class="col-md-9">
      <a href="{{url('asignaciond/create')}}" class="pull-right">
         <button class="btn btn-success">Insertar Carga Academica</button> </a>
        
         <a href="{{url('imprimirPersonas')}}" class="pull-right">
         <button class="btn btn-success">Imprimir Pdf</button> </a>
   </div>
</div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-9">
            <div class="table-responsive">
      <table class="table table-striped table-hover">
         <thead>
            <th>Id</th>
            <th>Asignatura</th>
            <th>Nombre Docente</th>
            <th>Curso</th>
            <th>Año Lectivo</th>
            <th>Opciones</th>
         </thead>
         <tbody>
         @foreach($asignaciond as $asd)
            <tr>
               <td>{{ $asd->id }}</td>
               <td>{{ $asd->asignaturas->nombre_asignatura}}</td>
               <td>{{ $asd->personas_id}} - {{ $asd->personas->nombre}} {{ $asd->personas->apellido}}</td>
               <td>{{ $asd->cursos->nombre }}</td>
               <td>{{ $asd->ano_lectivo }}</td>
               <td>
               <a href="{{URL::action('App\http\Controllers\AsignaciondocenteController@edit',$asd->id)}}"><button class="btn btn-primary">Actualizar</button></a>
               <a href="" data-target="#modal-delete-{{$asd->id}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>
               <a href="{{URL::action('App\http\Controllers\AsignaciondocenteController@edit',$asd->id)}}"><button class="btn btn-primary">Imprimir</button></a>
               </td>
            </tr>
           
         @endforeach
         </tbody>
      </table>
      </div>
        </div>
    </div>
@endsection
