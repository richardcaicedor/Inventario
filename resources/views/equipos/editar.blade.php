<div class="modal fade" id="modal-default" >
    <div class="modal-dialog" style=" height: 1800px; ">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Formulario de Modificación</h4>
            </div> 
            <div class="modal-body" >
                {!! Form::open(['route'=>['app.equipos.update'],'method'=>'PUT' ]) !!}
                <div class="box-body" id="formEdicion">
                    <input type="hidden" name="id"> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('tipoequipo_id','Activo Fijo') !!} <b style="color: #EC7063;">*</b>
                                {!! Form::select('tipoequipo_id',$tipoEquipos,null,['class'=>'form-control','placeholder'=>'Seleccionar','required', 'disabled']) !!}
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
                </div>   
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    {!! Form::submit('Modificar',['class'=>'btn btn-primary']) !!}
                </div>
            </div> 
        </div>
        
        {!! Form::close() !!}
    </div>
    <!-- /.modal-content -->
</div>