<!--DESARROLLADO POR:
*JEAN PIERRE MEZA CEVALLOS
*IN: in/jeanpitx
*FB: jeanpitx
*TW: jeanpitx
FECHA DE PUBLICACIÓN: 31/08/2020
-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('img/icono.ico')}}">
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
</head>
<body style="background: #eaeaea">
    <div id="app">
        @include('public.layouts.navbar')
        <main class="pt-4 pb-1 container-fluid">
            {!! Form::open(['route' => 'solicitud.storePublic','files'=>true,'id'=>'fomrsend','class'=>'upload-form']) !!}
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
            <div class="container"> <!--p4-4 da un espacio arriba del contenido-->
                <div class="row">
                    <div class="col-sm-12 pb-2">
                        <!-- AQUI VA EL CONTENIDO DE LA PAGINA -->
                        <div class="card border-success">
                            <div class="card-body">
                                <h2 class="card-title">Solicitud de tarjeta de crédito</h2>
                                <p class="form-text text-muted">Campos con (<b class="text-danger">*</b>) son obligatorios</p>
                                <p class="text-success" style="margin-top:-8px;margin-bottom:-8px; font-size:13px;">
                                    Al final de esta solicitud, usted debe cargar en formato digital (<b>PDF</b>) lo siguiente: <b>roles de pago, mecanizado del IESS y certificado laboral.</b>
                                </p>
                                <hr>
                                <button class="btn btn-success mbcard" type="button" data-toggle="collapse"
                                    data-target="#colapsito" aria-expanded="false" aria-controls="colapsito"
                                    data-toggle="popover" data-placement="top" title="Datos Personales" data-content="Error: Usted no ha completado toda la información">
                                    1. Datos Personales
                                </button>
                                <button class="btn btn-secondary mbcard" type="button" data-toggle="collapse"
                                    data-target="#colapsito1" aria-expanded="false" aria-controls="colapsito1">
                                    2. Selección Producto
                                </button>
                                <button class="btn btn-secondary mbcard" type="button" data-toggle="collapse"
                                    data-target="#colapsito2" aria-expanded="false" aria-controls="colapsito2">
                                    3. Referencias
                                </button>
                                <button class="btn btn-secondary mbcard" type="button" data-toggle="collapse"
                                    data-target="#colapsito3" aria-expanded="false" aria-controls="colapsito3">
                                    4. Condiciones
                                </button>

                                <div class="col-md-12 py-1"></div> <!-- Se añade otro espacio -->
                                <div class="row">
                                    <div class="collapse multi-collapse  col-md-12" id="colapsito">
                                        <div class="card">
                                            <div class="card-header">
                                            <strong>DATOS PERSONALES </strong>
                                            </div>
                                            <div class="card-body" style="position: relative;">
                                                <div id="loading" style="position: absolute; left:1; z-index:100; width:97%; height:97%; background:white; padding-top:10px; color:rgb(92, 89, 89); text-align:center; font-size:20px; display:none;">
                                                    <p>Consultando...</p>
                                                </div>
                                                <!-- Identificacion y Nacionalidad -->
                                                <div class="row d-flex justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('identificacion', 'Identificación') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group ">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-id-card"></i></div>
                                                                {!! Form::text('identificacion', null, ['class' =>'form-control'.($errors->has('identificacion')?'is-invalid':''),'placeholder' => 'Ingrese su Identificación','onkeypress' => 'soloNumeros(event);','required','minlength'=>'10','maxlength'=>'10']) !!}
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
                                                            <div class="input-group ">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-globe"></i></div>
                                                                {{ Form::text('nacionalidad', null, ['class' => 'form-control toupper'.($errors->has('nacionalidad')?'is-invalid':''),'placeholder' => 'Ingrese su Nacionalidad', 'required','readonly']) }}
                                                                <span class="invalid-feedback">{{ $errors->first('nacionalidad') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                <!-- Apellido paterno y materno-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('primera', 'Primer Apellido') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-user"></i></div>
                                                                {!! Form::text('primera', null, ['class' =>
                                                                'form-control toupper'.($errors->has('primera')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese su primer apellido','required','onkeypress' => 'SoloLetras(event);']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('primera') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('segundoa', 'Segundo Apellido') !!}
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-user"></i></div>
                                                                {!! Form::text('segundoa', null, ['class' =>
                                                                'form-control toupper'.($errors->has('segundoa')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese su segundo apellido','onkeypress' => 'SoloLetras(event);']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('segundoa') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                <!-- Nombres completos-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-12">
                                                        <div class="col">
                                                            {!! Form::label('nombres_completos', 'Nombres completos') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-user"></i></div>
                                                                {!! Form::text('nombres_completos', null, ['class' =>
                                                                'form-control toupper'.($errors->has('nombres_completos')?'
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
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-calendar"></i></div>
                                                                {!! Form::date('fecha_nacimiento', null, ['class' =>
                                                                'form-control'.($errors->has('fecha_nacimiento')?'
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
                                                        <div class="col">
                                                            {!! Form::label('sexo', 'Sexo') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-venus-mars"></i></div>
                                                                {!! Form::select('sexo', ['F' => 'Femenino', 'M' =>
                                                                'Masculino'],null,['class'=>'form-control','placeholder' =>
                                                                'Seleccione su género','required']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('sexo') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Profesión y Estado civil-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('profesion', 'Profesión') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-school"></i></div>
                                                                {!! Form::select('profesion', $profesion,null, ['id_profesion'=>'profesion','class' => 'profesion form-control'.($errors->has('profesion')?' is-invalid':''),'placeholder' => 'Seleccione su profesión...','required']) !!}
                                                                <span class="invalid-feedback">{{ $errors->first('profesion') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('estado_civil', 'Estado Civil') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-balance-scale"></i></div>
                                                                {!! Form::select('estado_civil', ['SOLTERO' => 'Soltero', 'CASADO' =>
                                                                'Casado', 'EN UNION DE HECHO' => 'En Unión de hecho', 'VIUDO' => 'Viudo', 'DIVORCIADO' =>
                                                                'Divorciado'],null,['class'=>'form-control','placeholder' =>
                                                                'Seleccione su estado civil','required']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('sexo') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Vivienda y Antiguedad vivienda-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('vivienda', 'Vivienda') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-home"></i></div>
                                                                {!! Form::select('vivienda', ['A' => 'Alquilada', 'P' =>
                                                                'Prestada', 'PH' => 'Propia Hipotecada', 'PNH' => 'Propia no
                                                                hipotecada', 'VF' => 'Vive con
                                                                familiares'],null,['class'=>'form-control','placeholder' =>
                                                                'Seleccione el tipo de vivienda','required']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('correo') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('antiguedad_vivienda', 'Antiguedad Vivienda') !!}<b class="text-danger"> *</b>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <div class="input-group margin-bottom-sm">
                                                                        <div class="input-group-prepend"><i class="input-group-text far fa-clock"></i></div>
                                                                        {!! Form::number('anios_vivienda', null, ['id'=>'anios_vivienda','min'=>'0','class' =>
                                                                        'form-control','placeholder' => 'Años','onkeypress' => 'soloNumeros(event);','required']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="input-group margin-bottom-sm">
                                                                        <div class="input-group-prepend"><i class="input-group-text far fa-clock"></i></div>
                                                                        {!! Form::number('meses_vivienda', null, ['id'=>'meses_vivienda','min'=>'0','class' =>
                                                                        'form-control','placeholder' => 'Meses','onkeypress' => 'soloNumeros(event);','required']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Provincia y correo electrónico -->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col sell">
                                                            {!! Form::label('ciudad', 'Ciudad') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-map"></i></div>
                                                                {{ Form::select('ciudad', $ciudad, null, ['id' => 'ciudad','class' => 'form-control ciudad','required']) }}
                                                                <span class="invalid-feedback">{{ $errors->first('ciudad') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col ">
                                                            {!! Form::label('correo', 'Correo Electrónico') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-envelope"></i></div>
                                                                {!! Form::email('correo', null, ['class' =>
                                                                'form-control tolower'.($errors->has('correo')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese su correo','required']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('correo') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Tipo teléfono celular, convecional y correo electrónico-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('celular_persona', 'Telefono Celular') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-phone"></i></div>
                                                                {!! Form::text('celular_persona', null, ['id'=>'celular_persona','class' =>
                                                                'form-control tolower pruebita'.($errors->has('celular_persona')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese su telefono celular','required','maxlength'=>'10','onkeypress' => 'soloNumeros(event);']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('celular_persona') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col ">
                                                            {!! Form::label('convencional_persona', 'Telefono Convencional') !!}
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-phone"></i></div>
                                                                {!! Form::text('convencional_persona', null, ['id'=>'convencional_persona','class' =>
                                                                'form-control tolower'.($errors->has('convencional_persona')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese su telefono convencional','maxlength'=>'10','onkeypress' => 'soloNumeros(event);']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('correo') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--<div class="form-group col-sm-12">
                                                    <div>{!! Form::label('telefono_persona', 'Datos Telefónicos') !!}<b class="text-danger"> *</b></div>
                                                    <div class="ctn-multiple" name="telefono personal"></div>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-phone"></i></div>
                                                        <select class="custom-select {{($errors->has('tipo_telefono')?'is-invalid':'')}}" id="tipo_telefono" name="tipo_telefono" style="max-width:160px" aria-label="Seleccione Telefono">
                                                            <option value="" selected>Seleccione...</option>
                                                            <option value="1">Celular</option>
                                                            <option value="2">Convencional</option>
                                                        </select>
                                                        {!! Form::text('telefono_persona', null, ['class' => 'form-control ctn-multiple-key ctn-multiple-norepeat'.($errors->has('telefono_persona')?'
                                                        is-invalid':''),'placeholder' => 'Telefono','onkeypress' => 'soloNumeros(event);']) !!}

                                                        <div class="input-group-append ctn-multiple-btn">
                                                            <button class="btn btn-outline-info" type="button" title="Guardar Telefono Personal" id="btn_guarda_telefono" style="font-size: 13px"
                                                                data-toggle="popover" data-placement="top"  data-content="Error: Completa este campo: mínimo 1 número celular">
                                                                <i class="fa fa-save"></i> Guardar
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <small id="identificacionHelp" class="form-text  text-right text-info">Haga clic en el boton GUARDAR</small>
                                                </div>-->
                                                <!-- OTRO APARTADO -->
                                                <div class="form-group col-sm-12" style='margin-top:-5px'>
                                                    <b class="text-secondary"> ♦ Datos de Direccion de domicilio</b>
                                                </div>

                                                <!-- Dirección_primaria-->
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('direccion_primaria', 'Dirección calle principal') !!}<b class="text-danger"> *</b>
                                                    <div class="input-group margin-bottom-sm">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-map-marker"></i></div>
                                                        {!! Form::text('direccion_primaria', null, ['class' =>
                                                        'form-control toupper'.($errors->has('direccion_primaria')?'
                                                        is-invalid':''),'placeholder' => 'Ingrese direccion calle principal','required']) !!}
                                                        <span
                                                            class="invalid-feedback">{{ $errors->first('direccion_primaria') }}</span>
                                                    </div>
                                                </div>

                                                <!-- Dirección_secundaria-->
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('direccion_secundaria', 'Dirección calle secundaria') !!}<b class="text-danger"> *</b>
                                                    <div class="input-group margin-bottom-sm">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-map-marker"></i></div>
                                                        {!! Form::text('direccion_secundaria', null, ['class' =>
                                                        'form-control toupper'.($errors->has('direccion_secundaria')?'
                                                        is-invalid':''),'placeholder' => 'Ingrese direccion calle secundaria','required']) !!}
                                                        <span
                                                            class="invalid-feedback">{{ $errors->first('direccion_secundaria') }}</span>
                                                    </div>
                                                </div>

                                                <!-- Dirección referencia-->
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('direccion_referencia', 'Referencia Domicilio') !!}<b class="text-danger"> *</b>
                                                    <div class="input-group margin-bottom-sm">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-map-marker"></i></div>
                                                        {!! Form::text('direccion_referencia', null, ['class' =>
                                                        'form-control toupper'.($errors->has('direccion_referencia')?'
                                                        is-invalid':''),'placeholder' => 'Ingrese algun lugar de referencia','required']) !!}
                                                        <span
                                                            class="invalid-feedback">{{ $errors->first('direccion_referencia') }}</span>
                                                    </div>
                                                </div>

                                                <!-- Ubicación-->
                                                <div class="form-group col-sm-12">
                                                    <div>{!! Form::label('coordenadas', 'Seleccione ubicación domicilio') !!}<b class="text-danger"> *</b></div>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-map fa"></i></div>
                                                        {!! Form::text('coordenadas', null, ['class' => 'form-control'.($errors->has('coordenadas')?'
                                                        is-invalid':''),'placeholder' => 'Coordenadas','readonly','required']) !!}

                                                        <div class="input-group-append ctn-multiple-btn">
                                                            <button class="btn btn-outline-success" type="button" title="Seleccionar Ubicación"  data-toggle="modal" data-target="#modalLocation" id="btn_location_persona"  style="font-size: 13px"
                                                                data-toggle="popover" data-placement="top" data-content="Error: Seleccione su ubicación aquí">
                                                                <i class="fa fa-map-marker"></i> Seleccionar Ubicación 
                                                            </button>
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

                                                

                                                <!-- CONYUGUE-->
                                                <div id="div_conyugue" style="position: relative; border-radius: 5px; border: 2px solid #89cf92; display:none;">
                                                    <div id="loading_conyugue" style="position: absolute; margin-top:5px; margin-left:5px; z-index:100; width:99%; height:97%; background:white; padding-top:10px; color:rgb(92, 89, 89); text-align:center; font-size:20px;display:none;">
                                                        <p>Consultando...</p>
                                                    </div>

                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="text-center col-md-12" style="margin-bottom: -15px">
                                                            <p class="text-success text center">Datos del conyugue</p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col">
                                                                {!! Form::label('identificacion_conyugue', 'Identificación conyugue') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-id-card"></i></div>
                                                                    {!! Form::text('identificacion_conyugue', null, ['class' =>
                                                                    'form-control'.($errors->has('identificacion_conyugue')?'
                                                                    is-invalid':''),'placeholder' => 'Identificación conyugue','onkeypress' => 'soloNumeros(event);','minlength'=>'10','maxlength'=>'10', 'required']) !!}
                                                                    <span class="invalid-feedback">{{ $errors->first('identificacion_conyugue') }}</span>

                                                                    <div class="input-group-append ctn-multiple-btn">
                                                                        <button class="btn btn-outline-info" type="button" title="Consultar Identificación" id="btn_consulta_identifiacion_conyugue" style="font-size: 13px">
                                                                            <i class="fa fa-search"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col sell">
                                                                {!! Form::label('nacionalidad_conyugue', 'Nacionalidad conyugue') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-globe"></i></div>
                                                                    {{ Form::text('nacionalidad_conyugue', null, ['class' => 'form-control toupper'.($errors->has('nacionalidad_conyugue')?'is-invalid':''),'placeholder' => 'Ingrese la Nacionalidad del conyugue', 'required']) }}
                                                                    <span class="invalid-feedback">{{ $errors->first('nacionalidad_conyugue') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Apellidos y nombres conyugue-->
                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="form-group col-md-12">
                                                            <div class="col">
                                                                {!! Form::label('nombres_conyugue', 'Nombres conyugue') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group margin-bottom-sm">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-user"></i></div>
                                                                    {!! Form::text('nombres_conyugue', null, ['class' =>
                                                                    'form-control toupper'.($errors->has('nombres_conyugue')?'
                                                                    is-invalid':''),'placeholder' => 'Nombres completos del conyugue','required']) !!}
                                                                    <span
                                                                        class="invalid-feedback">{{ $errors->first('nombres_conyugue') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- sexo y fecha nacimiento conyugue-->
                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="form-group col-md-6">
                                                            <div class="col">
                                                                {!! Form::label('sexo_conyugue', 'Sexo conyugue') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group margin-bottom-sm">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-venus-mars"></i></div>
                                                                    {!! Form::select('sexo_conyugue', ['F' => 'Femenino', 'M' =>
                                                                    'Masculino'],null,['class'=>'form-control','placeholder' =>
                                                                    'Género Conyugue','required']) !!}
                                                                    <span
                                                                        class="invalid-feedback">{{ $errors->first('sexo_conyugue') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <div class="col">
                                                                {!! Form::label('fecha_nacimiento_conyugue', 'Fecha Nacimiento conyugue') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group margin-bottom-sm">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-calendar"></i></div>
                                                                    {!! Form::date('fecha_nacimiento_conyugue', null, ['class' =>
                                                                    'form-control'.($errors->has('fecha_nacimiento_conyugue')?'
                                                                    is-invalid':''),'placeholder' => 'Ingrese fecha de nacimiento', 'required']) !!}
                                                                    <span
                                                                        class="invalid-feedback">{{ $errors->first('fecha_nacimiento_conyugue') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @push('scripts')
                                                            <script type="text/javascript">
                                                                $('#fecha_nacimiento_conyugue').datetimepicker({
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
                                                    </div>
                                                    {!! Form::text('estado_civil_conyugue', null, ['id'=>'estado_civil_conyugue','style' => 'display:none']) !!}
                                                </div>

                                                <!-- OTRO APARTADO -->
                                                <div class="form-group col-sm-12">
                                                    <br>
                                                    <p class="text-success">Actividades y fuentes de ingreso del solicitante</p>
                                                    <hr>
                                                </div>

                                                <!-- Nombre de la empresa y actividad-->
                                                <div class="row d-flex  justify-content-around" style='margin-top:-10px'>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('nombre_empresa', 'Nombre de empresa') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-university"></i></div>
                                                                {!! Form::text('nombre_empresa', null, ['class' =>
                                                                'form-control toupper'.($errors->has('nombre_empresa')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese el nombre de la empresa','required']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('sexo') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col sell">
                                                                {!! Form::label('actividad_empresa', 'Actividad') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group margin-bottom-sm">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-building"></i></div>
                                                                    {{ Form::select('actividad_empresa', $actividad, null, ['class' => 'form-control actividad_empresa','required']) }}
                                                                    <span class="invalid-feedback">{{ $errors->first('actividad_empresa') }}</span>
                                                                </div>
                                                        </div>    
                                                    </div>
                                                </div>

                                                <!-- Antiguedad Laboral y Cargo-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('antiguedad_laboral', 'Antiguedad Laboral') !!}<b class="text-danger"> *</b>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <div class="input-group margin-bottom-sm">
                                                                        <div class="input-group-prepend"><i class="input-group-text far fa-clock"></i></div>
                                                                        {!! Form::number('anios_laboral', null,
                                                                        ['id'=>'anios_laboral','min'=>'0','class' => 'form-control','placeholder' => 'Años','onkeypress' => 'soloNumeros(event);','required'])
                                                                        !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="input-group margin-bottom-sm">
                                                                        <div class="input-group-prepend"><i class="input-group-text far fa-clock"></i></div>
                                                                        {!! Form::number('meses_laboral', null, ['id'=>'meses_laboral','min'=>'0','class' =>
                                                                        'form-control','placeholder' => 'Meses','onkeypress' => 'soloNumeros(event);','required']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('cargo', 'Cargo en la empresa') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-briefcase"></i></div>
                                                                {!! Form::text('cargo', null, ['class' =>
                                                                'form-control toupper'.($errors->has('cargo')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese su cargo','required']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('cargo') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Ciudad y correo electrónico empresa-->
                                                <div class="row d-flex  justify-content-around" style='margin-top:-15px'>
                                                    <div class="form-group col-md-6">
                                                        <div class="col sell">
                                                            {!! Form::label('ciudad_empresa', 'Ciudad Empresa') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-map"></i></div>
                                                                {{ Form::select('ciudad_empresa', $ciudad, null, ['class' => 'form-control ciudad_empresa','required']) }}
                                                                <span class="invalid-feedback">{{ $errors->first('ciudad_empresa') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col ">
                                                            {!! Form::label('correo_empresa', 'Correo laboral') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-envelope"></i></div>
                                                                {!! Form::text('correo_empresa', null, ['class' =>
                                                                'form-control tolower'.($errors->has('correo_empresa')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese correo alterno','required'])
                                                                !!}
                                                                <span class="invalid-feedback">{{ $errors->first('correo_empresa') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                <!-- Tipo teléfono y Número-->
                                                <div class="form-group col-sm-12">
                                                    <div>{!! Form::label('telefono_empresa', 'Datos Telefónicos de la Empresa') !!}<b class="text-danger"> *</b></div>
                                                    <div class="ctn-multiple" name="telefono empresa"></div>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-phone"></i></div>
                                                        <select class="custom-select {{($errors->has('tipotele_empresa')?'is-invalid':'')}}" name="tipo_telefono_empresa" id="tipo_telefono_empresa"
                                                            style="max-width:160px" aria-label="Seleccione Telefono">
                                                            <option value="" selected>Seleccione...</option>
                                                            <option value="1">Celular</option>
                                                            <option value="2">Convencional</option>
                                                        </select>
                                                        {!! Form::text('telefono_empresa', null, ['id' =>'telefono_empresa','class' =>
                                                        'ctn-multiple-norepeat form-control'.($errors->has('telefono_empresa')?'
                                                        is-invalid':''),'placeholder' => 'Telefono','onkeypress' => 'soloNumeros(event);','maxlength'=>'10']) !!}
                                                        {!! Form::text('extension_empresa', null, ['id' =>'extension_empresa','class' =>
                                                        'ctn-multiple-norepeat ctn-multiple-key ctn-multiple-norequired form-control'.($errors->has('extension')?'
                                                        is-invalid':''),'placeholder' => 'Ext.','onkeypress' => 'soloNumeros(event);','maxlength'=>'5'])
                                                        !!}

                                                        <div class="input-group-append ctn-multiple-btn">
                                                            <button class="btn btn-outline-info" type="button" title="Guardar Telefono Empresa" id="btn_guarda_telefono_empresa" style="font-size: 13px"
                                                                data-toggle="popover" data-placement="top" data-content="Error: Completa este campo: mínimo 1 número telefónico">
                                                                <i class="fa fa-save"></i> Guardar
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <small id="identificacionHelp" class="form-text  text-right text-info">Haga clic en el boton GUARDAR</small>
                                                </div>

                                                <!-- OTRO APARTADO -->
                                                <div class="form-group col-sm-12" style='margin-top:-5px'>
                                                    <b class="text-secondary"> ♦ Datos de Direccion de la empresa</b>
                                                </div>

                                                <!-- Dirección_primaria_empresa-->
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('direccion_primaria_empresa', 'Dirección calle principal empresa') !!}<b class="text-danger"> *</b>
                                                    <div class="input-group margin-bottom-sm">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-map-marker"></i></div>
                                                        {!! Form::text('direccion_primaria_empresa', null, ['class' =>
                                                        'form-control toupper'.($errors->has('direccion_primaria_empresa')?'
                                                        is-invalid':''),'placeholder' => 'Ingrese direccion calle principal','required']) !!}
                                                        <span class="invalid-feedback">{{ $errors->first('direccion_primaria_empresa') }}</span>
                                                    </div>
                                                </div>

                                                <!-- Dirección_secundaria_empresa-->
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('direccion_secundaria_empresa', 'Dirección calle secundaria  empresa') !!}<b class="text-danger"> *</b>
                                                    <div class="input-group margin-bottom-sm">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-map-marker"></i></div>
                                                        {!! Form::text('direccion_secundaria_empresa', null, ['class' =>
                                                        'form-control toupper'.($errors->has('direccion_secundaria_empresa')?'
                                                        is-invalid':''),'placeholder' => 'Ingrese direccion calle secundaria','required']) !!}
                                                        <span
                                                            class="invalid-feedback">{{ $errors->first('direccion_secundaria_empresa') }}</span>
                                                    </div>
                                                </div>

                                                <!-- Dirección referencia TRABAJO-->
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('direccion_referencia_empresa', 'Referencia Empresa') !!}<b class="text-danger"> *</b>
                                                    <div class="input-group margin-bottom-sm">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-map-marker"></i></div>
                                                        {!! Form::text('direccion_referencia_empresa', null, ['class' =>
                                                        'form-control toupper'.($errors->has('direccion_referencia_empresa')?'
                                                        is-invalid':''),'placeholder' => 'Ingrese algun lugar de referencia','required']) !!}
                                                        <span
                                                            class="invalid-feedback">{{ $errors->first('direccion_referencia_empresa') }}</span>
                                                    </div>
                                                </div>

                                                <!-- Ubicación empresa-->
                                                <div class="form-group col-sm-12">
                                                    <div>{!! Form::label('coordenadas_empresa', 'Seleccione ubicación empresa') !!}<b class="text-danger"> *</b></div>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-map fa"></i></div>
                                                        {!! Form::text('coordenadas_empresa', null, ['class' => 'form-control'.($errors->has('coordenadas_empresa')?'
                                                        is-invalid':''),'placeholder' => 'Coordenadas Empresa','readonly']) !!}

                                                        <div class="input-group-append ctn-multiple-btn">
                                                            <button class="btn btn-outline-success" type="button" title="Seleccionar Ubicación"  data-toggle="modal" data-target="#modalLocationCompany" id="btn_location_empresa" style="font-size: 13px"
                                                                data-toggle="popover" data-placement="top" data-content="Error: Seleccione la ubicación de la empresa aquí">
                                                                <i class="fa fa-map-marker"></i> Seleccionar Ubicación 
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- EMPIEZA CODIGO MODAL UBICACION EMPRESA-->
                                                <div class="modal"  id="modalLocationCompany" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                                                <p><b>Ubicación Seleccionada</b> <i id="info_ubication_empresa">ninguna</i></p>
                                                                <div id="map_empresa"></div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                <button id="save_ubication_empresa" type="button" class="btn btn-primary">Guardar Ubicación</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!--Sueldo-->
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('usd_sueldo', 'Sueldo recibido en la empresa') !!}<b class="text-danger"> *</b>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-money-bill"></i></div>
                                                        {!! Form::text('usd_sueldo', null, ['class' =>
                                                        'form-control'.($errors->has('usd_sueldo')?'
                                                        is-invalid':''),'placeholder' => 'Ingrese número entero','onkeypress' => 'soloNumeros(event);','required']) !!}
                                                        <div class="input-group-append">
                                                            <i class="input-group-text fa fa-dollar-sign" style="padding-top:10px"></i>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- OTRO APARTADO -->
                                                <div class="form-group col-sm-12" style="margin-top:-5px">
                                                    <br>
                                                    <p class="text-success">Gastos y Patrimonio</p>
                                                    <hr>
                                                </div>

                                                <!-- OTRO APARTADO -->
                                                <div class="form-group col-sm-12" style='margin-top:-5px'>
                                                    <p class="text-success"> ♦ Gastos mensuales</p>
                                                </div>

                                                <!-- Servicios básicos y Alimentación-->
                                                <div class="row d-flex  justify-content-around" style='margin-top:-10px'>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('usd_servicios_basicos', 'Servicios Básicos') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-dollar-sign"></i></div>
                                                                {!! Form::text('usd_servicios_basicos', null, ['class' =>
                                                                'form-control'.($errors->has('usd_servicios_basicos')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese valor entero','onkeypress' => 'soloNumeros(event);','required'])
                                                                !!}
                                                                <span class="invalid-feedback">{{ $errors->first('primera') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('usd_alimentacion', 'Alimentación') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-dollar-sign"></i></div>
                                                                {!! Form::text('usd_alimentacion', null, ['class' =>
                                                                'form-control'.($errors->has('usd_alimentacion')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese valor entero','onkeypress' => 'soloNumeros(event);','required'])
                                                                !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('primera') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Arriendo y transporte-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('usd_arriendo', 'Cuota de arriendo / Alícuota') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-dollar-sign"></i></div>
                                                                {!! Form::text('usd_arriendo', null, ['class' =>
                                                                'form-control'.($errors->has('usd_arriendo')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese valor entero','onkeypress' => 'soloNumeros(event);','required'])
                                                                !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('usd_arriendo') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('usd_transporte', 'Cuota de vehículo o transporte
                                                           ') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-dollar-sign"></i></div>
                                                                {!! Form::text('usd_transporte', null, ['class' =>
                                                                'form-control'.($errors->has('usd_transporte')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese valor entero','onkeypress' => 'soloNumeros(event);','required'])
                                                                !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('usd_transporte') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Vestimenta y Educación-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('usd_vestimenta', 'Vestimenta') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-dollar-sign"></i></div>
                                                                {!! Form::text('usd_vestimenta', null, ['class' =>
                                                                'form-control'.($errors->has('usd_vestimenta')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese valor entero','onkeypress' => 'soloNumeros(event);','required'])
                                                                !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('usd_vestimenta') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('usd_educacion', 'Educación') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-dollar-sign"></i></div>
                                                                {!! Form::text('usd_educacion', null, ['class' =>
                                                                'form-control'.($errors->has('usd_educacion')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese valor entero','onkeypress' => 'soloNumeros(event);','required'])
                                                                !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('usd_educacion') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- salud-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('usd_salud', 'Salud') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-dollar-sign"></i></div>
                                                                {!! Form::text('usd_salud', null, ['class' =>
                                                                'form-control'.($errors->has('usd_salud')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese valor entero','onkeypress' => 'soloNumeros(event);','required'])
                                                                !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('usd_salud') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('usd_prestamos', 'Cuota de prestamos') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-dollar-sign"></i></div>
                                                                {!! Form::text('usd_prestamos', null, ['class' =>
                                                                'form-control'.($errors->has('usd_prestamos')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese valor entero','onkeypress' => 'soloNumeros(event);','required'])
                                                                !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('usd_prestamos') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- OTRO APARTADO -->
                                                <div class="form-group col-sm-12" style='margin-top:-15px'>
                                                    <br>
                                                    <p class="text-success"> ♦ Patrimonio</p>
                                                </div>

                                                <!-- Terreno y Casa-->
                                                <div class="row d-flex  justify-content-around" style='margin-top:0px'>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('usd_terreno', 'Terreno (avalúo)') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-dollar-sign"></i></div>
                                                                {!! Form::text('usd_terreno', null, ['class' =>
                                                                'form-control'.($errors->has('usd_terreno')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese valor entero','onkeypress' => 'soloNumeros(event);','required'])
                                                                !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('usd_terreno') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('usd_casa', 'Casa (avalúo)') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-dollar-sign"></i></div>
                                                                {!! Form::text('usd_casa', null, ['class' =>
                                                                'form-control'.($errors->has('usd_casa')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese valor entero','onkeypress' => 'soloNumeros(event);','required'])
                                                                !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('usd_casa') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Vehículo y Otras propiedades-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('usd_vehiculo', 'Vehículo') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-dollar-sign"></i></div>
                                                                {!! Form::text('usd_vehiculo', null, ['class' =>
                                                                'form-control'.($errors->has('usd_vehiculo')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese valor entero','onkeypress' => 'soloNumeros(event);','required'])
                                                                !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('usd_vehiculo') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('usd_otras', 'Otras propiedades (avalúo)') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-dollar-sign"></i></div>
                                                                {!! Form::text('usd_otras', null, ['class' =>
                                                                'form-control'.($errors->has('usd_otras')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese valor entero','onkeypress' => 'soloNumeros(event);','required'])
                                                                !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('usd_otras') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <button class="btn btn-outline-success waves-effect float-right" style="margin-top:10px ">Continuar <i class="fas fa-angle-double-right"></i></button> -->
                                                <button id='btncontinua1' class="btn btn-success float-right" type="button" style="margin-top:10px" data-toggle="popover" title="Error" data-content="Usted no ha completado toda la información">
                                                    Continuar <i class="fas fa-angle-double-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--<a class="btn btn-success" style="margin-left:8px" data-toggle="collapse" href="#colapsito1" role="button" aria-expanded="false" aria-controls="colapsito1">2. Selección Producto</a> -->
                                <div class="col-md-12 py-1"></div> <!-- Se añade otro espacio -->
                                <div class="row">
                                    <div class="collapse multi-collapse col-md-12" id="colapsito1">
                                        <div class="card" style="margin-top:-5px;">
                                            <input name="producto" id="producto" type="text" value="" style="display:none">
                                            <div class="card-header">
                                            <strong>SELECCIÓN DEL PRODUCTO </strong>
                                            </div>
                                            <div class="card-body">
                                                <!-- Seleccion producto -->
                                                <div class="row d-flex justify-content-around">
                                                    <div class="form-group col-md-12">
                                                        <div class="heading" >
                                                        {!! Form::label('tipotarjeta', 'Tarjeta de crédito a solicitar') !!}<b class="text-danger"> *</b>
                                                        <br>
                                                            <div class="container1" >
                                                                <div class="ui-card" id='1' style="background-image:url({{url('img/tarjeta_nacional.png')}});">
                                                                    {!! Form::label('tipotarjeta', 'Visa Nacional') !!}
                                                                </div>
                                                                <div class="ui-card" id='2' style="background-image:url({{url('img/tarjeta_clasica.png')}})">
                                                                    {!! Form::label('tipotarjeta', 'Visa Clásica') !!}
                                                                </div>
                                                                <div class="ui-card" id='3' style="background-image:url({{url('img/tarjeta_oro.png')}})">
                                                                    {!! Form::label('tipotarjeta', 'Visa Oro') !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </div>
                                                    <i id="tarjeselect" class="bg-success" style="text-align:right;">Tarjeta Clásica Seleccionada</i>
                                                </div>
                                                <br>
                                                <button class="btn btn-success float-right" id='btncontinua2' type="button" style="margin-top:10px ">
                                                    Continuar <i class="fas fa-angle-double-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--<a class="btn btn-success" style="margin-left:8px" data-toggle="collapse" href="#colapsito2" role="button" aria-expanded="false" aria-controls="colapsito2">3. Referencias</a>     -->
                                <div class="col-md-12 py-1"></div> <!-- Se añade otro espacio -->
                                <div class="row">
                                    <div class="collapse multi-collapse col-md-12" id="colapsito2">
                                        <div class="card" style="margin-top:-15px;">
                                            <div class="card-header">
                                                <strong>REFERENCIAS </strong>
                                            </div>
                                            <div class="card-body">
                                                <!-- OTRO APARTADO -->
                                                <div class="form-group col-sm-12">
                                                    <p class="text-success">Referencias Bancarias</p>
                                                    <hr>
                                                </div>
                                                <!-- Institucion financiera -->
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('institucion', 'Institución Financiera') !!}<b class="text-danger"> *</b>
                                                    <div class="input-group inst_financiera_selec2">
                                                        <div class="input-group-prepend">
                                                            <i class="input-group-text fa fa-university"></i>
                                                            <span class="input-group-text px-1 d-none d-sm-block" style="font-size: 14px" id="institucion">Institución financiera</span>
                                                        </div>
    
                                                        {!! Form::select('institucion', $institucion,null, ['id'=>'institucion_financiera','class' => 'form-control institucion_financiera custom-select '.($errors->has('institucion_financiera')?' is-invalid':'')]) !!}
                                                        <span class="invalid-feedback">{{ $errors->first('institucion') }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('datosfin', 'Datos Financieros') !!}<b class="text-danger"> *</b>

                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-university"></i></div>
                                                        <select class="custom-select {!!($errors->has('tipocuenta')?' is-invalid':'')!!}" id="tipocuenta" name="tipocuenta"
                                                            style="max-width:160px" aria-label="Seleccione tipo de cuenta">
                                                            <option value="" selected>Seleccione...</option>
                                                            <option value="1">Ahorro</option>
                                                            <option value="2">Corriente</option>
                                                        </select>
                                                        {!! Form::text('numerocuenta', null, ['id'=>'numerocuenta','class' =>'form-control'.($errors->has('numerocuenta')?'is-invalid':''),'placeholder' => '# de Cuenta','onkeypress' => 'keyAddPer(event,this); soloNumeros(event);']) !!}
                                                        <div class="input-group-append">
                                                            <button id="btn_guarda_cuenta" class="btn btn-outline-info" type="button" title="Guardar" onclick="actionAddPer()"  style="font-size: 13px"
                                                                data-toggle="popover" title="Guardar Referencia Bancaria" data-placement="top" data-content="Error: Completa este campo, mínimo 1 cuenta bancaria">
                                                                <i class="fa fa-save"></i> Guardar
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <small id="identificacionHelp" class="form-text  text-right text-info">Haga clic en el boton GUARDAR</small>
                                                </div>
                                                <!-- lista de arriba -->
                                                <div class="form-group col-sm-12 text-right" style="margin-top: -5px">
                                                    <i id="informativetext" style="font-size:12px; display:none">Lista Referencias Bancarias</i>
                                                    <div id="multiper-list">
                                                    </div>
                                                </div>
                                                <!-- OTRO APARTADO -->
                                                <div class="form-group col-sm-12">
                                                    <br>
                                                    <p class="text-success">Pariente cercano que no viva con usted (mínimo 2)</p>
                                                    <hr>
                                                </div>

                                                <div class="form-group col-sm-12">
                                                    <div  class="d-flex flex-row-reverse">
                                                        <button id="btn_add_pariente" class="btn btn-outline-success btn-sm" type="button"  data-toggle="modal"  data-target="#modalTable"
                                                            title="Adicionar Pariente" data-toggle="popover" data-placement="top" data-content="Error: Completa este campo, mínimo 2 parientes">
                                                            Añadir Pariente <i class='fa fa-plus'></i> 
                                                        </button>
                                                    </div>
                                                    
                                                    <div class="table-responsive mt-2">
                                                        <table id="tbl-pariente" class="table table-hover table-bordered"> 
                                                            <thead>
                                                                <tr>
                                                                    <th class="col-sm-4">Nombres</th>
                                                                    <th class="col-sm-2">Parentesco</th>
                                                                    <th class="col-sm-2">Ciudad</th>
                                                                    <th class="col-sm-4">Direccion</th>
                                                                    <th class="col-sm-2">Tipo</th>
                                                                    <th class="col-sm-2">Contacto</th>
                                                                    <th class="col-sm-2">Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr data="temp">
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td><!-- en esta fila va el boton de eliminar -->
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div style="margin-top:-10px; font-size:10px; margin-left:5px">
                                                            <b>Total de registros: </b><i id="ctn-multi-table-count">0</i>
                                                        </div>
                                                    </div>

                                                    <!-- EMPIEZA CODIGO PARIENTE MODAL -->
                                                    <div class="modal"  id="modalTable" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalTableTitle" >Añadir Pariente</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <!-- OJO AÑADIR ctn-multi-table-modal-->
                                                                <div class="modal-body ctn-multi-table-modal">
                                                                    
                                                                    <!-- Nombres y Apellidos-->
                                                                    <div class="form-group col-sm-12">
                                                                        {!! Form::label('nombre_apellido_pariente', 'Nombres y Apellidos Pariente') !!}<b class="text-danger"> *</b>
                                                                        <div class="input-group margin-bottom-sm">
                                                                            <div class="input-group-prepend"><i class="input-group-text fa fa-user"></i></div>
                                                                            {!! Form::text('nombre_apellido_pariente', null, ['class' =>
                                                                            'form-control toupper'.($errors->has('nombre_apellido_pariente')?' is-invalid':''),'placeholder' => 'Ingrese nombres y apellidos','onkeypress' => 'SoloLetras(event);']) !!}
                                                                            <span class="invalid-feedback">{{ $errors->first('nombre_apellido_pariente') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Parentesco y Ciudad-->
                                                                    <div class="row d-flex justify-content-around">
                                                                        <div class="form-group col-md-6">
                                                                            <div class="col">
                                                                                {!! Form::label('parentesco_pariente', 'Parentesco') !!}<b class="text-danger"> *</b>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-leaf"></i></div>
                                                                                    {!! Form::text('parentesco_pariente', null, ['class' =>
                                                                                    'form-control toupper'.($errors->has('parentesco_pariente')?'
                                                                                    is-invalid':''),'placeholder' => 'Ingrese parentesco','onkeypress' => 'SoloLetras(event);']) !!}
                                                                                    <span class="invalid-feedback">{{ $errors->first('parentesco_pariente') }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <div class="col sell">
                                                                                {!! Form::label('ciudad_pariente', 'Ciudad Pariente') !!}<b class="text-danger"> *</b>
                                                                                <div class="input-group margin-bottom-sm">
                                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-map"></i></div>
                                                                                    {{ Form::select('ciudad_pariente', $ciudad, null, ['class' => 'form-control ciudad_pariente']) }}
                                                                                    <span class="invalid-feedback">{{ $errors->first('ciudad_pariente') }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Dirección-->
                                                                    <div class="form-group col-sm-12">
                                                                        {!! Form::label('direccion_pariente', 'Dirección Pariente') !!}<b class="text-danger"> *</b>
                                                                        <div class="input-group margin-bottom-sm">
                                                                            <div class="input-group-prepend"><i class="input-group-text fa fa-map-marker"></i></div>
                                                                            {!! Form::text('direccion_pariente', null, ['class' =>
                                                                            'form-control toupper'.($errors->has('direccion_pariente')?'
                                                                            is-invalid':''),'placeholder' => 'Ingrese direccion']) !!}
                                                                            <span
                                                                                class="invalid-feedback">{{ $errors->first('direccion_pariente') }}</span>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Tipo teléfono y Número-->
                                                                    <div class="form-group col-sm-12">
                                                                        {!! Form::label('telefono_pariente', 'Datos Telefónicos Pariente') !!}<b class="text-danger"> *</b>

                                                                        <div class="input-group">
                                                                            <div class="input-group-prepend"><i class="input-group-text fa fa-phone"></i></div>
                                                                            <select class="custom-select {{($errors->has('telefono_pariente')?'is-invalid':'')}}" id="tipotele_pariente" name="tipotele_pariente" style="max-width:160px"
                                                                                aria-label="Seleccione Telefono">
                                                                                <option value="" selected>Seleccione...</option>
                                                                                <option value="Celular">Celular</option>
                                                                                <option value="Convencional">Convencional</option>
                                                                            </select>
                                                                            {!! Form::text('telefono_pariente', null, ['class' => 'form-control'.($errors->has('telefono_pariente')?' is-invalid':''),'placeholder' => 'Ingrese su telefono','onkeypress' => 'soloNumeros(event);','maxlength'=>'10']) !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button id="calcelrow" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <button id="addrow" type="button" class="btn btn-primary">Guardar Pariente</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- OTRO APARTADO -->
                                                <div class="form-group col-sm-12">
                                                    <p class="text-success">Información adicional</p>
                                                    <hr>
                                                </div>

                                                <!-- NOMBRE TARJETA -->
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('nombre_tarjeta', 'Deseo que mi nombre aparezca así') !!}<b class="text-danger"> *</b>
                                                    <div class="input-group margin-bottom-sm">
                                                        <div class="input-group-prepend"><i class="input-group-text fab fa-cc-visa" style="padding-top: 9px"></i></div>
                                                        {!! Form::text('nombre_tarjeta', null, ['class' =>'form-control toupper'.($errors->has('nombre_tarjeta')?' is-invalid':''),
                                                        'placeholder' => 'No registrar títulos profesionales ni diminutivos','maxlength'=>'19','onkeypress' => 'SoloLetrasSinenie(event);','required']) !!}
                                                        <span
                                                            class="invalid-feedback">{{ $errors->first('nombre_tarjeta') }}</span>
                                                    </div>
                                                </div>

                                                <!-- DONDE LLEGA ESTADO DE CUENTA -->
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('direccion_estado_cuenta', 'Mi estado de cuenta debe llegar a la siguiente dirección de correo electrónico') !!}<b class="text-danger"> *</b>
                                                    <div class="input-group margin-bottom-sm">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="usd_sueldo">@</span>
                                                        </div>
                                                        {!! Form::select('direccion_estado_cuenta', ['Domicilio' => 'Correo Personal', 'Trabajo' =>
                                                                    'Correo de Trabajo'],null,['class'=>'form-control','placeholder' => 'Seleccione correo','required']) !!}
                                                        <span class="invalid-feedback">{{ $errors->first('direccion_estado_cuenta') }}</span>
                                                    </div>


                                                    <button class="btn btn-success float-right" id='btncontinua3' type="button" style="margin-top:10px ">
                                                        Continuar <i class="fas fa-angle-double-right"></i>
                                                    </button>

                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 py-1"></div> <!-- Se añade otro espacio -->
                                <div class="row">
                                    <div class="collapse multi-collapse col-md-12" id="colapsito3">
                                        <div class="card" style="margin-left:20px; margin-right:20px; margin-top:-43px; margin-bottom:20px">
                                            <div class="card-header">
                                                <strong>CONDICIONES </strong>
                                            </div>
                                            <div class="card-body" >
                                                <!-- Seleccion producto -->
                                                <div class="row d-flex justify-content-around">
                                                    <div class="form-group col-md-12">
                                                        <div>
                                                            <div class="card">
                                                                <div class="card-header pb-5 pb-sm-0" id="headingOne" style="height:45px !important;">
                                                                    <h5 class="mb-0" style="margin-top: -10px">
                                                                        <button style="color:black" type="button" class="btn btn-link" >
                                                                            Mecanizado del IESS (12 ÚLTIMOS MESES)
                                                                        </button>
                                                                        <i id="ico_mecanizado" class="fas fa-exclamation-triangle" style="color: #deae0c;float: right; font-size:15px; margin-top:12px"></i>
                                                                    </h5>
                                                                </div>

                                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
                                                                    <div class="card-body">
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                            {!! Form::file('url_archivo_mec', ['name'=>'url_archivo_mec','class'=>'custom-file-input'.($errors->has('url_archivo_mec')?' is-invalid':''),'accept'=>'.pdf','data-max-size'=>'5242880','required']) !!}
                                                                            <label class="custom-file-label" for="inputGroupFile01">Seleccione archivo</label>
                                                                            </div>
                                                                        </div>
                                                                        <small class="text-danger d-flex justify-content-end">El archivo debe ser PDF y no pesar mas de 5 Mb</small>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card">
                                                                <div class="card-header" id="headingThree" style="height:45px !important;">
                                                                    <h5 class="mb-0" style="margin-top: -10px">
                                                                        <button style="color:black" type="button"class="btn btn-link" >
                                                                            Certificado Laboral
                                                                        </button>
                                                                        <i id="ico_certificado" class="fas fa-exclamation-triangle" style="color: #deae0c;float: right; font-size:15px; margin-top:12px"></i>
                                                                    </h5>
                                                                </div>
                                                                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree">
                                                                    <div class="card-body">
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                            {!! Form::file('url_archivo_cert', ['class'=>'custom-file-input'.($errors->has('url_archivo_cert')?' is-invalid':''),'accept'=>'.pdf','data-max-size'=>'5242880','required']) !!}
                                                                            <label class="custom-file-label" for="inputGroupFile01">Seleccione archivo</label>
                                                                            </div>
                                                                        </div>
                                                                        <small class="text-danger d-flex justify-content-end">El archivo debe ser PDF y no pesar mas de 5 Mb</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header pb-5 pb-sm-0" id="headingFour" style="height:45px !important;">
                                                                    <h5 class="mb-0" style="margin-top: -10px">
                                                                        <button style="color:black" type="button"class="btn btn-link" >
                                                                            Rol de Pago (ADJUNTAR 3 ÚLTIMOS MESES)
                                                                        </button>
                                                                        <i id="ico_rol" class="fas fa-exclamation-triangle" style="color: #deae0c;float: right; font-size:15px; margin-top:12px"></i>
                                                                    </h5>
                                                                </div>
                                                                <div id="collapseFour" class="collapse show" aria-labelledby="headingFour">
                                                                    <div class="card-body">
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                            {!! Form::file('url_archivo_rol', ['class'=>'custom-file-input'.($errors->has('url_archivo_rol')?' is-invalid':''),'accept'=>'.pdf','data-max-size'=>'5242880','required']) !!}
                                                                            <label class="custom-file-label" for="inputGroupFile01">Seleccione archivo</label>
                                                                            </div>
                                                                        </div>
                                                                        <small class="text-danger d-flex justify-content-end">El archivo debe ser PDF y no pesar mas de 5 Mb</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <!-- Grid column -->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <!-- Exaple 1 -->
                                                                <div class="card-header" >
                                                                    <h3 id="section1"style=" font-size:medium"><strong>Acuerdo de Confidencialidad</strong></h3>
                                                                </div>
                                                                <div class="card scrollgreen square scrollbar-dusty-grass square thin" style="height:150px; scrollbar-highlight-color: #6685CA;">
                                                                    <div class="card-body">
                                                                        <p style='text-align:justify;  font-size:smaller'>Declaro que toda la información en esta solicitud es correcta.<br><br>
                                                                            Autorizo expresa e indefinidamente al Banco Comercial de Manabí S.A. para que obtenga de cualquier fuente de información, incluida en la Central de Riesgos y Burós de Información Crediticia autorizados para operar en el país, mis referencias personales y/o patrimoniales anteriores o posteriores a la suscripción de ésta autorización, sea como deudor principal, codeudor o garante, sobre mi comportamiento crediticio, manejo de mi(s) cuenta(s), corriente (s), de ahorro, tarjetas de crédito, etc., y en general al cumplimiento de mis obligaciones y demás activos y pasivos, datos personales y/o patrimoniales, aplicables para uno o más de los servicios y productos que brindan las instituciones del Sistema Financiero según corresponda.<br>
                                                                            Faculto expresamente al Banco Comercial de Manabí S.A. para transferir o entregar dicha información, referente a la presente operación crediticia, contingente, y/o cualquier otro compromiso crediticio que mantenga, sea como deudor principal, codeudor o garante con el Banco Comercial de Manabí S.A. a todos los Burós de Información Crediticia autorizados para operar en el país, a autoridades competentes y organismos de control, así como a otras instituciones o personas jurídicas legalmente facultadas.<br>
                                                                            En caso de cesión, transferencia, titularización o cualquier otra forma de transferencia de la presente operación crediticia, contingente y/o cualquier otro compromiso crediticio que mantenga, sea como deudor principal, codeudor o garante con el Banco Comercial de Manabí S.A. la persona natural o jurídica cesionaria o adquiriente de dicha obligación queda desde ya expresamente facultada para realizar las mismas actividades en los dos párrafos precedentes.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Exaple 1 -->
                                                            <div class="col-md-8">
                                                                <div class="form-check" style="margin-left:15px; margin-top:10px; text-color:black">
                                                                    <input type="checkbox" class="form-check-input" id="mybox" required>
                                                                    <label class="mt-0 form-check-label" for="mybox" style=" margin-top:-500px; ">Acepto los términos de confidencialidad</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 text-lg-right ml-3 ml-lg-0 pr-lg-4" style="margin-top:8px">
                                                                <a  href="{{url('archivos/AUTORIZACION-BURO-CREDITO.pdf')}}" download="Acuerdo de Confidencialidad" style="color:black"><i class="far fa-file-pdf" style="color:red;"></i>
                                                                    Descargar Archivo
                                                                </a>
                                                            </div>
                                                            <!-- Grid column -->
                                                        
                                                        </div>
                                                                                                        
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col text-center" style="margin-top:-40px;">
                                                    <button id="btnsave" class="btn btn-success mx-auto" type="submit" value="Guardar" style="margin-top:30px "
                                                    data-sitekey="{{config('recaptcha-v3.site_key')}}" 
                                                    data-callback='onSubmit' 
                                                    data-action='submit'
                                                    >
                                                        Enviar solicitud <i class="fa fa-save"></i>
                                                    </button>
                                                    <!--<a class="btn btn-danger mx-auto g-recaptcha" href="{{ route('solicita') }}" style="margin-top:30px ">
                                                        Cancelar <i class="fa fa-times"></i>
                                                    </a>-->
                                                </div>      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('public.layouts.footersub')
                </div>
            </div>
            {!! Form::close() !!}
        </main>
    </div>

    @include('public.layouts.footer')


    
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
    {!! Html::script('js/st/solicitudes.js') !!}
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
        function callFunctionPersona(){ ejecutaConsultaPersona("{{ url('/cidsoli') }}");}
        function callFunctionConyugue(){ ejecutaConsultaConyugue("{{ url('/cid') }}");}
    </script>
</body>

</html>
