@extends('templane.main')

@section('contenido')

	<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tipos Documentos
        <small>Administración de los Tipos de Documentos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Catálogos</a></li>
        <li class="active">Tipos de Documentos</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- general form elements -->
    <div class="box box-primary" style=" display: none;" id="divForm" >
        <div class="box-header with-border">
            <h3 class="box-title">Formulario de Creación </h3><br>
        </div>
        <!-- /.box-header -->
        {!! Form::open(['route'=>'app.documentos.store', 'method'=>'POST']) !!}
            <div class="box-body">
                <div class="form-group">
                	{!! Form::label('Descripcion','Descripción') !!} <b style="color: #EC7063;">*</b>
                	{!! Form::text('descripcion',null,['class'=>'form-control','placeholder'=>'Descripcion del Tipo de Documento','required']) !!}
                </div>
                <div class="form-group">
                	{!! Form::label('abreviado','Abreviado') !!} <b style="color: #EC7063;">*</b>
                	{!! Form::text('abreviado',null,['class'=>'form-control', 'placeholder'=>'Abreviatura del Tipo de Documento','required']) !!}
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
    	<a class="btn btn-success" id="btnAgregar"><li class="glyphicon glyphicon-plus-sign"></li> Tipo Documento</a>
    </div><br>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="tablaInfo" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Abreviado</th>
                    <th>Fecha Creación</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($documentos as $documento)
            	<tr>
            		<td style=" text-align: center">{{ $documento->id }}</td>
            		<td>{{ $documento->descripcion }}</td>
            		<td style=" text-align: center">{{ $documento->abreviado }}</td>
            		<td style=" text-align: right">{{ $documento->created_at }}</td>
            		<td style=" text-align: center" id="{{ route('app.documentos.edit',$documento->id) }}">
            			<a class="label btn btn-warning" id="btn-editar" href="#" data-toggle="modal" data-target="#modal-default"><li class="glyphicon glyphicon-edit"></li> Editar</a>
            			<a onclick="return confirm('¿Desea Eliminar el Registro?')" class="label label.danger btn btn-danger" href="{{ route('app.documentos.destroy',$documento->id) }}"><li class="glyphicon glyphicon-trash"></li> Eliminar</a>
            		</td>
            	</tr>
            	@endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Abreviado</th>
                    <th>Fecha Creación</th>
                    <th>Acción</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
</section>
@include('catalogos.documentos.editar')
<br><br>
@endsection
