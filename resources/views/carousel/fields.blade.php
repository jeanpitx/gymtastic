<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Titulo *') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control'.($errors->has('titulo')?' is-invalid':''),'placeholder' => 'Titulo del carrusel']) !!}
    <span class="invalid-feedback">{{ $errors->first('titulo') }}</span>
</div>
<!-- Descripción Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripción *') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control'.($errors->has('descripcion')?' is-invalid':''),'placeholder' => 'Descripción del carrusel','rows'=>'2']) !!}
    <span class="invalid-feedback">{{ $errors->first('descripcion') }}</span>
    <small class="form-text text-muted">Una descripción detallada del contenido</small>
</div>

<!-- URL imagen Field -->
<div class="form-group">
    {!! Form::label('url_imagen', 'Imagen *') !!}
    <img id="imgsee" src="{!! url(!empty($carousel)?'/'.$carousel->url_imagen:'/img/imgcarrusel.png') !!}" class="img-fluid rounded col-4 img-zoomable mx-auto d-block" style="margin-bottom: 3px">
    <div class="custom-file">
    	{!! Form::file('url_imagen', ['class'=>'custom-file-input'.($errors->has('url_imagen')?' is-invalid':''),'accept'=>'image/*']) !!}
		{!! Form::label('url_imagen', (!empty($carousel))?'Seleccione una imagen':'Seleccione un archivo..',['class'=>'custom-file-label']) !!}
		<div class="invalid-feedback">{{ $errors->first('url_imagen') }}</div>
		<!--SE CREA UN INPUT OCULTO QUE ENVIE Y TRAIGA LA IMAGEN-->
		{!! Form::text('imghide', null, ['class' => 'form-control', 'style'=>'display: none']) !!}
	</div>
    <small id="nameHelp" class="form-text text-muted">* (.png) con tamaño 1200 * 800</small>
</div>


<!-- Enlace Field -->
<div class="form-group">
	<div class="row">
		<div class="col-sm-12">
            {!! Form::label('url', 'Enlace') !!}
            <div class="input-group">
                {!! Form::select('url', $enlaces,!empty($carousel)?$carousel->id_enlace:null,['class'=>'custom-select ctn-multiple-norepeat ipt-list','placeholder' =>'Seleccione Enlace o Url']) !!}
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">www</span>
                </div>
            </div>
		    <span class="invalid-feedback" id="msg_url"></span>
		    <small id="nameHelp" class="form-text text-muted">Enlace que se apertura al hacer clic</small>
		</div>
	</div>
</div>

<!-- Previsualizar -->
<div class="form-group" id="previsualiza" style="display: none;">
    <div id="carouselPrincipal" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        </ol>

        <div class="carousel-inner">
        </div>
        
        <a class="carousel-control-prev" href="#carouselPrincipal" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselPrincipal" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>
    <button onclick="$('#previsualiza').hide({interval: 300}); return false;" class="btn btn-danger mt-2">Ocultar</button>
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <button type="button" onclick="previsualiza(); return false;" class="btn btn-info">Previsualizar</button>
    <a href="{!! route('carousel.index') !!}" class="btn btn-secondary">Volver</a>
</div>

<script>
    $('select[name="url"]').val('{{!empty($carousel)?$carousel->id_enlace:""}}').change();
</script>