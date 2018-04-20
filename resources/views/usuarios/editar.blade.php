<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Formulario de Modificación</h4>
            </div> 
            <div class="modal-body">
                {!! Form::open(['route'=>['app.usuarios.update'],'method'=>'PUT' ]) !!}
                <div class="box-body" id="formEdicion">
                    <input type="hidden" name="id"> 
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
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('celular','Celular') !!} 
                                {!! Form::text('celular',null,['class'=>'form-control', 'placeholder'=>'3217856214']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('type','Rol') !!} <b style="color: #EC7063;">*</b>
                                {!! Form::select('type',[''=>'Seleccionar','member'=>'Miembro','admin'=>'Administrador'], null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                {!! Form::submit('Modificar',['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>