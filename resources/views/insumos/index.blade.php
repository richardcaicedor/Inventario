@extends('templane.main')

@section('contenido')
<!-- Encabezado de la plataforma -->
<section class="content-header">
    <h1>
        Administración de Insumos  
        <small>Inventario de Insumos  </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#" class="active">Insumos</a></li>
    </ol>
</section>
<!-- Formulario de Creación --> 
<section class="content">
    <!-- general form elements -->
    <div class="box box-primary" style=" display: none;" id="divForm" >
        <div class="box-header with-border">
            <h3 class="box-title">Formulario de Creación </h3><br>
        </div>
        {!! Form::open(['route'=>'app.insumos.store', 'method'=>'POST']) !!}
            <div class="box-body">
            	<div class="row">
            		<div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('descripcion','Descripción') !!} <b style="color: #EC7063;">*</b>
                            {!! Form::text('descripcion',null,['class'=>'form-control', 'placeholder'=>'Descripción del Insumo','required']) !!}
                        </div>
                    </div>
            		<div class="col-md-6">
            			<div class="form-group">
                            {!! Form::label('tipoinsumo_id','Tipo Insumo') !!} <b style="color: #EC7063;">*</b>
                            {!! Form::select('tipoinsumo_id',$tipoInsumos,null,['class'=>'form-control','required','placeholder'=>'Seleccionar']) !!}
                        </div>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-md-6"> 
                        <div class="form-group">
                            {!! Form::label('cantidad','Cantidad') !!} <b style="color: #EC7063;">*</b>
                            {!! Form::number('cantidad',null,['class'=>'form-control','required']) !!}
                        </div>
                    </div>
            		<div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('estado','Estado del Insumo') !!} <b style="color: #EC7063;">*</b>
                            {!! Form::select('estado',[''=>'Seleccionar Estado','Activo'=>'Activo','Bloqueado'=>'Bloqueado'],null,['class'=>'form-control','required']) !!}
                        </div>
                    </div>
            	</div>
            	<div class="row">
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
    	<a class="btn btn-success" id="btnAgregar"><li class="glyphicon glyphicon-plus-sign"></li> Insumos</a>
    </div>
    <div class="box-body">
        <table id="tablaInfo" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Observación</th>
                    <th>Tipo Insumo</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($insumos as $insumo)
            	<tr>
            		<td >{{ $insumo->id }}</td>
            		<td>{{ $insumo->descripcion }}</td>
            		<td >{{ $insumo->observacion }}</td>
            		<td >{{ $insumo->tipoInsumo->descripcion }}</td>
                    <td >{{ $insumo->cantidad }}</td>
                    <td >{{ $insumo->estado }}</td> 
            		<td style=" text-align: center; width: 15%; " id="{{ route('app.insumos.edit',$insumo->id) }}">
            			<a class="label btn btn-warning" id="btn-editar" href="#" data-toggle="modal" data-target="#modal-default"><li class="glyphicon glyphicon-edit"></li> Editar</a>
            			<a onclick="return confirm('¿Desea Eliminar el Registro?')" class="label label.danger btn btn-danger" href="{{ route('app.insumos.destroy',$insumo->id) }}"><li class="glyphicon glyphicon-trash"></li> Eliminar</a>
            		</td>
            	</tr>
            	@endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Observación</th>
                    <th>Tipo Insumo</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div> 

@include('insumos.editar')

@endsection