<div class="form-group col-sm-12">
    <h5>Información de contenido interno de la página web</h5>
    <div  style="border-bottom: 1px solid green; width=100%"></div>
</div>

<!-- Visualización del elemento Field TIPO CIRCULO d-flex justify-content-center align-items-center-->
<div class="form-group visualiza contenido pb-3 col-sm-4 " style="display:block">
    @if($interna->id_enlace)
    <a class="my-2 my-sm-0 w-100 d-flex justify-content-center " style="max-height:96px; background-color:#e6e6e6; font-size:13px;" href="{{$interna->id_enlace?url($interna->Enlace()->first()->estado=="A"?$interna->Enlace()->first()->url:"/mantenimiento"):"#"}}" target="{{$interna->id_enlace?$interna->Enlace()->first()->metodo:"_self"}}">
        {!! Html::image($interna->url_boton, 'BCM', ['class' => 'd-block','style' => 'max-width:85%','alt'=>'Imagen']) !!}
    </a>
    @endif
</div>
<div class="form-group visualiza contenido pb-3 col-sm-8" style="display:block">

    {!! Html::image($interna->url_imagen , 'BCM', ['class' => 'd-block w-100','alt'=>'Imagen']) !!}

    <div class="titlecontent">
        {!! $interna->titulo !!}
    </div>

    {!! $interna->contenido !!}
</div>

<!-- Fecha Creación Field -->
<div class="ml-2 col-6 form-group">
    <b>{!! Form::label('created_at', 'Fecha Creación:') !!}</b>
    <p>{!! $interna->created_at !!}</p>
</div>

<!-- Fecha Actualización At Field -->
<div class="col-5 form-group">
    <b>{!! Form::label('updated_at', 'Fecha Actualización:') !!}</b>
    <p>{!! $interna->updated_at !!}</p>
</div>
