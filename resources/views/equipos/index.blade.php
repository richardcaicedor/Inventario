@extends('templane.main')

@section('contenido')
<!-- Encabezado de la plataforma -->
<section class="content-header">
    <h1>
        Administración de Equipos 
        <small>Gestión de Inventarios de Activos Fijos </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#" class="active">Equipos</a></li>
    </ol>
</section>
<!-- Formulario de Creación --> 
<section class="content">
    <!-- general form elements -->
    <div class="box box-primary" style=" display: none;" id="divForm" >
        <div class="box-header with-border">
            <h3 class="box-title">Formulario de Creación </h3><br>
        </div>
        {!! Form::open(['route'=>'app.equipos.store', 'method'=>'POST']) !!}
            <div class="box-body">
            	<div class="row">
            		<div class="col-md-6"> 
                        <div class="form-group">
                            {!! Form::label('tipoequipo_id','Activo Fijo') !!} <b style="color: #EC7063;">*</b>
                            {!! Form::select('tipoequipo_id',$tipoEquipos,null,['class'=>'form-control','placeholder'=>'Seleccionar','required']) !!}
                        </div>
                    </div>
            		<div class="col-md-6">
            			<div class="form-group">
		                	{!! Form::label('arearesponsable','Area Responsable') !!} <b style="color: #EC7063;">*</b>
		                	{!! Form::text('arearesponsable',null,['class'=>'form-control', 'placeholder'=>'Nombre del Area Responsable','required']) !!}
		                </div>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-md-6">
            			<div class="form-group">
		                	{!! Form::label('codigobarra','Código de Barra') !!} <b style="color: #EC7063;">*</b>
		                	{!! Form::text('codigobarra',null,['class'=>'form-control', 'placeholder'=>'Código de Barra del Equipo','required']) !!}
		                </div>
            		</div>
            		<div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('marca','Marca') !!} 
                            {!! Form::text('marca',null,['class'=>'form-control', 'placeholder'=>'Marca del Equipo']) !!}
                        </div>
                    </div>
            	</div>
            	<div class="row">
            		<div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('modelo','Modelo') !!}
                            {!! Form::text('modelo',null,['class'=>'form-control', 'placeholder'=>'Modelo del Equipo']) !!}
                        </div>
                    </div>
            		<div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('ordencompra','Orden de Compra') !!} <b style="color: #EC7063;">*</b>
                            {!! Form::text('ordencompra',null,['class'=>'form-control', 'placeholder'=>'Número de Orden de Compra','required']) !!}
                        </div>
                    </div>
            	</div>
            	<div class="row">
            		<div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('fechacompra','Fecha de Orden de Compra') !!} <b style="color: #EC7063;">*</b>
                            {!! Form::date('fechacompra',\Carbon\Carbon::now(),['class'=>'form-control', 'required']) !!}
                        </div>
                    </div>
            		<div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('costo','Costo') !!} <b style="color: #EC7063;">*</b>
                            {!! Form::number('costo',null,['class'=>'form-control','required']) !!}
                        </div>
                    </div>
            	</div>
                <div class="row">
                    <div class="col-md-6"> 
                        <div class="form-group">
                            {!! Form::label('estado','Estado del Equipo') !!} <b style="color: #EC7063;">*</b>
                            {!! Form::select('estado',[''=>'Seleccionar Estado','Activo'=>'Activo','Inactivo'=>'Inactivo','Reparacion'=>'En Reparación'],null,['class'=>'form-control','required']) !!}
                        </div>
                    </div>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            {!! Form::label('observacion','Observación') !!}
                            {!! Form::textarea('observacion',null,['class'=>'form-control textarea-content', 'style'=>' height:70px; ']) !!}
                        </div>
                    </div>
                </div>
	            <div>
	            	{!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
	            	<a class="btn btn-default" onclick="$('#divForm').toggle('500')" >Cancelar</a>
	            </div>
            </div>
        {!! Form::close() !!}
        <div class="box-footer" style=" color: #EC7063; ">
          Los campos con <b>*</b> son Obligatorios
        </div>
    </div>
    <div class="box">
    <!-- Tabla de informacion y eventos -->
    <div class="box-header">
    	<a class="btn btn-success" id="btnAgregar"><li class="glyphicon glyphicon-plus-sign"></li> Equipos</a>
    </div>
    <div class="box-body">
        <table id="tablaInfo" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Tipo Equipo</th>
                    <th>Observacion</th>
                    <th>Area Responsable</th>
                    <th>Codigo Barra</th>
                    <th>Marca</th>
                    <th>Modelo</th> 
                    <th>Orden de Compra</th>
                    <th>Fecha OC</th>
                    <th>Estado</th>
                    <th>Costo</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($equipos as $equipo)
            	<tr>
            		<td >{{ $equipo->id }}</td>
            		<td>{{ $equipo->tipoEquipo->descripcion }}</td>
            		<td >{{ $equipo->observacion }}</td>
            		<td >{{ $equipo->arearesponsable }}</td>
                    <td >{{ $equipo->codigobarra }}</td>
                    <td >{{ $equipo->marca }}</td>
                    <td >{{ $equipo->modelo }}</td>
                    <td >{{ $equipo->ordencompra }}</td>
                    <td >{{ $equipo->fechacompra }}</td>
                    <td >{{ $equipo->estado }}</td>
                    <td >{{ $equipo->costo }}</td>
            		<td style=" text-align: center; width: 15%; " id="{{ route('app.equipos.edit',$equipo->id) }}">
            			<a class="label btn btn-warning" id="btn-editar" href="#" data-toggle="modal" data-target="#modal-default"><li class="glyphicon glyphicon-edit"></li> Editar</a>
            			<a onclick="return confirm('¿Desea Eliminar el Registro?')" class="label label.danger btn btn-danger" href="{{ route('app.equipos.destroy',$equipo->id) }}"><li class="glyphicon glyphicon-trash"></li> Eliminar</a>
            		</td>
            	</tr>
            	@endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Tipo Equipo</th>
                    <th>Observacion</th>
                    <th>Area Responsable</th>
                    <th>Codigo Barra</th>
                    <th>Marca</th>
                    <th>Modelo</th> 
                    <th>Orden de Compra</th>
                    <th>Fecha OC</th>
                    <th>Estado</th>
                    <th>Costo</th>
                    <th>Acción</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

@include('equipos.editar')

@endsection