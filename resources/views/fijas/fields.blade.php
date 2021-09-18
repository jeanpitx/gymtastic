<!-- Tipo Parametro Field -->
@if(Auth::user()->hasAnyRole(['root']))
    <div class="form-group">
        {!! Form::label('tipo_parametro', __('models/fijas.fields.tipo_parametro').':') !!}
        {!! Form::text('tipo_parametro', null, ['class' => 'form-control']) !!}
    </div>
@else
    {!! Form::text('tipo_parametro', null, ['class' => 'form-control','style' => 'display:none']) !!}
@endif
<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/fijas.fields.descripcion').':') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Enlace Field -->
<div class="form-group">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('url', 'Enlace') !!}
            <div class="input-group">
                {!! Form::select('url', $enlaces,!empty($fija)?$fija->id_enlace:null,['class'=>'custom-select ipt-list','placeholder' =>'Seleccione Enlace o Url']) !!}
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">www</span>
                </div>
            </div>
            <span class="invalid-feedback" id="msg_url"></span>
            <small id="nameHelp" class="form-text text-muted">Enlace que se apertura al hacer clic</small>
        </div>
    </div>
</div>

@if(!empty($fija))
  <!-- Detalle 1 Field -->
  @if($fija->detalle1)
      <div class="form-group">
          {!! Form::label('detalle1', 'Detalle 1:') !!}
          {!! Form::textarea('detalle1', null, ['class' => 'form-control']) !!}
      </div>
      <script>
          tinymce.init({
            selector: 'textarea#detalle1',
            placeholder: 'Ingrese el título aquí',
            max_height : 120,
            toolbar: 'undo redo bold',
            menubar: false
          });
      </script>
  @endif

  <!-- Detalle 2 Field -->
  @if($fija->detalle2)
      <div class="form-group">
          {!! Form::label('detalle2', 'Detalle 2:') !!}
          {!! Form::textarea('detalle2', null, ['class' => 'form-control']) !!}
      </div>
      <script>
          tinymce.init({
            selector: 'textarea#detalle2',
            placeholder: 'Ingrese el título aquí',
            max_height : 120,
            toolbar: 'undo redo bold',
            menubar: false
          });
      </script>
  @endif
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
</div>