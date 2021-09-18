<!--DESARROLLADO POR:
*JEAN PIERRE MEZA CEVALLOS
*IN: in/jeanpitx
*FB: jeanpitx
*TW: jeanpitx
FECHA DE PUBLICACIÓN: 09/11/2020
-->
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

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 4.1.1 -->
    {!! Html::style('libs/bootstrap4/css/bootstrap.min.css') !!}
    <!-- Theme style -->
    {!! Html::style('libs/coreui/css/coreui.min.css') !!}
    <!-- Ionicons -->
    {!! Html::style('libs/coreui/icons/coreui-icons-free.css') !!}
    <!-- fontawesome-->
    {!! Html::style('libs/fontawesome5/css/all.css') !!}
    <!-- iconos coreui-->
    {!! Html::style('libs/simple-line-icons/css/simple-line-icons.css') !!}
    {!! Html::style('css/principal_form.css') !!}
    <!-- select 2-->
    {!! Html::style('libs/select2/css/select2.min.css') !!}
    <style>
        .toupper { 
            text-transform: uppercase;
        }
        .tolower { 
            text-transform: lowercase;
        }
        .input-group-prepend>.fa, .input-group-prepend>.far, .input-group-prepend>.fas {
            padding-top: 10px;
        }
        ::-webkit-input-placeholder {
            text-transform: initial;
        }
        :-moz-placeholder { 
            text-transform: initial;
        }
        ::-moz-placeholder {  
            text-transform: initial;
        }
        :-ms-input-placeholder { 
            text-transform: initial;
        }

        @media (min-width: 1200px) {
            .input-group>.select2 { width: 75% !important; max-width: 75% !important;}
        }
        @media (min-width: 992px) and (max-width: 1200px) {
            .input-group>.select2 { width: 70% !important; max-width: 70% !important;}
        }
        @media (min-width: 768px) and (max-width: 992px) {
            .input-group>.select2 { width: 65% !important; max-width: 65% !important;}
        }
        @media (min-width: 575px) and (max-width: 768px) {
            .input-group>.select2 { width: 60% !important; max-width: 60% !important;}
        }
        @media (min-width: 375px) and (max-width: 575px) {
            .input-group>.select2 { width: 70% !important; max-width: 70% !important;}
        }
        @media (min-width: 0px) and (max-width: 375px) {
            .input-group>.select2 { width: 70% !important; max-width: 70% !important;}
        }
        .input-group-prepend>.fa, .input-group-prepend>.far {
            padding-top: 10px;
        }
        .input-group .select2-selection {
            border-radius: 0px !important;
            border: 1px solid #ced4da !important;
        }
    </style>
    

    <style>
        .white{
            color: white !important;
        }
        .toupper { 
            text-transform: uppercase;
        }
        .tolower { 
            text-transform: lowercase;
        }
    </style>

    <!-- Bootstrap y JQUERY   -->
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('libs/bootstrap4/js/popper.min.js') !!}
    {!! Html::script('libs/bootstrap4/js/bootstrap.min.js') !!}
    {!! Html::script('libs/tinymce/tinymce.min.js') !!}

</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{url("/home")}}">
        {{ Html::image('img/logov.png', config('app.name', 'Laravel'), ['class' => 'img-fluid', 'width' => 120 , 'height' => 30]) }}
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="" role="button" ><i class="fa fa-bars" aria-hidden="true" style="color:rgb(150, 150, 150)"></i></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
        <!--<li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </li>-->
        <li class="nav-item dropdown">
            <a class="nav-link" style="margin-right: 20px" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Sesión</strong>
                </div>
                <a href="{{route('password.expired')}}" class="dropdown-item btn btn-default btn-flat">
                    <i class="fa fa-lock"></i>Cambiar clave
                </a>
                <a href="{{ url('/logout') }}" class="dropdown-item btn btn-default btn-flat"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out-alt"></i>Cerrar sesión
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</header>

<div class="app-body">
    @include('layouts.sidebar')
    <main class="main">
        @yield('content')
    </main>
</div>



<footer class="app-footer">
    <div>
        <a href="http://entrenadinamica.com/" target="_blank">{{config('app.name', 'Laravel')}} </a>
        <span>&copy; {{ date('Y').' Developed with passion' }}.</span>
    </div>
    <div class="ml-auto">
        <span>Realizado por:</span>
        <i style="color: #00c0ff">Jean Meza Cevallos</i>
    </div>
</footer>
</body>

<!-- theme  -->
{!! Html::script('libs/coreui/js/coreui.min.js') !!}
{!! Html::script('libs/showpassword/showpw.js') !!}
{!! Html::script('js/validaciones.js') !!}
<!-- Zooom imagen -->
{!! Html::script('libs/mdmzoom/zooming.js') !!}
<!-- Jean Meza -->
{!! Html::script('js/formulario.js') !!}
<!-- select2 -->
{!! Html::script('libs/select2/js/select2.min.js') !!}

@stack('scripts')
<script>
    function randomString() {
        if (document.getElementsByClassName("autogeneric")){
            var result = '';
            var length=10;
            var chars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*-.';
            for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
            if (document.getElementsByClassName("autogeneric"))
                $(".autogeneric").val(result);
        }
    }
    randomString();

    if($('select[name=filtro_ciudad]').val()){
        var myTimer = setInterval(function () {
                $(".select2-selection").css({
                    'height': '35px',
                    'padding-top': '4px',
                    'margin-top': '0px'
                });
                $(".select2-selection__arrow").css({
                    'margin-top': '6px'
                });
            clearInterval(myTimer);
        }, 50);
        $('.filtro_ciudad').select2({
            placeholder: 'Seleccione Ciudad',
            allowClear: false
        });
        $('#ciudad').val("all").trigger('change');
    }
    function goBack() {
        window.history.back();
    }
</script>

</html>
