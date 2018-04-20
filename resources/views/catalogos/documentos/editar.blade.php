<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Formulario de Modificación</h4>
            </div> 
            <div class="modal-body">
                {!! Form::open(['route'=>['app.documentos.update'],'method'=>'PUT' ]) !!}
                <div class="box-body" id="formEdicion">
                    <div class="form-group">
                        <input type="hidden" name="id" value="">
                        {!! Form::label('Descripcion','Descripción') !!} <b style="color: #EC7063;">*</b>
                        {!! Form::text('descripcion',null,['class'=>'form-control','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('abreviado','Abreviado') !!} <b style="color: #EC7063;">*</b>
                        {!! Form::text('abreviado',null,['class'=>'form-control','required']) !!}
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