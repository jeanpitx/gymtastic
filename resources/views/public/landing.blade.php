<!--DESARROLLADO POR:
*JEAN PIERRE MEZA CEVALLOS
*IN: in/jeanpitx
*FB: jeanpitx
*TW: jeanpitx
FECHA DE PUBLICACIÓN: 31/08/2020
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
        <title>{!! str_replace('</b>','',str_replace('<b>','',$titlehead)).' - '.config('app.name', 'Laravel') !!}</title>
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endif


    <!-- Bootstrap CSS 4.0.1-->
    {!! Html::style('libs/bootstrap4/css/bootstrap.min.css') !!}
    <!-- fontawesome-->
    {!! Html::style('libs/fontawesome5/css/all.css') !!}
    <!-- Jean Meza -->
    {!! Html::style('css/principal.css') !!}
    {!! Html::style('css/cardselector.css') !!}
    
    <!-- select 2-->
    {!! Html::style('libs/select2/css/select2.min.css') !!}
    <style>
        .input-group-prepend>.fa, .input-group-prepend>.far, .input-group-prepend>.fas {
            padding-top: 10px;
        }
        @media (min-width: 1200px) {
            .input-group>.select2 { width: 89.5% !important; max-width: 89.5% !important;}
            .inst_financiera_selec2>.select2 { width: 82% !important; max-width: 82% !important;}
            .modal .input-group .select2 { max-width: 84% !important;}
        }
        @media (min-width: 992px) and (max-width: 1200px) {
            .input-group>.select2 { width: 88% !important; max-width: 88% !important;}
            .inst_financiera_selec2>.select2 { width: 78% !important; max-width: 78% !important;}
            .modal .input-group .select2 { max-width: 84% !important;}
        }
        @media (min-width: 768px) and (max-width: 992px) {
            .input-group>.select2 { width: 83% !important; max-width: 83% !important;}
            .inst_financiera_selec2>.select2 { width: 68% !important; max-width: 68% !important;}
            .modal .input-group .select2 { max-width: 77% !important;}
        }
        @media (min-width: 575px) and (max-width: 768px) {
            .input-group>.select2 { width: 84% !important; max-width: 84% !important;}
            .inst_financiera_selec2>.select2 { width: 54% !important; max-width: 54% !important;}
            .modal .input-group .select2 { max-width: 100% !important;}
        }
        @media (min-width: 375px) and (max-width: 575px) {
            .input-group>.select2 { width: 81% !important; max-width: 81% !important;}
            .inst_financiera_selec2>.select2 { width: 81% !important; max-width: 81% !important;}
            .modal .input-group .select2 { max-width: 100% !important;}
            .container{ padding-left: 0px !important; padding-right: 0px !important;}
            .card-body{ padding-left: 10px !important; padding-right: 10px !important;}
            h2{ font-size: 28px}
        }
        @media (min-width: 0px) and (max-width: 375px) {
            .input-group>.select2 { width: 78% !important; max-width: 78% !important;}
            .inst_financiera_selec2>.select2 { width: 78% !important; max-width: 78% !important;}
            .modal .input-group .select2 { max-width: 100% !important;}
            .container{ padding-left: 0px !important; padding-right: 0px !important;}
            .card-body{ padding-left: 10px !important; padding-right: 10px !important;}
            h2{ font-size: 28px}
        }
        .input-group-prepend>.fa, .input-group-prepend>.far {
            padding-top: 10px;
        }
        
        #ctn-multiple>.fa, #ctn-multiple>.far{
            padding-top: 0px !important;
        }
        
        .ibtnMdf:hover {
            border-color:  #17a2b8;
        }
        .ibtnDel:hover {
            border-color: #FF0000;
        }
        .sell .input-group-addon {
            width: 13% !important;
        }
        .input-group .select2-selection {
            border-radius: 0px !important;
            border: 1px solid #ced4da !important;
        }
        .table input.form-control {
            /*max-width: 150px;*/
            margin-top:-5px;
            margin-bottom:-5px;
            margin-right:-5px;
            display: none
        }
        .toupper { 
            text-transform: uppercase;
        }
        .tolower { 
            text-transform: lowercase;
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
        .popover  {
            border-color: #dc3545!important;
        }
        .popover-header  {
            background: #dc3545!important;
            color: white !important;
            font-size: 14px;
            padding-top: 6px;
            padding-bottom: 6px;
        }
        .popover-body  {
            font-size: 12px;
            padding-top: 6px;
            padding-bottom: 6px;
        }
        .popover[x-placement="left"] .arrow::after  {
            border-left-color: #dc3545!important;
        }
        .popover[x-placement="top"] .arrow::after  {
            border-top-color: #dc3545!important;
        }
        .popover[x-placement="bottom"] .arrow::after  {
            border-bottom-color: #dc3545!important;
        }
        @media (min-width: 768px) {#extension_empresa{max-width:70px;}}
        @media (min-width: 575px) and (max-width: 768px) {#extension_empresa{max-width:60px;}}
        @media (min-width: 0px) and (max-width: 575px) {#extension_empresa{max-width:50px;}}
    </style>
    <style>
        #map {
          height: 55vh;
        }
    </style>
    <style>
        #map_empresa {
          height: 55vh;
        }
    </style>

    @if(config('recaptcha-v3.enable'))
        <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render={{config('recaptcha-v3.site_key')}}"></script>
    @endif

    <!-- Bootstrap y JQUERY PARA COMPROBAR CEDULA  -->
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('libs/bootstrap4/js/popper.min.js') !!}
    {!! Html::script('libs/bootstrap4/js/bootstrap.min.js') !!}
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P19PKZR4Q2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-P19PKZR4Q2');
    </script>
    <style>
        @font-face { font-family: CodecProBold; src: url("css/type/Codec-Pro-Bold-trial.ttf");}
        @font-face { font-family: CodecPro; src: url("css/type/Codec-Pro-News.ttf");}
        .input-group-text{
            background: #17a2b8 !important;
            color: white !important;
            border-radius: 0 !important;
            border-color: #233a85 !important;
        }
        .input-group-append button{
            border-radius: 0 !important;
        }
        .form-control, .select2-selection{
            border-color: #233a85 !important;
        }
        html, body {
            max-width: 100%;
            overflow-x: hidden;
            font-family: CodecPro;
        }
        .title{height:90px;}
        .title-blue{background: #233A85; color:#fff;}
        .title-grey{background: #c8ced3; color:#233A85;}
        .title-pink{background: #f29a9d; color:#233A85;}
        .title-cian{background: #60bfe7; color:#233A85;}
        .title h1{font-size:28px;width: 100%; font-family: CodecPro;}
        .title h1 b{font-family: CodecProBold;}
        .solicitela{font-size:18px; color:white; margin-top: -6px; font-family: CodecProBold;}
        .title .first{
            white-space: nowrap;
            font-size: 2.9vw;
        }
        .para-ti{font-size:5vw;}
        .para-ti-text{font-size:3vw;}
        .para-ti-text b{font-family: CodecProBold;}
        .beneficios-li b{font-family: CodecProBold;}
        .beneficios-li li{padding-bottom: 8px;}
        .beneficios-li{padding-top: 22%; font-size: 2.1vw;}
        .beneficios-li ul{margin-top: 8px;}
        .title-cian a{color:#233A85;}
        @media (max-width: 568px) {
            .title h1{
                font-size: 4vw;
            }
            .title .first{
                white-space: nowrap;
                font-size: 3.5vw;
            }
            .solicitela{font-size:15px}
            .beneficios-li li{padding-bottom: 0px;}
            .beneficios-li{padding-top: 12%; font-size: 2.2vw;}
            .beneficios-li ul{margin-top: 12px;}
        }
        @media (min-width: 569px) and (max-width: 991px) {
            .beneficios-li li{padding-bottom: 0px;}
            .beneficios-li{padding-top: 14%; font-size: 2.3vw; padding-left: 3% !important}
            .beneficios-li ul{margin-top: 10px;}
        }
        @media screen and (min-width: 1200px) {
            .title .first{font-size: 40px;}
            .para-ti{font-size:58px; font-family: CodecProBold;}
            .para-ti-text{font-size:28px;}
            .title-pink h1{font-size:34px;}
            .beneficios-li ul{padding-top: 15px;}
        }
    </style>
</head>
<body style="background: transaparent">
    <main class="py-0 px-0 container-fluid">
        <div>
            <div class="row">
                <div class="col-12">
                    {!! Html::image(url('img/meta.png'), 'La meta', ['class' => 'img-fluid','style' => 'width:100%']) !!}
                    <a href="#fomrsend">
                        {!! Html::image(url('img/juntos.png'), 'Empecemos juntos', ['class' => 'img-fluid','style' => 'width:100%']) !!}
                    </a>
                </div>
            </div>
        </div>

        <div id="form">
            {!! Form::open(['route' => 'landing.store','id'=>'fomrsend','class'=>'upload-form']) !!}
            @csrf
            
            @if(config('recaptcha-v3.enable'))
                <input type="hidden" name="{{config('recaptcha-v3.input_name')}}" id="{{ md5(config('recaptcha-v3.input_name')) }}">
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-important" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @foreach ($errors->all() as $error)
                    <strong>*</strong> {{$error}}<br>
                    @endforeach
                </div>
            @endif
            @include('flash::message')
            <div class="container-fluid px-0 py-0"> <!--p4-4 da un espacio arriba del contenido-->
                <div class="row">
                    <div class="collapse multi-collapse" id="colapsito">
                        <div class="card" style="border-radius: 0%; border-style: none;">
                            <div class="card-body px-0 py-0">
                                <div id="loading" style="position: absolute; left:0; z-index:100; width:100%; height:100%; background:white; padding-top:10px; color:rgb(92, 89, 89); text-align:center; font-size:20px; display:none;">
                                    <p>Consultando...</p>
                                </div>

                                <div class="title title-blue w-100 col-12">
                                    <div class="offset-lg-2 col-lg-8 col-md-9 offset-md-1 col-12 h-100 d-flex align-items-center">
                                        <h1>Inicia este reto con nosotros</h1>
                                    </div>
                                </div>

                                <div class="title title-grey w-100 col-12 ">
                                    <div class="offset-lg-2 col-lg-8 col-md-9 offset-md-1 col-12 h-100 d-flex align-items-center">
                                        <h1>Datos Personales</h1>
                                    </div>
                                </div>

                                <div class="col-lg-8 offset-lg-2 col-md-9 offset-md-1">
                                    <div class="form-group col-12 mt-3">
                                        <p class="form-text my-0 w-100 text-justify" style="font-size:15px; color:rgb(68, 68, 68)">
                                            <b>¡Bienvenido!</b>, Este formulario le permitira ponerse en contacto con nosotros, este es el primer paso hacia un mundo lleno de oportunidades y experiencias. <span class="text-info">Lo mas pronto posible nos contactarenmos contigo.</span>
                                        </p>
                                        <p class="form-text text-muted">Campos con (<b class="text-danger">*</b>) son obligatorios</p>
                                        <hr>
                                    </div>
                                    <!-- Identificacion y Nacionalidad -->
                                    <div class="row d-flex justify-content-around">
                                        <div class="form-group col-md-6">
                                            <div class="col">
                                                {!! Form::label('identificacion', 'Identificación') !!}<b class="text-danger"> *</b>
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-id-card"></i></div>
                                                    {!! Form::text('identificacion', null, ['class' =>'form-control form-control-sm '.($errors->has('identificacion')?'is-invalid':''),'placeholder' => 'Ingrese su Identificación','onkeypress' => 'soloNumeros(event);','required','minlength'=>'10','maxlength'=>'10']) !!}
                                                    <span class="invalid-feedback">{{ $errors->first('identificacion') }}</span>

                                                    <div class="input-group-append ctn-multiple-btn">
                                                        <button class="btn btn-outline-info" type="button" title="Consultar Identificación" id="btn_consulta_identifiacion" style="font-size: 13px">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col sell">
                                                {!! Form::label('nacionalidad', 'Nacionalidad ') !!}<b class="text-danger"> *</b>
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-globe"></i></div>
                                                    {{ Form::text('nacionalidad', null, ['class' => 'form-control form-control-sm toupper '.($errors->has('nacionalidad')?'is-invalid':''),'placeholder' => 'Ingrese su Nacionalidad', 'required','readonly']) }}
                                                    <span class="invalid-feedback">{{ $errors->first('nacionalidad') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <!-- Nombres completos-->
                                    <div class="row d-flex  justify-content-around">
                                        <div class="form-group col-md-12">
                                            <div class="col">
                                                {!! Form::label('nombres_completos', 'Nombres completos') !!}<b class="text-danger"> *</b>
                                                <div class="input-group input-group-sm margin-bottom-sm">
                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-user"></i></div>
                                                    {!! Form::text('nombres_completos', null, ['class' =>
                                                    'form-control form-control-sm toupper '.($errors->has('nombres_completos')?'
                                                    is-invalid':''),'placeholder' => 'Ingrese su nombre completo','required','onkeypress' => 'SoloLetras(event);']) !!}
                                                    <span
                                                        class="invalid-feedback">{{ $errors->first('nombres_completos') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Fecha de nacimiento y Género-->
                                    <div class="row d-flex  justify-content-around">
                                        <div class="form-group col-md-6">
                                            <div class="col">
                                                {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento') !!}<b class="text-danger"> *</b>
                                                <div class="input-group input-group-sm margin-bottom-sm">
                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-calendar"></i></div>
                                                    {!! Form::date('fecha_nacimiento', null, ['class' =>
                                                    'form-control form-control-sm '.($errors->has('fecha_nacimiento')?'
                                                    is-invalid':''),'placeholder' => 'Ingrese fecha de nacimiento','required']) !!}
                                                    <span
                                                        class="invalid-feedback">{{ $errors->first('fecha_nacimiento') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @push('scripts')
                                            <script type="text/javascript">
                                                $('#fecha_nacimiento').datetimepicker({
                                                    format: 'YYYY-MM-DD HH:mm:ss',
                                                    useCurrent: true,
                                                    icons: {
                                                        up: "icon-arrow-up-circle icons font-2xl",
                                                        down: "icon-arrow-down-circle icons font-2xl"
                                                    },
                                                    sideBySide: true
                                                })
                                            </script>
                                        @endpush
                                        <div class="form-group col-md-6">
                                            <div class="col sell">
                                                {!! Form::label('ciudad', 'Ciudad') !!}<b class="text-danger"> *</b>
                                                <div class="input-group input-group-sm margin-bottom-sm">
                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-map"></i></div>
                                                    {{ Form::select('ciudad', $ciudad, null, ['id' => 'ciudad','class' => 'form-control form-control-sm ciudad ','required']) }}
                                                    <span class="invalid-feedback">{{ $errors->first('ciudad') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Correo electrónico y Numero Celular -->
                                    <div class="row d-flex  justify-content-around">
                                        <div class="form-group col-md-6">
                                            <div class="col ">
                                                {!! Form::label('correo', 'Correo Electrónico') !!}<b class="text-danger"> *</b>
                                                <div class="input-group input-group-sm margin-bottom-sm">
                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-envelope"></i></div>
                                                    {!! Form::email('correo', null, ['class' =>
                                                    'form-control form-control-sm tolower '.($errors->has('correo')?'
                                                    is-invalid':''),'placeholder' => 'Ingrese su correo','required']) !!}
                                                    <span
                                                        class="invalid-feedback">{{ $errors->first('correo') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="col">
                                                {!! Form::label('celular', 'Número Celular') !!}<b class="text-danger"> *</b>
                                                <div class="input-group input-group-sm margin-bottom-sm">
                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-phone"></i></div>
                                                    {!! Form::text('celular', null, ['id'=>'celular','class' =>
                                                    'form-control form-control-sm tolower pruebita '.($errors->has('celular')?'
                                                    is-invalid':''),'placeholder' => 'Ingrese su telefono celular','required','maxlength'=>'10','onkeypress' => 'soloNumeros(event);']) !!}
                                                    <span
                                                        class="invalid-feedback">{{ $errors->first('celular') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                        <!-- Convencional y direccion-->
                                        <div class="row d-flex  justify-content-around">
                                            <div class="form-group col-sm-6">
                                                <div class="col">
                                                    {!! Form::label('convencional', 'Número Convencional') !!}
                                                    <div class="input-group input-group-sm margin-bottom-sm">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-phone"></i></div>
                                                        {!! Form::text('convencional', null, ['id'=>'convencional','class' =>
                                                        'form-control form-control-sm tolower pruebita'.($errors->has('convencional')?'
                                                        is-invalid':''),'placeholder' => 'Ingrese su telefono convencional','maxlength'=>'10','onkeypress' => 'soloNumeros(event);']) !!}
                                                        <span
                                                            class="invalid-feedback">{{ $errors->first('convencional') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <div class="col">
                                                    {!! Form::label('direccion', 'Dirección domicilio') !!}<b class="text-danger"> *</b>
                                                    <div class="input-group input-group-sm margin-bottom-sm">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-map-marker"></i></div>
                                                        {!! Form::text('direccion', null, ['class' =>
                                                        'form-control toupper'.($errors->has('direccion')?'
                                                        is-invalid':''),'placeholder' => 'Ingrese dirección','required']) !!}
                                                        <span
                                                            class="invalid-feedback">{{ $errors->first('direccion') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Sexo y Deporte que practica -->
                                        <div class="row d-flex  justify-content-around">
                                            <div class="form-group col-sm-6">
                                                <div class="col">
                                                    {!! Form::label('sexo', 'Sexo') !!}
                                                    <div class="input-group input-group-sm margin-bottom-sm">
                                                        <div class="input-group-prepend"><i class="input-group-text fas fa-mars"></i></div>
                                                        {!! Form::text('sexo', null, ['id'=>'sexo','class' =>
                                                        'form-control form-control-sm toupper'.($errors->has('sexo')?'
                                                        is-invalid':''),'placeholder' => 'Ingrese su Género','maxlength'=>'10','onkeypress' => 'soloLetras(event);']) !!}
                                                        <span
                                                            class="invalid-feedback">{{ $errors->first('sexo') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <div class="col">
                                                    {!! Form::label('deporte', 'Deporte que practica') !!}<b class="text-danger"> *</b>
                                                    <div class="input-group input-group-sm margin-bottom-sm">
                                                        <div class="input-group-prepend"><i class="input-group-text fas fa-dumbbell"></i></div>
                                                        {!! Form::text('deporte', null, ['class' =>
                                                        'form-control toupper'.($errors->has('deporte')?'
                                                        is-invalid':''),'placeholder' => 'Ingrese el deporte que practica','required']) !!}
                                                        <span
                                                            class="invalid-feedback">{{ $errors->first('deporte') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    

                                    <!-- Ubicación-->
                                    <div class="row d-flex  justify-content-around">
                                        <div class="form-group col-md-12">
                                            <div class="col">
                                                <div>{!! Form::label('coordenadas', 'Seleccione ubicación domicilio') !!}<b class="text-danger"> *</b></div>
                                                <div class="input-group input-group-sm">
                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-map fa"></i></div>
                                                    {!! Form::text('coordenadas', null, ['class' => 'form-control form-control-sm '.($errors->has('coordenadas')?'
                                                    is-invalid':''),'placeholder' => 'Coordenadas','readonly','required']) !!}

                                                    <div class="input-group-append ctn-multiple-btn">
                                                        <button class="btn btn-outline-info" type="button" title="Seleccionar Ubicación"  data-toggle="modal" data-target="#modalLocation" id="btn_location_persona"  style="font-size: 13px"
                                                            data-toggle="popover" data-placement="top" data-content="Error: Seleccione su ubicación aquí">
                                                            <i class="fa fa-map-marker"></i> Seleccionar Ubicación 
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- EMPIEZA CODIGO UBICACION PERSONA MODAL -->
                                    <div class="modal"  id="modalLocation" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTableTitle" >Seleccionar Ubicación</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <!-- OJO AÑADIR ctn-multi-table-modal-->
                                                <div class="modal-body ctn-multi-table-modal">
                                                    <p><b>Ubicación Seleccionada</b> <i id="info_ubication">ninguna</i></p>
                                                    <div id="map"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button id="save_ubication" type="button" class="btn btn-primary">Guardar Ubicación</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <!-- Comentario -->
                                    <div class="row d-flex  justify-content-around">
                                        <div class="form-group col-sm-12">
                                            <div class="col">
                                                {!! Form::label('comentario', 'Comentarios') !!}
                                                <div class="input-group input-group-sm margin-bottom-sm">
                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-comments"></i></div>
                                                    {!! Form::textarea('comentario', null, ['id'=>'comentario','class' =>
                                                    'form-control toupper'.($errors->has('comentario')?'
                                                    is-invalid':''),'placeholder' => 'Ingrese su Comentario','rows'=> 2]) !!}
                                                    <span class="invalid-feedback">{{ $errors->first('comentario') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 offset-lg-2 col-md-9 offset-md-1 mt-3 mb-4">
                                    <div class="col text-center" style="margin-top:-10px;">
                                        <button id="btnsave" class="btn btn-info mx-auto" type="submit" value="Guardar" style="margin-top:30px "
                                        data-sitekey="{{config('recaptcha-v3.site_key')}}" 
                                        data-callback='onSubmit' 
                                        data-action='submit'
                                        data-toggle="popover" title="Error" data-content="Usted no ha completado toda la información"
                                        >
                                            Enviar consulta <i class="fa fa-save"></i>
                                        </button>
                                        <a class="btn btn-secondary ml-2 g-recaptcha" onclick="if (!confirm('Esta seguro?, se eliminará la información ingresada')) event.preventDefault();" href="{{ route('solicita') }}" style="margin-top:30px ">
                                            Cancelar <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>

                                
                                <div class="title title-blue w-100 col-12">
                                    <div class="offset-lg-2 col-lg-8 col-md-9 offset-md-1 col-12 h-100 d-flex align-items-center">
                                        <h1>En unos días nos contactaremos contigo</h1>
                                    </div>
                                </div>
                                <div class="title title-blue w-100 col-12 d-flex align-items-end" style="height: 25px; font-size:10px;">
                                    <div class="offset-lg-2 col-lg-8 col-md-9 offset-md-1 col-12">
                                        {{ config('app.name', 'Laravel') }} {!!date("Y")!!} ©. Desarrollado por: Jean Meza Cevallos. Todos los derechos reservados.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </main>

    
    <!-- Modal errores -->
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white py-2">
                    <h6 class="modal-title" id="exampleModalLabel">Ha ocurrido un error</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap y JQUERY AL INICIO  -->
    <!-- select2 -->
    {!! Html::script('libs/select2/js/select2.min.js') !!}

    <!-- Jean Meza -->
    {!! Html::script('js/st/multi-input-group.js') !!}
    {!! Html::script('js/st/multi-input-group-personalice.js') !!}
    {!! Html::script('js/st/multi-input-table.js') !!}
    {!! Html::script('js/st/cardselect.js') !!}
    {!! Html::script('js/st/solicitud_simple.js') !!}
    {!! Html::script('js/validaciones.js') !!}
    {!! Html::script('js/principal.js') !!}

    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYJO2PChEbwGdiy5NKxl7m5tAeFaMOIFg&callback=initMap">
    </script>

    @if(config('recaptcha-v3.enable'))
        <script>
            $('#fomrsend').submit(function(event) {
                event.preventDefault();
        
                grecaptcha.ready(function() {
                    grecaptcha.execute("{{config('recaptcha-v3.site_key')}}", {action: "solicitud"}).then(function(token) {
                        document.getElementById("{{ md5(config('recaptcha-v3.input_name')) }}").value = token;
                        $('#fomrsend').unbind('submit').submit();
                    });;
                });
            });
        </script>
    @endif

    <script>
        $('#colapsito').collapse('show');
        function callFunctionPersona(){ ejecutaConsultaPersonaSimple("{{ url('/cidsoli') }}");}
    </script>
</body>
</html>