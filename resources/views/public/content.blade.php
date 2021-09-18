@inject('service', 'App\Clases\Utilities')
@extends('public/layouts.app')

@section('content')
    <div class="container" style="background: rgb(241, 241, 241)"> <!--p4-4 da un espacio arriba del contenido-->
        <div class="row">
            <!--MENÚ INTERNO-->
            @include('public.layouts.intermenu')
            <!--FIN MENÚ INTERNO-->

            <!--IMAGEN FIJA -->
            <div class="col-md-12 col-lg-8 pl-0 pl-lg-4 pr-0">
                {!! Html::image($interna->url_imagen, 'BCM', ['class' => 'd-block w-100','alt'=>'Imagen']) !!}
            </div>
            
            @if($interna->titulo=='SERVICIOS <b>FINANCIEROS</b>')
                <style type="text/css">
                    .contenido h3{
                        font-size: 16px;
                    }
                    .contenido h3 > strong{
                        color:rgb(19, 77, 33) !important;
                        font-size: 18px;
                    }
                    /*.contenido a{
                        color:#0056b3;
                    }
                    .contenido a:hover{
                        color:#007bff;
                    }*/
                </style>
            @endif
            <!--CONTENIDO TEXTO-->
            <div class="col-md-12 pt-1 pb-3 bg-transparent px-0" style="z-index: 100; margin-bottom:0px">
                <div class="row">
                    <div class="col-md-12 col-lg-4 d-flex justify-content-center pt-2">
                        @if($interna->id_enlace)
                            <a class="my-2 my-sm-0 w-100 d-flex justify-content-center " style="max-height:96px; background-color:#e6e6e6; font-size:13px;" href="{{$interna->id_enlace?url($interna->Enlace()->first()->estado=="A"?$interna->Enlace()->first()->url:"/mantenimiento"):"#"}}" target="{{$interna->id_enlace?$interna->Enlace()->first()->metodo:"_self"}}">
                                {!! Html::image($interna->url_boton, 'BCM', ['class' => 'd-block','style' => 'max-width:85%','alt'=>'Imagen']) !!}
                            </a>
                        @endif
                    </div>
                    <div class="col-md-12 col-lg-8 pr-0 px-0 ml-lg-auto pl-lg-4">
                        <div class="contenido ml-lg-1 ml-3 mr-3">
                            <div class="titlecontent mb-2">{!! $interna->titulo !!}</div>
                            {!! $interna->contenido !!}
                            @if(str_contains($interna->titulo,'M&oacute;vil'))<!--CODIGO BANCA MÓVIL-->
                                    <div class="w-100 mt-3 mb-2 d-flex justify-content-center">
                                        <a class="mx-2 movilbcm" href="{{$service->filterUrlArray($service->filterFixed($fijas,"menu-playstore")->enlace)}}" target="{{$service->filterFixed($fijas,"menu-playstore")->enlace["metodo"]??"_self"}}" title="{{$service->filterFixed($fijas,"menu-playstore")->descripcion}}">
                                            {!! Html::image('img/welcome/GooglePlay.svg', 'Tienda App Store', ['class' => 'img-fluid','style' => 'max-width:150px']) !!}
                                        </a>
                                        <a class="mx-2 movilbcm" href="{{$service->filterUrlArray($service->filterFixed($fijas,"menu-appstore")->enlace)}}" target="{{$service->filterFixed($fijas,"menu-appstore")->enlace["metodo"]??"_self"}}" title="{{$service->filterFixed($fijas,"menu-appstore")->descripcion}}">
                                            {!! Html::image('img/welcome/AppStore.svg', 'Tienda App Store', ['class' => 'img-fluid','style' => 'max-width:150px']) !!}
                                        </a>
                                    </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div><!--FIN CONTENEDOR TARJETAS-->
            @include('public.layouts.footersub')
        </div>
    </div>
    <script>
        $(".contenido a").not(".movilbcm").each(function(index) {
            $(this).attr("class","btn btn-success btn-sm py-0 px-1 my-0 mx-2 mb-2");
            $(this).html("<i class='fas fa-link'></i> "+$(this).html());
        });
    </script>
@endsection