<!-- Nombre Field -->
<div class="form-group" {!! !empty($archive) && $archive->nombre=="Promocion Popup"?'style="display:none"':'' !!}>
    {!! Form::label('nombre', __('models/archives.fields.nombre').':') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','placeholder' => 'Nombre del archivo']) !!}
</div>

<!-- Url Archivo Field -->
<div class="form-group">
    {!! Form::label('url_archivo', __('models/archives.fields.url_archivo').':') !!}
    <div class="custom-file">
        {!! Form::file('url_archivo', ['name'=>'url_archivo','class'=>'custom-file-input'.($errors->has('url_archivo')?' is-invalid':''),'accept'=>'.pdf,image/*','data-max-size'=>'5242880']) !!}
        <label class="custom-file-label" for="inputGroupFile01">Seleccione archivo PDF o Imagen</label>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
</div>
<script>
    //FUNCION LIMITA TAMAÑO MAXIMO DE ARCHIVOS
    $('.custom-file-input').on('change', function(event) {
        var inputFile = event.currentTarget;
        if($(event.target).get(0).files.length){
            $(inputFile).parent()
                .find('.custom-file-label')
                .html(inputFile.files[0].name);
        }
    });
</script>