<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', __('models/internas.fields.titulo').':') !!}
    {!! Form::textarea('titulo', null, ['class' => 'form-control']) !!}
</div>

<!-- URL imagen Field -->
<div class="form-group">
    {!! Form::label('url_imagen', 'Imagen *') !!}
    <img id="imgsee" src="{!! url(!empty($interna)?'/'.$interna->url_imagen:'/img/imgcarrusel.png') !!}" class="img-fluid rounded col-4 img-zoomable mx-auto d-block" style="margin-bottom: 3px">
    <div class="custom-file">
      {!! Form::file('url_imagen', ['class'=>'custom-file-input'.($errors->has('url_imagen')?' is-invalid':''),'accept'=>'image/*']) !!}
    {!! Form::label('url_imagen', (!empty($interna))?'Seleccione una imagen':'Seleccione un archivo..',['class'=>'custom-file-label']) !!}
    <div class="invalid-feedback">{{ $errors->first('url_imagen') }}</div>
    <!--SE CREA UN INPUT OCULTO QUE ENVIE Y TRAIGA LA IMAGEN-->
    {!! Form::text('imghide', null, ['class' => 'form-control', 'style'=>'display: none']) !!}
  </div>
    <small id="nameHelp" class="form-text text-muted">* (.png) con tamaño 1200 * 800</small>
</div>

<!-- Contenido Field -->
<div class="form-group">
    {!! Form::label('contenido', __('models/internas.fields.contenido').':') !!}
    {!! Form::textarea('contenido', null, ['class' => 'form-control']) !!}
</div>

<!-- Enlace Field -->
<div class="form-group">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('url', 'Enlace') !!}
            <div class="input-group">
                {!! Form::select('url', $enlaces,!empty($interna)?$interna->id_enlace:null,['class'=>'custom-select ipt-list','placeholder' =>'Seleccione Enlace o Url']) !!}
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">www</span>
                </div>
            </div>
            <span class="invalid-feedback" id="msg_url"></span>
            <small id="nameHelp" class="form-text text-muted">Enlace que se apertura al hacer clic</small>
        </div>
    </div>
</div>

<!-- URL boton Field -->
<div class="form-group" id="divimgbtn" style="display: none">
    {!! Form::label('url_boton', 'Imagen del enlace del boton *') !!}
    <img id="imgseebtn" src="{!! url(!empty($interna) && !empty($interna->url_boton)?'/'.$interna->url_boton:'/img/imgcarrusel.png') !!}" class="img-fluid rounded col-4 img-zoomable mx-auto d-block" style="max-width:250px;margin-bottom: 3px">
    <div class="custom-file">
      {!! Form::file('url_boton', ['class'=>'custom-file-input'.($errors->has('url_boton')?' is-invalid':''),'accept'=>'image/*']) !!}
    {!! Form::label('url_boton', (!empty($interna))?'Seleccione una imagen':'Seleccione un archivo..',['class'=>'custom-file-label']) !!}
    <div class="invalid-feedback">{{ $errors->first('url_boton') }}</div>
    <!--SE CREA UN INPUT OCULTO QUE ENVIE Y TRAIGA LA IMAGEN-->
    {!! Form::text('imghidebtn', null, ['class' => 'form-control', 'style'=>'display: none']) !!}
  </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
</div>


<script>
    tinymce.init({
      selector: 'textarea#titulo',
      max_height : 120,
      placeholder: 'Ingrese el título aquí',
      toolbar: 'undo redo bold',//'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
      //plugins: 'lists',
      menubar: false
    });

    tinymce.init({
      selector: 'textarea#contenido',
      placeholder: 'Ingrese el contenido aquí',
      toolbar: 'undo redo styleselect bold italic bullist link', //
      plugins: 'lists link powerpaste',
      menubar: "edit",
    });

    if($("#url").val()!="ninguna" && $("#url").val()!="")
        $("#divimgbtn").show();
    else
        $("#divimgbtn").hide();
    $("#url").on("change",function(){
        if($("#url").val()!="ninguna" && $("#url").val()!="")
            $("#divimgbtn").show();
        else
            $("#divimgbtn").hide();
    });
    $(document).on('DOMNodeInserted', function(e) {
        if($(e.target).attr('class')=="custom-select ipt-list"){
            $("#divimgbtn").hide();
            $("#url").on("change",function(){
                if($("#url").val()!="ninguna" && $("#url").val()!="")
                    $("#divimgbtn").show();
                else
                    $("#divimgbtn").hide();
            });
        }
    });
</script>