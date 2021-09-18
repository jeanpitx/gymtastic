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
            {!! Form::open(['route' => 'solicitud.storePublicSimple','id'=>'fomrsend','class'=>'upload-form']) !!}
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
                                <p class="form-text my-0 w-100 text-justify" style="font-size:15px; color:rgb(68, 68, 68)"><b>¡Bienvenido!</b>, Está solicitando tu tarjeta de crédito VisaBCM, el primer paso hacia un mundo lleno de oportunidades y experiencias. <span class="text-muted">Lo mas pronto posible nos contactarenmos contigo.</span></p>
                                <p class="form-text text-muted">Campos con (<b class="text-danger">*</b>) son obligatorios</p>
                                <p class="text-success" style="margin-top:-8px;margin-bottom:-8px; font-size:13px;">
                                    Banco Comercial de Manabí no se responsabiliza por la información proporcionada en este formulario.
                                </p>
                                <hr>
                                <button class="btn btn-success mbcard" type="button" data-toggle="collapse"
                                    data-target="#colapsito" aria-expanded="false" aria-controls="colapsito"
                                    data-toggle="popover" data-placement="top" title="Datos Personales" data-content="Error: Usted no ha completado toda la información">
                                    1. Datos Personales
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
                                                        <div class="col sell">
                                                            {!! Form::label('ciudad', 'Ciudad') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-map"></i></div>
                                                                {{ Form::select('ciudad', $ciudad, null, ['id' => 'ciudad','class' => 'form-control ciudad','required']) }}
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
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('celular', 'Número Celular') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-phone"></i></div>
                                                                {!! Form::text('celular', null, ['id'=>'celular','class' =>
                                                                'form-control tolower pruebita'.($errors->has('celular')?'
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
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-phone"></i></div>
                                                                {!! Form::text('convencional', null, ['id'=>'convencional','class' =>
                                                                'form-control tolower pruebita'.($errors->has('convencional')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese su telefono convencional','maxlength'=>'10','onkeypress' => 'soloNumeros(event);']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('convencional') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <div class="col">
                                                            {!! Form::label('direccion', 'Dirección domicilio') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
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
                                                

                                                <!-- Ubicación-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-12">
                                                        <div class="col">
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

                                                <!-- OTRO APARTADO -->
                                                <div class="form-group col-sm-12 mt-2">
                                                    <p class="text-success my-0">Ocupación</p>
                                                    <hr style="margin-top: 5px">
                                                </div>

                                                <!-- ocupacion-->
                                                <div class="form-group col-sm-12">
                                                    {!! Form::label('ocupacion', 'Ocupación o Actividad Económica') !!}<b class="text-danger"> *</b>
                                                    <div class="input-group margin-bottom-sm">
                                                        <div class="input-group-prepend"><i class="input-group-text fa fa-briefcase"></i></div>
                                                        {!! Form::select('ocupacion', [
                                                            'Estudiante'=>'Estudiante',
                                                            'Dependiente'=>'Dependiente',
                                                            'Jubilado'=>'Jubilado',
                                                            'Persona Independiente'=>'Persona Independiente'
                                                        ],null,['class'=>'form-control','placeholder' =>
                                                        'Seleccione el Tipo de Actividad','required']) !!}
                                                        <span
                                                            class="invalid-feedback">{{ $errors->first('ocupacion') }}</span>
                                                    </div>
                                                </div>

                                                <!-- DIV ESTUDIANTE-->
                                                <div id="div_estudiante" style="position: relative; margin-bottom:15px; border-radius: 5px; border: 2px solid #89cf92; display:none;">
                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="text-center col-md-12" style="margin-bottom: -15px">
                                                            <p class="text-success text center">Datos del estudiante</p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col">
                                                                {!! Form::label('universidad', 'Universidad') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-university"></i></div>
                                                                    {!! Form::text('universidad', null, ['class' =>
                                                                    'form-control toupper'.($errors->has('universidad')?'
                                                                    is-invalid':''),'placeholder' => 'Ingrese la Universidad', 'required','onkeypress' => 'SoloLetras(event);']) !!}
                                                                    <span class="invalid-feedback">{{ $errors->first('universidad') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col sell">
                                                                {!! Form::label('carrera', 'Carrera') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-globe"></i></div>
                                                                    {{ Form::text('carrera', null, ['class' => 'form-control toupper'.($errors->has('carrera')?'is-invalid':''),'placeholder' => 'Ingrese su Carrera Universitaria', 'required','onkeypress' => 'SoloLetras(event);']) }}
                                                                    <span class="invalid-feedback">{{ $errors->first('carrera') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="form-group col-md-6">
                                                            <div class="col">
                                                                {!! Form::label('semestre', 'Semestre') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fab fa-black-tie" style="padding-top: 10px"></i></div>
                                                                    {!! Form::text('semestre', null, ['class' =>
                                                                    'form-control toupper'.($errors->has('semestre')?'
                                                                    is-invalid':''),'placeholder' => 'Ingrese el Semestre en curso', 'required']) !!}
                                                                    <span class="invalid-feedback">{{ $errors->first('semestre') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col sell">
                                                                {!! Form::label('actividad_estudiante', 'Si ejerce alguna actividad económica, especificar:') !!}
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-align-justify"></i></div>
                                                                    {{ Form::text('actividad_estudiante', null, ['class' => 'form-control toupper'.($errors->has('actividad_estudiante')?'is-invalid':''),'placeholder' => 'Ingrese su Actividad','onkeypress' => 'SoloLetras(event);']) }}
                                                                    <span class="invalid-feedback">{{ $errors->first('actividad_estudiante') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- DIV DEPENDIENTE-->
                                                <div id="div_dependiente" style="position: relative; margin-bottom:15px; border-radius: 5px; border: 2px solid #89cf92; display:none;">
                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="text-center col-md-12" style="margin-bottom: -15px">
                                                            <p class="text-success text center">Datos Dependiente</p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col">
                                                                {!! Form::label('tipo_empresa', 'Tipo de empresa') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-briefcase"></i></div>
                                                                    {!! Form::select('tipo_empresa', [
                                                                            'Privada'=>'Privada',
                                                                            'Pública'=>'Pública'
                                                                        ],null,['class'=>'form-control','placeholder' =>
                                                                        'Seleccione el Tipo','required']) !!}
                                                                    <span class="invalid-feedback">{{ $errors->first('tipo_empresa') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col sell">
                                                                {!! Form::label('empresa', 'Institución / Empresa') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-university"></i></div>
                                                                    {{ Form::text('empresa', null, ['class' => 'form-control toupper'.($errors->has('empresa')?'is-invalid':''),'placeholder' => 'Ingrese el nombre', 'required']) }}
                                                                    <span class="invalid-feedback">{{ $errors->first('empresa') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="form-group col-md-6">
                                                            <div class="col">
                                                                {!! Form::label('cargo', 'Cargo') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-user-md"></i></div>
                                                                    {{ Form::text('cargo', null, ['class' => 'form-control toupper'.($errors->has('cargo')?'is-invalid':''),'placeholder' => 'Ingrese el cargo', 'required','onkeypress' => 'SoloLetras(event);']) }}
                                                                    <span class="invalid-feedback">{{ $errors->first('cargo') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col sell">
                                                                {!! Form::label('antiguedad', 'Años de antiguedad') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-clock"></i></div>
                                                                    {{ Form::number('antiguedad', null, ['class' => 'form-control toupper'.($errors->has('antiguedad')?'is-invalid':''),'placeholder' => 'Ingrese su antiguedad', 'required','onkeypress' => 'soloNumeros(event);']) }}
                                                                    <span class="invalid-feedback">{{ $errors->first('antiguedad') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="form-group col-md-6">
                                                            <div class="col">
                                                                {!! Form::label('tipo_contrato', 'Tipo Contrato') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-user-md"></i></div>
                                                                    {!! Form::select('tipo_contrato', [
                                                                            'Indefinido' => 'Indefinido',
                                                                            'Eventual' =>'Eventual'
                                                                        ],null,['class'=>'form-control','placeholder' =>
                                                                        'Seleccione el Tipo de contrato','required']) !!}
                                                                    <span class="invalid-feedback">{{ $errors->first('tipo_contrato') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col sell">
                                                                {!! Form::label('rango_sueldo', 'Rango de sueldo') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-money-bill-alt"></i></div>
                                                                    {!! Form::select('rango_sueldo', [
                                                                            '100$ a $400'=>'100$ a $400',
                                                                            '$401 a $700'=>'$401 a $700',
                                                                            '$701 a $1000'=>'$701 a $1000',
                                                                            '$1001 a $1500'=>'$1001 a $1500',
                                                                            '$1501 a $2000'=>'$1501 a $2000',
                                                                            '$2001 en adelante'=>'$2001 en adelante'
                                                                        ],null,['class'=>'form-control','placeholder' =>
                                                                        'Seleccione el Rango','required']) !!}
                                                                    <span class="invalid-feedback">{{ $errors->first('rango_sueldo') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="form-group col-md-6">
                                                            <div class="col">
                                                                {!! Form::label('direccion_negocio_dependiente', 'Dirección del de la Empresa donde labora') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-map fa"></i></div>
                                                                    {!! Form::text('direccion_negocio_dependiente', null, ['class' =>
                                                                    'form-control toupper'.($errors->has('direccion_negocio_dependiente')?'
                                                                    is-invalid':''),'placeholder' => 'Ingrese la dirección','required']) !!}
                                                                    <span class="invalid-feedback">{{ $errors->first('direccion_negocio_dependiente') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Ubicación-->
                                                        <div class="form-group col-sm-6">
                                                            <div class="col">
                                                                {!! Form::label('coordenadas_negocio_dependiente', 'Seleccione ubicación del negocio') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-map-marker"></i></div>
                                                                    {!! Form::text('coordenadas_negocio_dependiente', null, ['class' => 'form-control coordenadas_negocio'.($errors->has('coordenadas_negocio_dependiente')?'
                                                                    is-invalid':''),'placeholder' => 'Coordenadas empresa','readonly','required']) !!}
                                                                    <div class="input-group-append ctn-multiple-btn">
                                                                        <button class="btn btn-outline-success btn_location_empresa" type="button" title="Seleccionar Ubicación"  data-toggle="modal" data-target="#modalLocationCompany" id="btn_location_empresa_dependiente" style="font-size: 13px"
                                                                            data-toggle="popover" data-placement="top" data-content="Error: Seleccione la ubicación de la empresa aquí">
                                                                            <i class="fa fa-map-marker"></i> Seleccionar Ubicación 
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="form-group col-md-12">
                                                            <div class="col sell">
                                                                {!! Form::label('actividad_dependiente', 'Si ejerce alguna actividad económica adicional, especificar:') !!}
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-align-justify"></i></div>
                                                                    {{ Form::text('actividad_dependiente', null, ['class' => 'form-control toupper'.($errors->has('actividad_dependiente')?'is-invalid':''),'placeholder' => 'Ingrese su Actividad','onkeypress' => 'SoloLetras(event);']) }}
                                                                    <span class="invalid-feedback">{{ $errors->first('actividad_dependiente') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- DIV JUBILADO-->
                                                <div id="div_jubilado" style="position: relative; margin-bottom:15px; border-radius: 5px; border: 2px solid #89cf92; display:none;">
                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="text-center col-md-12" style="margin-bottom: -15px">
                                                            <p class="text-success text center">Datos del jubilado</p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col">
                                                                {!! Form::label('tipo_empresa_jubilado', 'Tipo de Empresa que se jubiló') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-university"></i></div>
                                                                    {!! Form::select('tipo_empresa_jubilado', [
                                                                            'Privada' => 'Privada',
                                                                            'Pública' =>'Pública'
                                                                        ],null,['class'=>'form-control','placeholder' =>
                                                                        'Seleccione el Tipo','required']) !!}
                                                                    <span class="invalid-feedback">{{ $errors->first('tipo_empresa_jubilado') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col sell">
                                                                {!! Form::label('rango_pension', 'Rango pensión') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-money-bill-alt"></i></div>
                                                                    {!! Form::select('rango_pension', [
                                                                            '100$ a $400'=>'100$ a $400',
                                                                            '$401 a $700'=>'$401 a $700',
                                                                            '$701 a $1000'=>'$701 a $1000',
                                                                            '$1001 a $1500'=>'$1001 a $1500',
                                                                            '$1501 a $2000'=>'$1501 a $2000',
                                                                            '$2001 en adelante'=>'$2001 en adelante'
                                                                        ],null,['class'=>'form-control','placeholder' =>
                                                                        'Seleccione el Rango','required']) !!}
                                                                    <span class="invalid-feedback">{{ $errors->first('rango_pension') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="form-group col-md-12">
                                                            <div class="col sell">
                                                                {!! Form::label('actividad_jubilado', 'Si ejerce alguna actividad económica adicional, especificar:') !!}
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-align-justify"></i></div>
                                                                    {{ Form::text('actividad_jubilado', null, ['class' => 'form-control toupper'.($errors->has('actividad_jubilado')?'is-invalid':''),'placeholder' => 'Ingrese su Actividad','onkeypress' => 'SoloLetras(event);']) }}
                                                                    <span class="invalid-feedback">{{ $errors->first('actividad_jubilado') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- DIV PERSONA INDEPENDIENTE-->
                                                <div id="div_independiente" style="position: relative; margin-bottom:15px; border-radius: 5px; border: 2px solid #89cf92; display:none;">
                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="text-center col-md-12" style="margin-bottom: -15px">
                                                            <p class="text-success text center">Datos de Actividad Independiente</p>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col">
                                                                {!! Form::label('tipo_actividad', 'Tipo Actividad') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-briefcase"></i></div>
                                                                    {!! Form::text('tipo_actividad', null, ['class' =>
                                                                    'form-control toupper'.($errors->has('tipo_actividad')?'
                                                                    is-invalid':''),'placeholder' => 'Ingrese direccion el tipo de actividad','required']) !!}
                                                                    <span class="invalid-feedback">{{ $errors->first('tipo_actividad') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col sell">
                                                                {!! Form::label('regimen', 'Regimen del contribuyente') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-id-card"></i></div>
                                                                    {!! Form::select('regimen', [
                                                                            'RUC'=>'RUC',
                                                                            'RISE'=>'RISE'
                                                                        ],null,['class'=>'form-control','placeholder' =>
                                                                        'Seleccione el Tipo','required']) !!}
                                                                    <span class="invalid-feedback">{{ $errors->first('regimen') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="form-group col-md-6">
                                                            <div class="col">
                                                                {!! Form::label('direccion_negocio_independiente', 'Dirección del negocio') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-map fa"></i></div>
                                                                    {!! Form::text('direccion_negocio_independiente', null, ['class' =>
                                                                    'form-control toupper'.($errors->has('direccion_negocio_independiente')?'
                                                                    is-invalid':''),'placeholder' => 'Ingrese direccion del negocio','required']) !!}
                                                                    <span class="invalid-feedback">{{ $errors->first('direccion_negocio_independiente') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Ubicación-->
                                                        <div class="form-group col-sm-6">
                                                            <div class="col">
                                                                {!! Form::label('coordenadas_negocio_independiente', 'Seleccione ubicación del negocio') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-map-marker"></i></div>
                                                                    {!! Form::text('coordenadas_negocio_independiente', null, ['class' => 'form-control coordenadas_negocio'.($errors->has('coordenadas_negocio_independiente')?'
                                                                    is-invalid':''),'placeholder' => 'Coordenadas empresa','readonly','required']) !!}
                                                                    <div class="input-group-append ctn-multiple-btn">
                                                                        <button class="btn btn-outline-success btn_location_empresa" type="button" title="Seleccionar Ubicación"  data-toggle="modal" data-target="#modalLocationCompany" id="btn_location_empresa_independiente" style="font-size: 13px"
                                                                            data-toggle="popover" data-placement="top" data-content="Error: Seleccione la ubicación de la empresa aquí">
                                                                            <i class="fa fa-map-marker"></i> Seleccionar Ubicación 
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="form-group col-md-6">
                                                            <div class="col sell">
                                                                {!! Form::label('antiguedad_independiente', 'Años de antiguedad') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-clock"></i></div>
                                                                    {{ Form::number('antiguedad_independiente', null, ['class' => 'form-control toupper'.($errors->has('antiguedad_independiente')?'is-invalid':''),'placeholder' => 'Ingrese su antiguedad', 'required','onkeypress' => 'soloNumeros(event);']) }}
                                                                    <span class="invalid-feedback">{{ $errors->first('antiguedad_independiente') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col sell">
                                                                {!! Form::label('tipo_negocio', 'Tipo de negocio o empresa') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fa fa-university"></i></div>
                                                                    {{ Form::text('tipo_negocio', null, ['class' => 'form-control toupper'.($errors->has('tipo_negocio')?'is-invalid':''),'placeholder' => 'Ingrese su tipo de negocio/empresa', 'required','onkeypress' => 'SoloLetras(event);']) }}
                                                                    <span class="invalid-feedback">{{ $errors->first('tipo_negocio') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-flex  justify-content-around">
                                                        <div class="form-group col-md-6">
                                                            <div class="col sell">
                                                                {!! Form::label('rango_ingresos', 'Rango ingresos') !!}<b class="text-danger"> *</b>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-money-bill-alt"></i></div>
                                                                    {!! Form::select('rango_ingresos', [
                                                                            '100$ a $400'=>'100$ a $400',
                                                                            '$401 a $700'=>'$401 a $700',
                                                                            '$701 a $1000'=>'$701 a $1000',
                                                                            '$1001 a $1500'=>'$1001 a $1500',
                                                                            '$1501 a $2000'=>'$1501 a $2000',
                                                                            '$2001 en adelante'=>'$2001 en adelante'
                                                                        ],null,['class'=>'form-control','placeholder' =>
                                                                        'Seleccione el Rango','required']) !!}
                                                                    <span class="invalid-feedback">{{ $errors->first('rango_ingresos') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="col sell">
                                                                {!! Form::label('actividad_independiente', 'Si ejerce alguna actividad económica adicional, especificar:') !!}
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><i class="input-group-text fas fa-align-justify"></i></div>
                                                                    {{ Form::text('actividad_independiente', null, ['class' => 'form-control toupper'.($errors->has('actividad_independiente')?'is-invalid':''),'placeholder' => 'Ingrese su Actividad','onkeypress' => 'SoloLetras(event);']) }}
                                                                    <span class="invalid-feedback">{{ $errors->first('actividad_independiente') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- EMPIEZA CODIGO MODAL UBICACION EMPRESA-->
                                                <div class="modal"  id="modalLocationCompany" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalTableTitle" >Seleccionar Ubicación Negocio</h5>
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

                                                <br>
                                                <!-- Grid column -->
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="col-md-12">
                                                            <div class="card">
                                                                <div class="card-header" >
                                                                    <h3 id="section1"style=" font-size:medium"><strong>Acuerdo de Confidencialidad</strong></h3>
                                                                </div>
                                                                <div class="scrollgreen square scrollbar-dusty-grass square thin" style="height:150px; scrollbar-highlight-color: #6685CA;">
                                                                    <div class="card-body">
                                                                        <p style='text-align:justify;  font-size:smaller'>Declaro que toda la información en esta solicitud es correcta.<br><br>
                                                                            Autorizo expresa e indefinidamente al Banco Comercial de Manabí S.A. para que obtenga de cualquier fuente de información, incluida en la Central de Riesgos y Burós de Información Crediticia autorizados para operar en el país, mis referencias personales y/o patrimoniales anteriores o posteriores a la suscripción de ésta autorización, sea como deudor principal, codeudor o garante, sobre mi comportamiento crediticio, manejo de mi(s) cuenta(s), corriente (s), de ahorro, tarjetas de crédito, etc., y en general al cumplimiento de mis obligaciones y demás activos y pasivos, datos personales y/o patrimoniales, aplicables para uno o más de los servicios y productos que brindan las instituciones del Sistema Financiero según corresponda.<br>
                                                                            Faculto expresamente al Banco Comercial de Manabí S.A. para transferir o entregar dicha información, referente a la presente operación crediticia, contingente, y/o cualquier otro compromiso crediticio que mantenga, sea como deudor principal, codeudor o garante con el Banco Comercial de Manabí S.A. a todos los Burós de Información Crediticia autorizados para operar en el país, a autoridades competentes y organismos de control, así como a otras instituciones o personas jurídicas legalmente facultadas.<br>
                                                                            En caso de cesión, transferencia, titularización o cualquier otra forma de transferencia de la presente operación crediticia, contingente y/o cualquier otro compromiso crediticio que mantenga, sea como deudor principal, codeudor o garante con el Banco Comercial de Manabí S.A. la persona natural o jurídica cesionaria o adquiriente de dicha obligación queda desde ya expresamente facultada para realizar las mismas actividades en los dos párrafos precedentes.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Exaple 1 -->
                                                        <div class="row px-2">
                                                            <div class="col-md-8">
                                                                <div class="form-check" style="margin-left:15px; margin-top:10px; text-color:black">
                                                                    <input type="checkbox" class="form-check-input" id="mybox" required>
                                                                    <label class="mt-0 form-check-label" for="mybox" style=" margin-top:-500px; ">Acepto los términos de confidencialidad</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 text-lg-right ml-3 ml-lg-0 pr-lg-4" style="margin-top:8px;">
                                                                <a  href="{{url('archivos/AUTORIZACION-BURO-CREDITO.pdf')}}" download="Acuerdo de Confidencialidad" style="color:black"><i class="far fa-file-pdf" style="color:red;"></i>
                                                                    Descargar Archivo
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Grid column -->
                                                <br>

                                                <div class="col text-center" style="margin-top:-10px;">
                                                    <button id="btnsave" class="btn btn-success mx-auto" type="submit" value="Guardar" style="margin-top:30px "
                                                    data-sitekey="{{config('recaptcha-v3.site_key')}}" 
                                                    data-callback='onSubmit' 
                                                    data-action='submit'
                                                    data-toggle="popover" title="Error" data-content="Usted no ha completado toda la información"
                                                    >
                                                        Enviar solicitud <i class="fa fa-save"></i>
                                                    </button>
                                                    <a class="btn btn-secondary ml-2 g-recaptcha" onclick="if (!confirm('Esta seguro?, se eliminará la información ingresada')) event.preventDefault();" href="{{ route('solicita') }}" style="margin-top:30px ">
                                                        Cancelar <i class="fa fa-times"></i>
                                                    </a>
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
