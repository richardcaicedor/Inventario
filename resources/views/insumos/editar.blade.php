<div class="modal fade" id="modal-default" >
    <div class="modal-dialog" style=" height: 1800px; ">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Formulario de Modificación</h4>
            </div> 
            <div class="modal-body" >
                {!! Form::open(['route'=>['app.insumos.update'],'method'=>'PUT' ]) !!}
                <div class="box-body" id="formEdicion">
                    <input type="hidden" name="id"> 
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