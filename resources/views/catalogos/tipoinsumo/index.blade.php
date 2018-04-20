@extends('templane.main')

@section('contenido')

	<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tipos de Insumos
        <small>Administración del catalogo de Tipos de Insumos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Catálogos</a></li>
        <li class="active">Tipos de Insumo</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- general form elements -->
    <div class="box box-primary" style=" display: none;" id="divForm" >
        <div class="box-header with-border">
            <h3 class="box-title">Formulario de Creación </h3><br>
        </div>
        <!-- Formulario de Creacion del tipo de Insumos -->
        {!! Form::open(['route'=>'app.tipoInsumo.store', 'method'=>'POST']) !!}
            <div class="box-body">
                <div class="form-group">
                	{!! Form::label('Descripcion','Descripción') !!} <b style="color: #EC7063;">*</b>
                	{!! Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion del Tipo de Insumo','required']) !!}
                </div>
                <div class="form-group"> 
                	{!! Form::label('observacion','Observacion') !!} <b style="color: #EC7063;">*</b>
                	{!! Form::textarea('observacion',null,['class'=>'form-control','required','style'=>' height: 90px;']) !!}
                </div>
                <!-- /.box-body --> 
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
    <div class="box-header">
    	<a class="btn btn-success" id="btnAgregar"><li class="glyphicon glyphicon-plus-sign"></li> Tipo Insumo</a>
    </div><br>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="tablaInfo" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Observación</th>
                    <th>Fecha Creación</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($tipoInsumos as $tipoInsumo)
            	<tr>
            		<td style=" text-align: center">{{ $tipoInsumo->id }}</td>
            		<td>{{ $tipoInsumo->descripcion }}</td>
            		<td style=" width: 50%; ">{{ $tipoInsumo->observacion }}</td>
            		<td style=" text-align: right">{{ $tipoInsumo->created_at }}</td>
            		<td style=" text-align: center" id="{{ route('app.tipoInsumo.edit',$tipoInsumo->id) }}">
            			<a class="label btn btn-warning" id="btn-editar" href="#" data-toggle="modal" data-target="#modal-default"><li class="glyphicon glyphicon-edit"></li> Editar</a>
            			<a onclick="return confirm('¿Desea Eliminar el Registro?')" class="label label.danger btn btn-danger" href="{{ route('app.tipoInsumo.destroy',$tipoInsumo->id) }}"><li class="glyphicon glyphicon-trash"></li> Eliminar</a>
            		</td>
            	</tr>
            	@endforeach 
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Observación</th>
                    <th>Fecha Creación</th>
                    <th>Acción</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
</section> 
<!-- Formulario de Modificacion de los tipos de insumos -->
@include('catalogos.tipoInsumo.editar')
<br><br>
@endsection
