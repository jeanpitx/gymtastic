<div class="form-group col-sm-12">
    <h5>Información en tarjeta de la página web</h5>
    <div  style="border-bottom: 1px solid green; width=100%"></div>
</div>

@if($tarjeta->tipo_tarjeta=="tarjeta")
    <!-- Visualización del elemento Field TIPO TARJETA -->
    <div class="form-group visualiza text-center col-sm-12" style="display:block">
        <div class="col-xl-3 col-md-6 col-sm-6 d-flex mb-2">
            <div class="card flex-fill bg-transparent border-0">
                <a href="{{$tarjeta->id_enlace?url($tarjeta->Enlace()->first()->estado=="A"?$tarjeta->Enlace()->first()->url:"/mantenimiento"):"#"}}" target="{{$tarjeta->id_enlace?$tarjeta->Enlace()->first()->metodo:"_self"}}">
                    <div class="card-body pt-0 px-3">
                        <div class="px-4" style="min-height: 140px">
                            {!! Html::image($tarjeta->url_imagen, '...', ['class' => 'img-fluid']) !!}
                        </div>
                        <h6 class="card-title pt-3 img-round-title my-0 mt-1 targetfont">
                            {{ $tarjeta->titulo }}
                        </h6>
                        <p class="card-text img-round-text my-3 px-4 text-center describefont">
                            {{ $tarjeta->descripcion }}
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@else
    <!-- Visualización del elemento Field TIPO CIRCULO -->
    <div class="form-group visualiza text-center col-sm-12" style="display:block">
        <div class="col-xl-3 col-md-6 col-sm-6 d-flex mb-2 mb-md-5">
            <div class="card flex-fill bg-transparent border-0">
                <a href="{{$tarjeta->id_enlace?url($tarjeta->Enlace()->first()->estado=="A"?$tarjeta->Enlace()->first()->url:"/mantenimiento"):"#"}}" target="{{$tarjeta->id_enlace?$tarjeta->Enlace()->first()->metodo:"_self"}}">
                    <div class="card-body pt-0 pb-4 px-3 row">
                        <!--SI SE UTILIZA UN FOR LOS PARES DEBEN IR ANTES DE LA IMAGEN Y LOS IMPARES DESPUES
                        OJO SE DEBE CAMBIAR text-xs-right TO LEFT EN PARES E IMPARES SEGUN LO QUE SALGA
                        -->
                        <div class="col-lg-12 col-xs-7">
                            <h5 class="card-title pt-3 mb-2 img-round-title my-0 text-xs-right circlefont">
                                {!! $tarjeta->titulo !!}
                            </h5>
                            <p class="card-text img-round-text my-0 px-sm-2 text-lg-justify text-xs-right describefont" style="min-height: 65px">
                                {{ $tarjeta->descripcion }}
                            </p>
                        </div>
                        <div class="col-lg-12 col-xs-5 d-flex justify-content-center d-rounded-lg" style="width: 100%; height:100%">
                            <div class="bg-success div-img-round my-2">
                                {!! Html::image($tarjeta->url_imagen, '...', ['class' => 'rounded-circle img-round']) !!}
                            </div>
                        </div>
                        <div class="col-lg-12 col-xs-5 d-flex justify-content-center d-rounded-xs" style="width: 100%; height:100%;">
                            <div class="bg-success div-img-round my-2">
                                {!! Html::image($tarjeta->url_imagen, '...', ['class' => 'rounded-circle img-round']) !!}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endif

<!-- Fecha Creación Field -->
<div class="ml-2 col-6 form-group">
    <b>{!! Form::label('created_at', 'Fecha Creación:') !!}</b>
    <p>{!! $tarjeta->created_at !!}</p>
</div>

<!-- Fecha Actualización At Field -->
<div class="col-5 form-group">
    <b>{!! Form::label('updated_at', 'Fecha Actualización:') !!}</b>
    <p>{!! $tarjeta->updated_at !!}</p>
</div>
