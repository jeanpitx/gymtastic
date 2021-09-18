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
            {!! Form::open(['route' => 'contacto.storePublic','files'=>true,'id'=>'fomrsend','class'=>'upload-form']) !!}
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
                    <div class="col-sm-12 px-0 pb-2">
                        <!-- AQUI VA EL CONTENIDO DE LA PAGINA -->
                        <div class="card border-success">
                            <div class="card-body">
                                <h2 class="card-title">Solicitud de productos financieros</h2>
                                <p class="form-text my-0 w-100 text-justify" style="font-size:15px; color:rgb(68, 68, 68)"><b>¡Bienvenido!</b>, Gracias por tu interés en nosotros; por favor, llena los siguientes datos y selecciona el servicio que necesitas. <span class="text-muted">Lo mas pronto posible nos contactarenmos contigo.</span></p>
                                <p class="form-text text-muted" style="font-size:14px;">Campos con (<b class="text-danger">*</b>) son obligatorios</p>
                                <p class="text-success" style="margin-top:-8px;margin-bottom:-8px; font-size:13px;">
                                    Banco Comercial de Manabí no se responsabiliza por la información proporcionada en este formulario.
                                </p>
                                <hr>
                                <button class="btn btn-success mbcard" type="button" data-toggle="collapse"
                                    data-target="#colapsito" aria-expanded="false" aria-controls="colapsito"
                                    data-toggle="popover" data-placement="top" title="Datos Personales" data-content="Error: Usted no ha completado toda la información">
                                    1. Datos Solicitud
                                </button>

                                <div class="col-md-12 py-1"></div> <!-- Se añade otro espacio -->
                                <div class="row">
                                    <div class="collapse multi-collapse  col-md-12" id="colapsito">
                                        <div class="card">
                                            <div class="card-header">
                                            <strong>DATOS SOLICITUD </strong>
                                            </div>
                                            <div class="card-body" style="position: relative;">
                                                <div id="loading" style="position: absolute; left:1; z-index:100; width:97%; height:97%; background:white; padding-top:10px; color:rgb(92, 89, 89); text-align:center; font-size:20px; display:none;">
                                                    <p>Consultando...</p>
                                                </div>
                                                <!-- Identificacion y Nombres -->
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
                                                        <div class="col">
                                                            {!! Form::label('nombres', 'Nombres') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-user"></i></div>
                                                                {!! Form::text('nombres', null, ['class' =>
                                                                'form-control toupper'.($errors->has('nombres')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese sus nombres completos','required','maxlength'=>'150']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('primern') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Email y teléfono-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('email', 'Correo electrónico') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fas fa-at"></i></div>
                                                                {!! Form::email('email', null, ['class' =>
                                                                'form-control tolower'.($errors->has('email')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese su direccion de correo electrónico','required','maxlength'=>'100']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('email') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('telefono', 'Número de telefono') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fa fa-phone"></i></div>
                                                                {!! Form::text('telefono', null, ['class' =>
                                                                'form-control toupper'.($errors->has('telefono')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese su número telefónico','required','onkeypress' => 'soloNumeros(event);','minlength'=>'9','maxlength'=>'10']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('telefono') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Ciudad y tipo consulta-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('ciudad', 'Ciudad de domicilio') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fas fa-map-marker-alt"></i></div>
                                                                {!! Form::text('ciudad', null, ['class' =>
                                                                'form-control toupper'.($errors->has('ciudad')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese su ciudad de domicilio','required','maxlength'=>'100']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('ciudad') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('tipo_consulta', 'Tipo de producto o servicio') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fas fa-list"></i></div>
                                                                {!! Form::select('tipo_consulta', $parametros,null,['class'=>'custom-select form-control','placeholder' =>
                                                                'Seleccione...','required']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('tipo_consulta') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Mensaje contacto -->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-12">
                                                        <div class="col">
                                                            {!! Form::label('mensaje', 'Su mensaje') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fas fa-inbox" style="padding-top:50%"></i></div>
                                                                {!! Form::textarea('mensaje', null, ['class' =>
                                                                'form-control toupper'.($errors->has('mensaje')?'
                                                                is-invalid':''),'placeholder' => 'Ingrese el mensaje que desea dejarle a uno de nuestros asesores.','required','minlength'=>'20','maxlength'=>'300','rows'=>'2']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('mensaje') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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

                                                <div class="col-md-12 d-flex justify-content-center">
                                                    <button id="btnsave" class="btn btn-success" type="submit" value="Guardar" style="margin-top:10px "
                                                        data-sitekey="{{config('recaptcha-v3.site_key')}}" 
                                                        data-callback='onSubmit' 
                                                        data-action='submit'>
                                                            Enviar solicitud <i class="fas fa-paper-plane"></i>
                                                    </button>
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
    {!! Html::script('js/validaciones.js') !!}
    {!! Html::script('js/principal.js') !!}

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

        //ESTO SIRVE PARA EL MODAL QUE LLEGA DESDE EL SERVIDOR CUANDO SE COMPLETA EL REGISTRO DE LA SOLICITUD FLASH ERROR LARAVEL
        if($('#flash-overlay-modal')){
            $('#flash-overlay-modal').modal();
            $('#flash-overlay-modal').find(".modal-header").addClass("bg-success text-white text-left");
            $('#flash-overlay-modal').find(".modal-header").find("button[data-dismiss='modal']").html("<span aria-hidden='true'>&times;</span>");
            $('#flash-overlay-modal').find(".modal-header").find("button[data-dismiss='modal']").insertAfter($("#flash-overlay-modal").find('.modal-title'));
            $('#flash-overlay-modal').find(".modal-footer").find("button[data-dismiss='modal']").removeClass("btn-default").addClass("btn-outline-secondary");
            $('#flash-overlay-modal').find(".modal-footer").find("button[data-dismiss='modal']").text("Aceptar")
        }

        var myTimer = setInterval(function () {
            if(!$('#identificacion').val)
                $('#identificacion').focus();
            clearInterval(myTimer);
        }, 50);

        $('#identificacion').on('focusout', function(e) {
            if($('#identificacion').val().length==10)
                callFunctionPersona();
            else
                $('#identificacion')[0].reportValidity(); //forza la validacion html5
        });

        $('#identificacion').on('keyup', function(e) {//cancelamos que al dar enter se guarde el formulario
            var keyCode = e.keyCode || e.which;
            if ($('#identificacion').val().length==10 && keyCode === 13) { 
                $('#nacionalidad').focus();
                e.preventDefault();
                return false;
            }else if (keyCode === 13){
                $('#identificacion')[0].reportValidity();
            }
        });

        function ejecutaConsultaPersona(urlroute){
            //ejecutar consulta en el servicio interno (valida que no se haya consultado para que no vuelva a consultar)
            if(!$('#segundon').val() && !$('#primern').val() && !$('#segundoa').val() && !$('#primera').val() && !$('#nacionalidad').val()){
                $("#loading").show();
                $.ajax({
                    url: urlroute + "/" +$('#identificacion').val(),
                    headers: {
                        'apikey': 'key_cur_prod_fnPqT5xQEi5Vcb9wKwbCf65c3BjVGyBBBCM',
                    },
                    success: function(data) { 
                        if(!data[0]){
                            $('#errorModal').find(".modal-body").text("Error: Consultando cedula");
                            $('#errorModal').on('hidden.bs.modal', function (e) {
                                $('#errorModal').find(".modal-body").text("");
                                $('#errorModal').off('hidden.bs.modal');
                                $("#identificacion").focus();
                            });
                            $("#identificacion").val("");
                            $('#errorModal').modal('show');
                            return;
                        }
                        if(data[0].error!==""){
                            $('#errorModal').find(".modal-body").text(data[0].error);
                            $('#errorModal').on('hidden.bs.modal', function (e) {
                                $('#errorModal').find(".modal-body").text("");
                                $('#errorModal').off('hidden.bs.modal');
                                $("#identificacion").focus();
                            });
                            $("#identificacion").val("");
                            $('#errorModal').modal('show');
                        }else{
                            $('#nombres').val(data[0].name);
                            $('#email').focus();
                        }
                        $("#loading").hide();
                    },
                    error: function() { alert('Error de consulta'); $("#loading").hide(); }
                });
            }else{
                alert("Sus datos ya han sido consultados");
            }
        }

        function callFunctionPersona(){ ejecutaConsultaPersona("{{ url('/cid') }}");}
    </script>
</body>

</html>
