@extends('layout.plantilla')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Asignacion Docente</h3>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
{!!Form::open(array('url'=>'asignaciond','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="row">
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">

        <label for="personas_id">Docente</label>
   <select name="personas_id" id="personas_id" class="form-control selectpicker"    data-livesearch="true" required>
                <option value="" disabled selected>Docente:</option>
                @foreach($personas as $persona)
                <option value="{{$persona->id}}">{{ $persona->nombre }} {{$persona->apellido}}</option>
                @endforeach
        </select>

        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
        <label for="asignaturas_id">Asignatura</label>
   <select name="asignaturas_id" id="asignaturas_id" class="form-control selectpicker"    data-livesearch="true" required>
                <option value="" disabled selected>Asignatura:</option>
                @foreach($asignaturas as $asignatura)
                <option value="{{$asignatura->id}}">{{ $asignatura->codigo_asignatura }} - {{$asignatura->nombre_asignatura }}</option>
                @endforeach
        </select>
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
        <label for="cursos_id">Cursos:</label>
   <select name="cursos_id" id="cursos_id" class="form-control selectpicker"    data-livesearch="true" required>
                <option value="" disabled selected>Seleccione el Curso:</option>
                @foreach($cursos as $curso)
                <option value="{{$curso->id}}">{{ $curso->curso }} - {{$curso->nombre}}</option>
                @endforeach
        </select>
        </div>
    </div>
    <div class="col-lg-4 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="ano_lectivo">Año Lectivo</label>
            <input type="text" name="ano_lectivo" id="ano_lectivo" class="form-control" placeholder="Año lectivo">
        </div>
    </div>
    
    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
        <div class="form-group"> <br>
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-ok"></span> Guardar</button>
            <button class="btn btn-danger" type="reset"><span class="glyphicon glyphicon-remove"></span> Vaciar
                Campos</button>
            <a class="btn btn-info" type="reset" href="{{url('asignaciond')}}"><span
                    class="glyphicon glyphicon-home"></span> Regresar </a>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection