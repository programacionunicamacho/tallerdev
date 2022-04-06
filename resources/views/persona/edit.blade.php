@extends('layout.plantilla')
@section ('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Persona</h3>
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
{{Form::open(array('action'=>array('App\http\Controllers\PersonaController@update', $persona->id),'method'=>'patch'))}}
<div class="row">
    <div class="col-lg-6 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="documento">Numero documento</label>
            <input type="number" name="documento_identidad" id="documento_identidad" class="form-control"
                value="{{$persona->documento_identidad}}">
        </div>
    </div>
    <div class="col-lg-6 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group"> 
            <label for="pnombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$persona->nombre}}">
        </div>
        </div>
    <div class="col-lg-6 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="papellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{$persona->apellido}}">
        </div>
    </div>
    <div class="col-lg-6 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group"> 
            <label for="sapellido">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{$persona->email}}">
        </div>
    </div>
    <div class="col-lg-6 col-md-9 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{$persona->telefono}}">
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
        <div class="form-group">
            <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-refresh"></span> Actualizar
            </button>
            <a class="btn btn-info" type="reset" href="{{url('persona')}}"><span
                    class="glyphicon glyphicon-home"></span> Regresar </a>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection

