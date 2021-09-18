<!--DESARROLLADO POR:
*JEAN PIERRE MEZA CEVALLOS
*IN: in/jeanpitx
*FB: jeanpitx
*TW: jeanpitx
FECHA DE PUBLICACIÓN: 09/11/2020
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Bootstrap CSS 4.0.1-->
        {!! Html::style('libs/bootstrap4/css/bootstrap.min.css') !!}
        <!-- fontawesome-->
        {!! Html::style('libs/fontawesome5/css/all.css') !!}
        <style>
            @media (min-width: 767px) and (max-width: 1200px){
                .font-error{
                    font-size: 40px;
                }
                .font-code{
                    font-size: 70px;
                }
            }
            @media (max-width: 767px){
                .font-error{
                    font-size: 40px;
                }
                .font-code{
                    font-size: 70px;
                }
            }
            @media (min-width: 420px) and (max-width: 576px){
                .pt-xs-5{
                    padding-top: 3rem !important;
                }
            }
            @media (min-width: 0px) and (max-width: 385px){
                .pt-xxs-5{
                    padding-top: 3rem !important;
                }
            }
            @media (min-width: 767px){
                .mw-message{
                    max-width: 220px
                }
            }
            .btn-linea{
                background: rgba(99,209,8,1);
                background: -moz-linear-gradient(left, rgba(99,209,8,1) 0%, rgba(72,128,23,1) 100%);
                background: -webkit-gradient(left top, right top, color-stop(0%, rgba(99,209,8,1)), color-stop(100%, rgba(72,128,23,1)));
                background: -webkit-linear-gradient(left, rgba(99,209,8,1) 0%, rgba(72,128,23,1) 100%);
                background: -o-linear-gradient(left, rgba(99,209,8,1) 0%, rgba(72,128,23,1) 100%);
                background: -ms-linear-gradient(left, rgba(99,209,8,1) 0%, rgba(72,128,23,1) 100%);
                background: linear-gradient(to right, rgba(99,209,8,1) 0%, rgba(72,128,23,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#63d108', endColorstr='#488017', GradientType=1 );
            }

            .btn-linea:hover {
                color: #fff;
                background-color: #d8dbdd;
                border-color: #1aa808;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid" style="min-height: 100vh;background-color: #ededed">
            <div class="row">
                <div class="col-12 d-flex align-items-center" style="min-height: 12vh;background-color: white;">
                    <div class="row w-100">
                        <div class="col-sm-12 col-md-10 col-lg-6 pl-5">
                            <a href="{{ url('/') }}">
                                {!! Html::image('img/logolr.svg', {{ config('app.name', 'Laravel') }}, ['class' => 'img-fluid','style' => 'max-width:400px']) !!}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex pt-5 justify-content-center" style="min-height: 82vh;">
                    <div class="container w-100 pt-md-5">
                        <div class="row d-flex justify-content-center text-success pt-md-4">
                            <div class="col-auto">
                                {!! Html::image('img/errorpage.svg', {{ config('app.name', 'Laravel') }}, ['class' => 'img-fluid','style' => 'max-width:150px']) !!}
                            </div>
                            <div class="col-auto pt-1" style="text-align: right; font-family: Arial, Helvetica, sans-serif">
                                <h1 class="my-2 font-error" style="font-size: 40px;">
                                    ERROR
                                </h1>
                                <h1 class="my-2 mt-2 font-code" style="font-size: 70px; line-height: 60px;">
                                    @yield('code')
                                </h1>
                            </div>
                            <div class="col-auto pt-sm-5 pt-xs-5 pt-xxs-5">
                                <div class="mt-3" style="height: 70px;border-right: 5px solid #28a745; width:2px; background-color: green"></div>
                            </div>
                            <div class="col-auto text-secondary mt-md-5 mw-message">
                                <h2 class="mt-3" style="line-height: 30px;">
                                    @yield('message')
                                </h2>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-center pl-0 pl-sm-5" style="font-family: Arial, Helvetica, sans-serif">
                                <div class="row pl-sm-5 mt-3">
                                    <div class="col-auto mx-sm-5">
                                        <button type="button" onclick="goBack()" class="btn btn-lg btn-linea text-white" style="font-size:18px; min-width:150px">
                                            <i class="fas fa-arrow-left"></i> Regresar
                                        </button>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ url('/') }}" class="btn btn-lg btn-linea text-white" style="font-size:18px; min-width:150px">
                                            <i class="fas fa-home"></i> Ir a inicio
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</html>
