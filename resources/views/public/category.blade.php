@extends('public/layouts.app')

@section('content')
<style>
    @media (max-width: 575px) {
        .imgresize{
            height: 140px;
            margin-top: -80px;
            margin-bottom: 0px;
        }
        .conresize{
            max-width: 80%;
            margin-left: 10%;
            padding-left: 30px !important;
            padding-right: 30px !important;
        }
    }
    @media (min-width: 575px) {
        .imgresize{
            height: 140px;
            margin-top: -80px;
        }
    }
</style>
    <div class="container" style="background: rgb(241, 241, 241)"> <!--p4-4 da un espacio arriba del contenido-->
        <div class="row">
            <!--MENÚ INTERNO-->
            @include('public.layouts.intermenu')
            <!--FIN MENÚ INTERNO-->

            <!--TARJETAS FIJA -->
            <div class="col-md-12 col-lg-8 pl-0 pl-lg-4 pr-0">
                {!! Html::image($categoria->url_imagen, 'BCM', ['class' => 'd-block w-100','alt'=>'Imagen']) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <!-- empieza -->
                            @foreach($categoria->CategoriaChild()->get() as $child)
                            <div class="col-xl-4 col-md-4 col-sm-6 d-flex" style="margin-top: 5rem !important;">
                                <div class="card flex-fill bg-transparent border-0">
                                    <div class="card-body px-4 px-lg-3 px-xl-4 conresize" style="background-color: #e6e6e6">
                                        <div class="imgresize">
                                            {!! Html::image($child->url_imagen, '...', ['class' => 'img-fluid']) !!}
                                        </div>

                                        <h6 class="card-title img-round-title my-0 mt-1 targetfont text-left pb-2 adjust" style="border-bottom:1px solid #36ad2d">
                                            {!!$child->titulo!!}
                                        </h6>

                                        <p class="card-text img-round-text describefont text-secondary" style="min-height: 40px;">
                                            {!!$child->descripcion!!}
                                        </p>
                                        <div class="w-100 d-flex justify-content-start">
                                        <a  href="{{$child->id_enlace?url($child->Enlace()->first()->estado=="A"?$child->Enlace()->first()->url:"/mantenimiento"):"#"}}" target="{{$child->id_enlace?$child->Enlace()->first()->metodo:"_self"}}" class="btn btn-light btn-sm btn-linea text-white navfont px-3" style="font-size:14px">
                                            Conoce más >>
                                        </a>
                                        </div>
                                    </div>
                              </div>
                            </div>
                            @endforeach
                            <!-- termina -->
                        </div><!-- TARJETAS ABAJO -->
                    </div>
                </div>
            </div>

            <!--SEPARADOR TEXTO-->
            <div class="col-md-12 pb-3" style="z-index: 100; margin-bottom:0px"></div>
            <!--FIN CONTENEDOR TARJETAS-->
            @include('public.layouts.footersub')
        </div>
    </div>
@endsection