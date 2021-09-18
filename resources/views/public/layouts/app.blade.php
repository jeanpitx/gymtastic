<!--DESARROLLADO POR:
*JEAN PIERRE MEZA CEVALLOS
*IN: in/jeanpitx
*FB: jeanpitx
*TW: jeanpitx
FECHA DE PUBLICACIÓN: 09/11/2020
-->
@inject('service', 'App\Clases\Utilities')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('img/icono.svg')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @if(!empty($titlehead))
        <title>{!! strip_tags($titlehead).' - '.config('app.name', 'Laravel') !!}</title>
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

    <!-- Bootstrap CSS 4.0.1-->
    {!! Html::style('libs/bootstrap4/css/bootstrap.min.css') !!}
    <!-- fontawesome-->
    {!! Html::style('libs/fontawesome5/css/all.css') !!}
    <!-- Jean Meza -->
    {!! Html::style('css/principal.css') !!}
    <!-- Bootstrap y JQUERY PARA COMPROBAR CEDULA  -->
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('libs/bootstrap4/js/popper.min.js') !!}
    {!! Html::script('libs/bootstrap4/js/bootstrap.min.js') !!}
    {!! Html::style('libs/annojs/anno.css') !!}
    <style>
        .box{
            border-radius: 3px;
            -webkit-box-shadow: 0 0px 4px #777;
            -moz-box-shadow: 0 0px 4px #777;
            box-shadow: 0 0px 4px #777;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P19PKZR4Q2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-P19PKZR4Q2');
    </script>
</head>
<body>
    <div id="app">
        @include('public.layouts.navbar')
        <main class="container">
            @yield('content')
        </main>
    </div>

    <!-- AdminLTE App -->
    {!! Html::script('js/app.min.js') !!}
    <!-- Jean Meza -->
    {!! Html::script('js/principal.js') !!}
    {!! Html::script('libs/annojs/anno.js') !!}
    <script type="text/javascript">
        var anno1 = new Anno([
            {
                target:'.navbar',
                content: 'Bienvenido a la nueva página web del <b>BCM</b>,<br>¿Desea ver una guía de la página?',
                className: 'anno-width-400',
                buttons: [
                    {
                        text:'Empezar Guía'
                    },{
                        text: 'Omitir',
                        className: 'anno-btn-low-importance',
                        click: function(anno, evt){
                            anno.hide();
                            setCookie("initial","ok",700);
                        }
                    }
                ]
            },
            {
                target : '.mnufloat-pc',
                content: 'Su banca en línea de siempre, en un lugar mas accesible.',
                buttons: {
                    text:'Siguiente'
                }
            },
            {
                target : '.inmenu-parent',
                content: 'Un nuevo menú interactivo, que facilita la navegación',
                buttons: {
                    text:'Siguiente'
                }
            },
            {
                target : '.btn-chat',
                content: 'Comunicate con nuestro personal de servicio al cliente, dispuesto a resolver todas tus inquietudes.',
                buttons: {
                    text:'Siguiente'
                }
            },
            {
                target : '.btn-soli',
                content: 'Ahora puedes solicitar productos desde la web y sin salir de casa.',
                buttons: {
                    text:'Finalizar Guía',
                    click: function(anno, evt){
                        anno.hide();
                        setCookie("initial","ok",700);
                    }
                }
            }
        ]);
        $('#ModalWelcome').on('hide.bs.modal', function (e) {
            if($(window).width()>991 && !getCookie("initial")){
                console.log("inicial guardado");
            }
        });
    </script>
    
</body>
</html>
