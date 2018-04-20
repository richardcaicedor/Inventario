@extends('templane.main')

@section('contenido')
<!-- Encabezado de la plataforma -->
<section class="content-header">
    <h1>
        Administración de Usuarios
        <small>Gestión de catálogos de usuarios </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#" class="active">Usuarios</a></li>
    </ol>
</section>
<!-- Formulario de Creación --> 
<section class="content">
    <!-- general form elements -->
    <div class="box box-primary" style=" display: none;" id="divForm" >
        <div class="box-header with-border">
            <h3 class="box-title">Formulario de Creación </h3><br>
        </div>
        {!! Form::open(['route'=>'app.usuarios.store', 'method'=>'POST']) !!}
            <div class="box-body">
            	<div class="row">
            		<div class="col-md-6">
            			<div class="form-group">
		                	{!! Form::label('tipoDocto','Tipo Documento') !!} <b style="color: #EC7063;">*</b>
		                	{!! Form::select('tipo_docto',$documentos,null,['class'=>'form-control','placeholder'=>'Seleccionar','required']) !!}
		                </div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
		                	{!! Form::label('numero','Número') !!} <b style="color: #EC7063;">*</b>
		                	{!! Form::text('numero',null,['class'=>'form-control', 'placeholder'=>'Número de Documento','required']) !!}
		                </div>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-md-6">
            			<div class="form-group">
		                	{!! Form::label('nombre','Nombre Completo') !!} <b style="color: #EC7063;">*</b>
		                	{!! Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Nombre Complero del Usuario','required']) !!}
		                </div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
		                	{!! Form::label('email','Email') !!} <b style="color: #EC7063;">*</b>
		                	{!! Form::text('email',null,['class'=>'form-control', 'placeholder'=>'ejemplo@example.com','required']) !!}
		                </div>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-md-6">
            			<div class="form-group">
		                	{!! Form::label('password','Contraseña') !!} <b style="color: #EC7063;">*</b>
		                	{!! Form::password('password', ['class'=>'form-control','required','placeholder'=>'**************']) !!}
		                </div>
            		</div>
            		<div class="col-md-6">
            			<div class="form-group">
		                	{!! Form::label('direccion','Dirección') !!} <b style="color: #EC7063;">*</b>
		                	{!! Form::text('direccion',null,['class'=>'form-control', 'placeholder'=>'AV 4 # 85 - 28','required']) !!}
		                </div>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-md-6">
            			<div class="form-group">
		                	{!! Form::label('telefono','Telefono') !!} 
		                	{!! Form::text('telefono',null,['class'=>'form-control', 'placeholder'=>'5555555']) !!}
		                </div>
            		</div>
            		<div class="col-md-3">
            			<div class="form-group">
		                	{!! Form::label('celular','Celular') !!} 
		                	{!! Form::text('celular',null,['class'=>'form-control', 'placeholder'=>'3217856214']) !!}
		                </div>
            		</div>
            		<div class="col-md-3">
            			<div class="form-group">
		                	{!! Form::label('type','Rol') !!} <b style="color: #EC7063;">*</b>
		                	{!! Form::select('type',[''=>'Seleccionar','member'=>'Miembro','admin'=>'Administrador'], null,['class'=>'form-control']) !!}
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
    	<a class="btn btn-success" id="btnAgregar"><li class="glyphicon glyphicon-plus-sign"></li> Usuario</a>
    </div>
    <div class="box-body">
        <table id="tablaInfo" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Documento Identidad</th>
                    <th>Nombre y Apellido</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Rol</th> 
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($users as $user)
            	<tr>
            		<td >{{ $user->documentos->abreviado.' - '.$user->numero }}</td>
            		<td>{{ $user->nombre }}</td>
            		<td >{{ $user->email }}</td>
            		<td >{{ $user->direccion }}</td>
            		<td >{{ $user->telefono }}</td>
            		<td >{{ $user->celular }}</td>
            		<td >{{ $user->type }}</td>
            		<td style=" text-align: center; width: 15%;" id="{{ route('app.usuarios.edit',$user->id) }}">
            			<a class="label btn btn-warning" id="btn-editar" href="#" data-toggle="modal" data-target="#modal-default"><li class="glyphicon glyphicon-edit"></li> Editar</a>
            			<a onclick="return confirm('¿Desea Eliminar el Registro?')" class="label label.danger btn btn-danger" href="{{ route('app.usuarios.destroy',$user->id) }}"><li class="glyphicon glyphicon-trash"></li> Eliminar</a>
            		</td>
            	</tr>
            	@endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Documento Identidad</th>
                    <th>Nombre y Apellido</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Celular</th>
                    <th>Rol</th> 
                    <th>Acción</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

@include('usuarios.editar')

@endsection