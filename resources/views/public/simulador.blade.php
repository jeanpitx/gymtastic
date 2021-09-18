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
                                <h2 class="card-title">Productos financieros BCM</h2>
                                <p class="form-text text-muted">Campos con (<b class="text-danger">*</b>) son obligatorios</p>
                                <p class="text-success" style="margin-top:-8px;margin-bottom:-8px; font-size:13px;">
                                    Banco Comercial de Manabí no se responsabiliza por la información proporcionada en este formulario.
                                </p>
                                <hr>
                                <button class="btn btn-success mbcard" type="button" data-toggle="collapse"
                                    data-target="#colapsito" aria-expanded="false" aria-controls="colapsito"
                                    data-toggle="popover" data-placement="top" title="Datos Personales" data-content="Error: Usted no ha completado toda la información">
                                    1. Información General
                                </button>

                                <div class="col-md-12 py-1"></div> <!-- Se añade otro espacio -->
                                <div class="row">
                                    <div class="collapse multi-collapse  col-md-12" id="colapsito">
                                        <div class="card">
                                            <div class="card-header">
                                            <strong>SIMULADOR DE CRÉDITO </strong>
                                            </div>
                                            <div class="card-body" style="position: relative;">
                                                <div id="loading" style="position: absolute; left:1; z-index:100; width:97%; height:97%; background:white; padding-top:10px; color:rgb(92, 89, 89); text-align:center; font-size:20px; display:none;">
                                                    <p>Consultando...</p>
                                                </div>
                                                <!-- Identificacion y Nombres -->
                                                <div class="row d-flex justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('identificacion', 'Identificación:') !!}<b class="text-danger"> *</b>
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
                                                            {!! Form::label('nombres', 'Nombres:') !!}<b class="text-danger"> *</b>
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

                                                <!-- OTRO APARTADO -->
                                                <div class="form-group col-sm-12" style="margin-top:-5px; margin-top:5px">
                                                    <p class="text-success">
                                                        Datos de crédito
                                                    </p>
                                                    <hr>
                                                </div>


                                                <!-- Sistema y Tipo de crédito-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('sistema', 'Sistema Amortización:') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fas fa-history"></i></div>
                                                                {!! Form::select('sistema',['Frances','Aleman'], null, ['class' =>
                                                                'custom-select form-control'.($errors->has('sistema')?'
                                                                is-invalid':''),'required']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('sistema') }}</span>
                                                            </div>
                                                            <small class="form-text text-muted">Aleman (Cuotas fíjas), Frances (Cuotas variables).</small>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('tipo_credito', 'Tipo de crédito:') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fas fa-chart-line"></i></div>
                                                                {!! Form::select('tipo_credito',['Microcrédito','Comercial','Consumo'], null, ['class' =>
                                                                'custom-select form-control'.($errors->has('tipo_credito')?'
                                                                is-invalid':''),'required']) !!}
                                                                <span
                                                                    class="invalid-feedback">{{ $errors->first('tipo_credito') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Monto y Plazo-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            {!! Form::label('monto', 'Monto:') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fas fa-dollar-sign"></i></div>
                                                                {!! Form::number('monto', null, ['class' =>'form-control'.($errors->has('monto')?'
                                                                is-invalid':''),'placeholder' => 'Monto en dolares','onkeypress' => 'soloNumeros(event);','required','minlength'=>'0','maxlength'=>'100000','step'=>'500']) !!}
                                                                <span class="invalid-feedback">{{ $errors->first('monto') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col">
                                                            <!-- {!! Form::text('taza_old', 16, ['id' => 'taza_old','style' => 'display:block']) !!} -->
                                                            {!! Form::label('taza', 'Tasa de interes:') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                <div class="input-group-prepend"><i class="input-group-text fas fa-percentage"></i></div>
                                                                {!! Form::text('taza', null, ['class' =>'form-control'.($errors->has('taza')?'
                                                                is-invalid':''),'placeholder' => 'Tasa en porcentaje','onkeypress' => 'soloNumerosFloat(event);','required','minlength'=>'1','maxlength'=>'6']) !!}
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">%</span>
                                                                  </div>
                                                                <span class="invalid-feedback">{{ $errors->first('taza') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--  Plazo-->
                                                <div class="row d-flex  justify-content-around">
                                                    <div class="form-group col-md-12">
                                                        <div class="col">
                                                            {!! Form::label('plazo', 'Plazo:') !!}<b class="text-danger"> *</b>
                                                            <div class="input-group margin-bottom-sm">
                                                                {!! Form::range('plazo', 6, ['class' =>'form-control-range'.($errors->has('plazo')?'
                                                                is-invalid':''),'placeholder' => 'Monto en dolares','onkeypress' => 'soloNumeros(event);','required','min'=>'6','max'=>'60','oninput'=>'plazeOutput.value = plazo.value']) !!}
                                                                <span class="invalid-feedback">{{ $errors->first('plazo') }}</span>
                                                            </div>
                                                            <strong class="form-text text-muted"><output name="plazeOutput" id="plazeOutput">6</output> meses</strong>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div id="resulValores" class="col-md-12 pt-3 pb-2 my-2" style="position: relative; background-color:rgb(237, 248, 237); border-radius: 5px; border: 2px solid #89cf92;display:none;">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="form-group col-auto mx-4">
                                                            <strong style="color:rgb(48, 87, 48)">Cuota mensual (aproximada)</strong><br>
                                                            <strong id="resulCuota" style="color: grey">$250.00</strong>
                                                        </div>
                                                        <div class="form-group col-auto mx-4">
                                                            <strong style="color:rgb(48, 87, 48)">Ingresos requeridos estimados</strong><br>
                                                            <strong id="resulSueldo" style="color: grey">$900.00</strong>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="resulTabla" class="col-md-12 pt-3 pb-2 my-2 text-center" style="position: relative; border-radius: 5px; border: 2px solid #89cf92;display:none;">
                                                    <h4>Tabla de amortización</h4>
                                                    <div class="table-responsive">
                                                        <table class="table table-sm table-hover table-striped mt-3">
                                                            <caption>Banco Comercial de Manabí.</caption>
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Meses</th>
                                                                    <th scope="col">Cuota</th>
                                                                    <th scope="col">Amortización</th>
                                                                    <th scope="col">Interés</th>
                                                                    <th scope="col">Deuda</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>0</th>
                                                                    <td>-$1000.00</td>
                                                                    <td>0</td>
                                                                    <td>0</td>
                                                                    <td>$10000.00</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                                <div class="col-md-12 d-flex justify-content-center">
                                                    <a class="btn btn-outline-secondary mt-4 mx-2" href="{{route("simulador")}}">Borrar todo</a>
                                                    <button id="btncalcula" class="btn btn-success mt-4 px-3 mx-2" type="submit" value="Guardar"  title="Simular Crédito">
                                                        <i class="fas fa-calculator"></i> Calcular
                                                    </button>
                                                    <button id="btntabla" class="btn btn-info mt-4 px-3 mx-2" type="submit" value="Guardar"  title="Ver tabla de amortización" style="display:none;">
                                                        <i class="fas fa-table"></i> Tabla de Amortización
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
        $("#plazeOutput").html($("#plazo").val());

        $("#taza").change(function(){
            $(this).val(parseFloat($(this).val()).toFixed(2));
        });

        $("#btntabla").click(function(){
            $("#resulTabla").toggle();
        });

        $("#btncalcula").click(function(){
            if($("#monto").val()==""){ $('#monto')[0].reportValidity(); return;}
            if($("#taza").val()==""){ $('#taza')[0].reportValidity(); return;}
            if($("#taza").val()>90){ alert("El valor de la taza de interes no debe ser mayor a 100"); return;}

            if($("#sistema").val()==0){//FRANCES
                var monto=parseFloat($("#monto").val());
                var periodo=$("#taza").val()/12;
                var taza=periodo/100;//porcentaje
                var plazo=parseInt($("#plazo").val());

                //formula interes
                var result = taza/(1-Math.pow( (1+taza), (-plazo) ));
                var cuota_fija = monto*result;

                $("#resulCuota").html("$"+cuota_fija.toFixed(2));
                $("#resulSueldo").html("$"+(cuota_fija+ (cuota_fija<=200?400:cuota_fija>=201&&cuota_fija<=400?600:cuota_fija>=401&&cuota_fija<=600?800:1000)).toFixed(2));
                $("#resulValores").show();
                $("#btntabla").show();

                $("#resulTabla tbody").html("");//limpia la tabla
                $("#resulTabla tbody").append('<tr><th>0</th><td>0</td><td>0</td><td>0</td><td>$' + monto.toFixed(2) +'</td></tr>');
                for(x=1;x<=plazo;x++){
                    ik=monto * taza;
                    ak= cuota_fija - ik;
                    monto=monto-ak;
                    if(Math.sign(monto)==-1) monto=monto*-1;

                    var tdindex = $('<th></th>').html(x);
                    var tdcuota = $('<td></td>').html("$" +cuota_fija.toFixed(2));
                    var tdamortizacion = $('<td></td>').html("$" + ak.toFixed(2));
                    var tdinteres = $('<td></td>').html("$" + ik.toFixed(2));
                    var tddeuda = $('<td></td>').html("$" + monto.toFixed(2));

                    $("#resulTabla tbody").append(
                        $("<tr></tr>")
                            .append(tdindex)
                            .append(tdcuota)
                            .append(tdamortizacion)
                            .append(tdinteres)
                            .append(tddeuda)
                    );
                }
                $("#resulTabla tbody").append('<tr><th>SUMA:</th><th>$'+ (cuota_fija*plazo).toFixed(2) +'</th><th>$'+$("#monto").val()+'</th><th>$'+ ((cuota_fija*plazo) - parseFloat($("#monto").val())).toFixed(2) +'</th><td></td></tr>');
            }else{
                var monto=parseFloat($("#monto").val());
                var periodo=$("#taza").val()/12;
                var taza=periodo/100;//porcentaje
                var plazo=parseInt($("#plazo").val());

                //formula interes
                var result = taza/(1-Math.pow( (1+taza), (-plazo) ));
                var ak= parseFloat($("#monto").val()) / plazo;

                $("#resulValores").show();
                $("#btntabla").show();

                $("#resulTabla tbody").html("");//limpia la tabla
                $("#resulTabla tbody").append('<tr><th>0</th><td>0</td><td>0</td><td>0</td><td>$' + monto.toFixed(2) +'</td></tr>');
                var acumcuota=0;
                for(x=1;x<=plazo;x++){
                    ik=monto * taza;
                    cuota_fija = ik+ak;
                    monto=monto-ak;
                    if(Math.sign(monto)==-1) monto=monto*-1;
                    acumcuota+=cuota_fija;

                    
                    if(x==1){
                        $("#resulCuota").html("$"+cuota_fija.toFixed(2));
                        $("#resulSueldo").html("$"+(cuota_fija + 602.34).toFixed(2));
                    }

                    var tdindex = $('<th></th>').html(x);
                    var tdcuota = $('<td></td>').html("$" +cuota_fija.toFixed(2));
                    var tdamortizacion = $('<td></td>').html("$" + ak.toFixed(2));
                    var tdinteres = $('<td></td>').html("$" + ik.toFixed(2));
                    var tddeuda = $('<td></td>').html("$" + monto.toFixed(2));

                    $("#resulTabla tbody").append(
                        $("<tr></tr>")
                            .append(tdindex)
                            .append(tdcuota)
                            .append(tdamortizacion)
                            .append(tdinteres)
                            .append(tddeuda)
                    );
                }
                $("#resulTabla tbody").append('<tr><th>SUMA:</th><th>$'+ (acumcuota).toFixed(2) +'</th><th>$'+$("#monto").val()+'</th><th>$'+ (acumcuota - parseFloat($("#monto").val())).toFixed(2) +'</th><td></td></tr>');
            }

        });
    </script>
</body>

</html>
