<div class="form-group col-sm-12">
    <h5>Información en el footer de la página web</h5>
    <div  style="border-bottom: 1px solid green; width=100%"></div>
</div>

<!-- Visualización del elemento Field -->
<div class="form-group visualiza col-sm-12" style="display:block">
    <div class="col-2 mb-2">
        <h6 class="img-round-title my-0 mb-1" style="font-size: 14px">{{ $footer->descripcion }}</h6>
        <ul class="list-group list-group-none">
            @foreach($footer->FooterElement()->get() as $detalle)
                <li class="list-group-item py-0 px-0 mb-1 bg-transparent">
                    <a href="{{$detalle->id_enlace?url($detalle->Enlace()->first()->estado=="A"?$detalle->Enlace()->first()->url:"/mantenimiento"):"#"}}" target="{{$detalle->id_enlace?$detalle->Enlace()->first()->metodo:"_self"}}">
                        {{ ($detalle->descripcion) }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<!-- Fecha Creación Field -->
<div class="ml-2 col-6 form-group">
    <b>{!! Form::label('created_at', 'Fecha Creación:') !!}</b>
    <p>{!! $footer->created_at !!}</p>
</div>

<!-- Fecha Actualización At Field -->
<div class="col-5 form-group">
    <b>{!! Form::label('updated_at', 'Fecha Actualización:') !!}</b>
    <p>{!! $footer->updated_at !!}</p>
</div>
