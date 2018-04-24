@extends('templane.main')

@section('contenido')
<!-- Encabezado de la plataforma -->
<section class="content-header">
    <h1>
        Solicitudes  
        <small>Plataforma de Solicitudes</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#" class="active">solicitudes</a></li>
    </ol>
</section>
<!-- Formulario de Creación --> 
<section class="content">
    <!-- general form elements -->
    <div class="box box-primary" style=" display: none;" id="divForm" >
        <div class="box-header with-border">
            <h3 class="box-title">Formulario de Creación </h3><br> 
        </div>
        {!! Form::open(['route'=>'app.solicitud.store', 'method'=>'POST']) !!}
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            <div class="box-body">
            	<div class="row">
            		<div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('insumo_id','Insumo') !!} <b style="color: #EC7063;">*</b>
                            {!! Form::select('insumo_id',$insumos,null,['class'=>'form-control','required', 'placeholder'=>'Seleccionar','id'=>'insumo_id']) !!}
                        </div>
                    </div>
            		<div class="col-md-6">
            			<div class="form-group">
                            {!! Form::label('solicitante','Nombre del Solicitante') !!} <b style="color: #EC7063;">*</b>
                            {!! Form::text('solicitante',null,['class'=>'form-control', 'placeholder'=>'Nombre del Solicitante','required']) !!}
                        </div>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-md-6"> 
                        <div class="form-group" id="{{ route('app.solicitud.validarCantidad',4) }}">
                            {!! Form::label('cantidad','Cantidad') !!} <b style="color: #EC7063;">*</b>
                            {!! Form::number('cantidad',null,['class'=>'form-control validarCantidad','required']) !!}
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
	            	{!! Form::submit('Guardar',['class'=>'btn btn-primary','id'=>'guardarInfo']) !!}
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
    	<a class="btn btn-success" id="btnAgregar"><li class="glyphicon glyphicon-plus-sign"></li> Solicitudes</a>
    </div>
    <div class="box-body">
        <table id="tablaInfo" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Insumo</th>
                    <th>Observación</th>
                    <th>Usuario Creación</th>
                    <th>Solicitante</th>
                    <th>Cantidad</th>
                    <th>Fecha Solicitud</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($solicitudes as $solicitud)
            	<tr>
            		<td >{{ $solicitud->id }}</td>
            		<td>{{ $solicitud->insumo->descripcion }}</td>
                    <td >{{ $solicitud->observacion }}</td>
                    <td >{{ $solicitud->usuario->nombre }}</td>
                    <td >{{ $solicitud->solicitante }}</td>
                    <td >{{ $solicitud->cantidad }}</td> 
                    <td >{{ $solicitud->created_at }}</td> 
            	</tr>
            	@endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Insumo</th>
                    <th>Observación</th>
                    <th>Usuario Creación</th>
                    <th>Solicitante</th>
                    <th>Cantidad</th>
                    <th>Fecha Solicitud</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div> 


@endsection