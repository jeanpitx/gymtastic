@if(empty($tarjeta) || $tarjeta->titulo!=="SOLICITUDES BCM" || Auth::user()->hasAnyRole(['root']))
    <!-- Tipo Tarjeta Field -->
    <div class="form-group">
        {!! Form::label('tipo_tarjeta','Tipo tarjeta *') !!}
        {!! Form::select('tipo_tarjeta', ['tarjeta'=>'Tarjeta','circular'=>'Circular'],null,['class'=>'custom-select','placeholder' =>'Seleccione el tipo de tarjeta','required']) !!}
    </div>

    <!-- Titulo Field -->
    <div class="form-group">
        {!! Form::label('titulo', __('models/tarjetas.fields.titulo').' *') !!}
        {!! Form::textarea('titulo', null, ['class' => 'form-control toupper','placeholder'=>'Título de la tarjeta','rows'=>'1']) !!}
    </div>
@endif
<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/tarjetas.fields.descripcion').' *') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control','placeholder'=>'Descripción de la tarjeta','rows'=>'2','minlength'=>'10']) !!}
</div>

<!-- URL imagen Field -->
<div class="form-group">
    {!! Form::label('url_imagen', 'Imagen *') !!}
    <img id="imgsee" src="{!! url(!empty($tarjeta)?'/'.$tarjeta->url_imagen:'/img/imgtarjeta.png') !!}" class="img-fluid rounded col-4 img-zoomable mx-auto d-block" style="max-width:150px;margin-bottom: 3px">
    <div class="custom-file">
    	{!! Form::file('url_imagen', ['class'=>'custom-file-input'.($errors->has('url_imagen')?' is-invalid':''),'accept'=>'image/*']) !!}
		{!! Form::label('url_imagen', (!empty($tarjeta))?'Seleccione una imagen':'Seleccione un archivo..',['class'=>'custom-file-label']) !!}
		<div class="invalid-feedback">{{ $errors->first('url_imagen') }}</div>
		<!--SE CREA UN INPUT OCULTO QUE ENVIE Y TRAIGA LA IMAGEN-->
		{!! Form::text('imghide', null, ['class' => 'form-control', 'style'=>'display: none']) !!}
	</div>
    <small id="nameHelp" class="form-text text-muted">* (.png) con tamaño 1200 * 800</small>
</div>

@if(empty($tarjeta) || $tarjeta->titulo!=="SOLICITUDES BCM" || Auth::user()->hasAnyRole(['root']))
    <!-- Enlace Field -->
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                {!! Form::label('url', 'Enlace') !!}
                <div class="input-group">
                    {!! Form::select('url', $enlaces,!empty($tarjeta)?$tarjeta->id_enlace:null,['class'=>'custom-select ipt-list','placeholder' =>'Seleccione Enlace o Url']) !!}
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">www</span>
                    </div>
                </div>
                <span class="invalid-feedback" id="msg_url"></span>
                <small id="nameHelp" class="form-text text-muted">Enlace que se apertura al hacer clic</small>
            </div>
        </div>
    </div>
@endif

<script>
    $('select[name="url"]').val('{{!empty($tarjeta)?$tarjeta->id_enlace:""}}').change();
    tinymce.init({
      selector: 'textarea#titulo',
      placeholder: 'Ingrese el título aquí',
      max_height : 120,
      toolbar: 'undo redo bold',//'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
      //plugins: 'lists',
      menubar: false
    });
</script>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
</div>
