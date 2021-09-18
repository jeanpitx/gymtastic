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

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 4.1.1 -->
    {!! Html::style('libs/bootstrap4/css/bootstrap.min.css') !!}

    <style>
        .white{
            color: white !important;
        }
    </style>
</head>
<body class="app" style="padding: 15px 15px 15px 15px !important;">
<div class="app-body">
    <main class="main">
        <style>
            #accordion label{
                font-weight: bold;
            }
        </style>
        <div class="card" style="margin-bottom: 5px">
            <div class="card-body row" style="margin-top: -8px;margin-bottom: -8px">
                <div class="col-auto" style="padding-top:3px"><b>Estado Solicitud: </b>{{ $solicitud->estado }}</div>
            </div>
        </div>
        <div id="accordion"  expanded="false">
            <!-- DATOS DE LA TARJETA DE CRÉDITO -->
            <div class="card" style="margin-bottom: 0 !important;">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTarjeta" aria-expanded="true" aria-controls="collapseOne">
                            Datos de Solicitud
                        </button>
                        <i id="ico_mecanizado" class="fab fa-cc-visa" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
                    </h5>
                </div>
        
                <div id="collapseTarjeta" class="collapse show" aria-labelledby="headingOne">
                    <div class="card-body row" style="margin-bottom:-20px">
                        <!-- Nombre Tarjeta Field -->
                        <div class="form-group col-auto">
                            {!! Form::label('nombre_tarjeta', __('models/solicitudes.fields.nombre_tarjeta').':') !!}
                            <p>{{ $solicitud->nombre_tarjeta }}</p>
                        </div>

                        <!-- Tipo Tarjeta Field -->
                        <div class="form-group col-auto">
                            {!! Form::label('tipo_tarjeta', __('models/solicitudes.fields.tipo_tarjeta').':') !!}
                            <p>{{ ($solicitud->tipo_tarjeta==1?"VISA NACIONAL":($solicitud->tipo_tarjeta==2?"VISA CLÁSICA":"VISA ORO")) }}</p>
                        </div>

                        <!-- Estado Cuenta Field -->
                        <div class="form-group col-auto">
                            {!! Form::label('estado_cuenta', __('models/solicitudes.fields.estado_cuenta').':') !!}
                            <p>{{ $solicitud->estado_cuenta }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATOS DE LA PERSONA SOLICITANTE -->
            <div class="card" style="margin-bottom: 0 !important;">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSolicitante" aria-expanded="false" aria-controls="collapseTwo">
                            Datos de Persona
                        </button>
                        <i id="ico_mecanizado" class="fas fa-fingerprint" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
                    </h5>
                </div>
                <div id="collapseSolicitante" class="collapse show" aria-labelledby="headingTwo">
                    <div class="card-body"  style="margin-bottom:-20px">
                        <div class="row">
                            <!-- Id_Persona Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('Identificación', 'Identificación:') !!}
                                <p>{{ $solicitud->PersonaSolicitante()->first()->Persona()->first()->identificacion }}</p>
                            </div>
                            <!-- apellido_paterno Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('apellido_paterno', 'Apellidos:') !!}
                                <p>{{ $solicitud->PersonaSolicitante()->first()->Persona()->first()->primer_apellido." ".$solicitud->PersonaSolicitante()->first()->Persona()->first()->segundo_apellido }}</p>
                            </div>
                            <!-- nombres Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('nombres', 'Nombres:') !!}
                                <p>{{ $solicitud->PersonaSolicitante()->first()->Persona()->first()->nombres }}</p>
                            </div>
                            <!-- fecha_nacimiento Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
                                <p>{{ date("d-m-Y", strtotime($solicitud->PersonaSolicitante()->first()->Persona()->first()->fecha_nacimiento)) }}</p>
                            </div>
                            <!-- sexo Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('sexo', 'Sexo:') !!}
                                <p>{{ $solicitud->PersonaSolicitante()->first()->Persona()->first()->sexo=="M"?"MASCULINO":"FEMENINO" }}</p>
                            </div>
                            <!-- estado_civil Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('estado_civil', 'Estado Civil:') !!}
                                <p>{{ $solicitud->PersonaSolicitante()->first()->Persona()->first()->estado_civil }}</p>
                            </div>
                            <!-- nacionalidad Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('nacionalidad', 'Nacionalidad:') !!}
                                <p>{{ $solicitud->PersonaSolicitante()->first()->Persona()->first()->Nacionalidad()->first()->descripcion }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATOS DE LA PERSONA CONYUGUE -->
            @if($solicitud->PersonaSolicitante()->first()->Persona()->first()->estado_civil == "CASADO" || 
                $solicitud->PersonaSolicitante()->first()->Persona()->first()->estado_civil =="EN UNION DE HECHO")
                <div class="card" style="margin-bottom: 0 !important;">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseConyugue" aria-expanded="false" aria-controls="collapseTwo">
                                Datos de Conyugue
                            </button>
                            <i id="ico_mecanizado" class="fas fa-church" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
                        </h5>
                    </div>
                    <div id="collapseConyugue" class="collapse show" aria-labelledby="headingTwo">
                        <div class="card-body">
                            <div class="row">
                                <!-- Id_Persona Field -->
                                <div class="form-group col-auto">
                                    {!! Form::label('Identificación', 'Identificación:') !!}
                                    <p>{{ $solicitud->PersonaSolicitante()->first()->Conyugue()->first()->identificacion }}</p>
                                </div>
                                <!-- apellido_paterno Field -->
                                <div class="form-group col-auto">
                                    {!! Form::label('apellido_paterno', 'Apellido Paterno:') !!}
                                    <p>{{ $solicitud->PersonaSolicitante()->first()->Conyugue()->first()->primer_apellido }}</p>
                                </div>
                                <!-- apellido_paterno Field -->
                                <div class="form-group col-auto">
                                    {!! Form::label('apellido_paterno', 'Apellido Materno:') !!}
                                    <p>{{ $solicitud->PersonaSolicitante()->first()->Conyugue()->first()->segundo_apellido }}</p>
                                </div>
                                <!-- nombres Field -->
                                <div class="form-group col-auto">
                                    {!! Form::label('nombres', 'Nombres:') !!}
                                    <p>{{ $solicitud->PersonaSolicitante()->first()->Conyugue()->first()->nombres }}</p>
                                </div>
                                <!-- fecha_nacimiento Field -->
                                <div class="form-group col-auto">
                                    {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
                                    <p>{{ date("d-m-Y", strtotime($solicitud->PersonaSolicitante()->first()->Conyugue()->first()->fecha_nacimiento)) }}</p>
                                </div>
                                <!-- sexo Field -->
                                <div class="form-group col-auto">
                                    {!! Form::label('sexo', 'Sexo:') !!}
                                    <p>{{ $solicitud->PersonaSolicitante()->first()->Conyugue()->first()->sexo=="M"?"MASCULINO":"FEMENINO" }}</p>
                                </div>
                                <!-- estado_civil Field -->
                                <div class="form-group col-auto">
                                    {!! Form::label('estado_civil', 'Estado Civil:') !!}
                                    <p>{{ $solicitud->PersonaSolicitante()->first()->Conyugue()->first()->estado_civil }}</p>
                                </div>
                                <!-- nacionalidad Field -->
                                <div class="form-group col-auto">
                                    {!! Form::label('nacionalidad', 'Nacionalidad:') !!}
                                    <p>{{ $solicitud->PersonaSolicitante()->first()->Conyugue()->first()->Nacionalidad()->first()->descripcion }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- DIRECCIÓN DE LA PERSONA -->
            <div class="card" style="margin-bottom: 0 !important;">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseDireccion" aria-expanded="false" aria-controls="collapseTwo">
                            Dirección y Contacto
                        </button>
                        <i id="ico_mecanizado" class="fas fa-map-signs" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
                    </h5>
                </div>
                <div id="collapseDireccion" class="collapse show" aria-labelledby="headingTwo">
                    <div class="card-body">
                        <div class="row">
                            <!-- tipo_direccion Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('tipo_direccion', 'Tipo Dirección:') !!}
                                <p>{{ $solicitud->PersonaSolicitante()->first()->Direccion()->first()->tipo_direccion }}</p>
                            </div>
                            <!-- ciudad Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('direccion', 'Ciudad:') !!}
                                <p>{{ strtoupper($solicitud->PersonaSolicitante()->first()->Direccion()->first()->Ciudad()->first()->descripcion) }}</p>
                            </div>
                            <!-- direccion Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('direccion', 'Dirección:') !!}
                                <p>{{ $solicitud->PersonaSolicitante()->first()->Direccion()->first()->direccion }}</p>
                            </div>
                            <!-- nombres Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('tipo_bien', 'Tipo Vivienda:') !!}
                                @switch($solicitud->PersonaSolicitante()->first()->Direccion()->first()->tipo_bien)
                                    @case("A") <p>ALQUILADA</p> @break
                                    @case("VF") <p>VIVE CON FAMILIARES</p> @break
                                    @case("P") <p>PRESTADA</p> @break
                                    @case("PH") <p>PROPIA HIPOTECADA</p> @break
                                    @case("PNH") <p>PROPIA NO HIPOTECADA</p> @break
                                @endswitch
                            </div>
                            <!-- fecha_nacimiento Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('fecha_nacimiento', 'Antiguedad:') !!}
                                <p>{{ intval($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien/12) }} 
                                    {{ intval($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien/12)==1?" Año":" Años" }}
                                    {{ ($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien%12)  }}
                                    {{ intval($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien%12)==1?" Mes":" Meses" }}
                                </p>
                            </div>
                            <!-- contactos Field -->
                            <div class="form-group col-md-12">
                                <table class="table table-striped table-sm" id="solicitudes-table">
                                    <thead>
                                        <tr>
                                            <th>@lang('Tipo Contacto')</th>
                                            <th>@lang('Contacto')</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-weight: normal;">
                                        @foreach($solicitud->PersonaSolicitante()->first()->Contacto()->get() as $contacto)
                                            <tr>
                                                <td>{{$contacto->tipo_contacto}}</td>
                                                <td>{{$contacto->contacto}} {{$contacto->extension?" (".$contacto->extension.")":""}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ACTIVIDAD PERSONA SOLICITANTE -->
            <div class="card" style="margin-bottom: 0 !important;">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseActividad" aria-expanded="false" aria-controls="collapseTwo">
                            Actividad Persona
                        </button>
                        <i id="ico_mecanizado" class="fas fa-university" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
                    </h5>
                </div>
                <div id="collapseActividad" class="collapse show" aria-labelledby="headingTwo">
                    <div class="card-body">
                        <div class="row">
                            <!-- nombre_empresa Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('nombre_empresa', 'Empresa:') !!}
                                <p>{{ $solicitud->PersonaSolicitante()->first()->Actividad()->first()->nombre_empresa }}</p>
                            </div>
                            <!-- actividad_empresa Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('actividad_empresa', 'Actividad:') !!}
                                <p>{{ strtoupper($solicitud->PersonaSolicitante()->first()->Actividad()->first()->ActividadEmpresa()->first()->descripcion) }}</p>
                            </div>
                            <!-- profesion Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('profesion', 'Profesión:') !!}
                                <p>{{ strtoupper($solicitud->PersonaSolicitante()->first()->Profesion()->first()->descripcion) }}</p>
                            </div>
                            <!-- cargo Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('cargo', 'Cargo:') !!}
                                <p>{{ $solicitud->PersonaSolicitante()->first()->Actividad()->first()->cargo }}</p>
                            </div>
                            <!-- antiguedad_laboral Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('antiguedad_laboral', 'Antiguedad:') !!}
                                <p>
                                    {{ intval($solicitud->PersonaSolicitante()->first()->Actividad()->first()->antiguedad_laboral/12) }} 
                                    {{ intval($solicitud->PersonaSolicitante()->first()->Actividad()->first()->antiguedad_laboral/12)==1?" Año":" Años" }}
                                    {{ ($solicitud->PersonaSolicitante()->first()->Actividad()->first()->antiguedad_laboral%12)  }}
                                    {{ intval($solicitud->PersonaSolicitante()->first()->Actividad()->first()->antiguedad_laboral%12)==1?" Mes":" Meses" }}
                                </p>
                            </div>
                            <!-- sueldo_empresa Field -->
                            <div class="form-group col-auto">
                                {!! Form::label('sueldo_empresa', 'Salario:') !!}
                                <p style="font-size: 18px">{{  "$".number_format((float)$solicitud->PersonaSolicitante()->first()->Actividad()->first()->sueldo_empresa, 2, '.', '') }}</p>
                            </div>
                            <!-- direccion_empresa Field -->
                            <div class="form-group col-sm-12 my-0 py-0" style="margin-top: -20px !important">
                                <p><b>Dirección: </b>{{strtoupper($solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->Ciudad()->first()->descripcion).", ".$solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->direccion }}</p>
                            </div>
                            <!-- direccion_empresa Field -->
                            <div class="form-group col">
                                <table class="table table-striped table-sm mt-0" id="solicitudes-table">
                                    <thead>
                                        <tr>
                                            <th>@lang('Tipo Contacto')</th>
                                            <th>@lang('Contacto')</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-weight: normal;">
                                        @foreach($solicitud->PersonaSolicitante()->first()->Actividad()->first()->Contacto()->get() as $contacto)
                                            <tr>
                                                <td>{{$contacto->tipo_contacto}}</td>
                                                <td>{{$contacto->contacto}} {{$contacto->extension?" (".$contacto->extension.")":""}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Referencias personales y bancarias -->
            <div class="card" style="margin-bottom: 0 !important;">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseReferencia" aria-expanded="false" aria-controls="collapseTwo">
                            Referencias
                        </button>
                        <i id="ico_mecanizado" class="fas fa-university" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
                    </h5>
                </div>
                <div id="collapseReferencia" class="collapse show" aria-labelledby="headingTwo">
                    <div class="card-body">
                        <div class="row">
                            <!-- referencia_personal Field -->
                            <div class="form-group col-12">
                                {!! Form::label('referencia_personal', 'Referencia Personal:') !!}
                                
                                <table class="table table-striped table-sm mt-0" id="solicitudes-table">
                                    <thead>
                                        <tr>
                                            <th>@lang('Nombres')</th>
                                            <th>@lang('Parentesco')</th>
                                            <th>@lang('Ciudad')</th>
                                            <th>@lang('Direccion')</th>
                                            <th>@lang('Tipo Contacto')</th>
                                            <th>@lang('Contacto')</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-weight: normal;">
                                        @foreach($solicitud->PersonaSolicitante()->first()->ReferenciaPersonal()->get() as $ref_personal)
                                            <tr>
                                                <td>{{$ref_personal->nombre_completo}}</td>
                                                <td>{{$ref_personal->parentesco}}</td>
                                                <td>{{strtoupper($ref_personal->Ciudad()->first()->descripcion)}}</td>
                                                <td>{{$ref_personal->direccion}}</td>
                                                <td>{{$ref_personal->tipo_telefono}}</td>
                                                <td>{{$ref_personal->telefono}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- referencia_bancaria Field -->
                            <div class="form-group col-12">
                                {!! Form::label('referencia_bancaria', 'Referencia Bancaria:') !!}
                                
                                <table class="table table-striped table-sm mt-0" id="solicitudes-table">
                                    <thead>
                                        <tr>
                                            <th>@lang('Institución Financiera')</th>
                                            <th>@lang('Tipo Cuenta')</th>
                                            <th>@lang('Numero Cuenta')</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-weight: normal;">
                                        @foreach($solicitud->PersonaSolicitante()->first()->ReferenciaBancaria()->get() as $ref_bancaria)
                                            <tr>
                                                <td>{{strtoupper($ref_bancaria->InstitucionFinanciera()->first()->descripcion)}}</td>
                                                <td>{{$ref_bancaria->tipo_cuenta}}</td>
                                                <td>{{$ref_bancaria->numero_cuenta}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- EGRESOS SOLICITANTE -->
            <div class="card" style="margin-bottom: 0 !important;">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseActividad" aria-expanded="false" aria-controls="collapseTwo">
                            Egresos y gastos
                        </button>
                        <i id="ico_mecanizado" class="fas fa-university" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
                    </h5>
                </div>
                <div id="collapseActividad" class="collapse show" aria-labelledby="headingTwo">
                    <div class="card-body">
                        <div class="row">
                            <!-- direccion_empresa Field -->
                            <div class="form-group col">
                                <table class="table table-striped table-sm mt-0" id="solicitudes-table">
                                    <thead>
                                        <tr>
                                            <th>@lang('Descripción')</th>
                                            <th style="text-align: right">@lang('Gasto')</th>
                                        </tr>
                                    </thead>
                                    <tbody style="font-weight: normal;">
                                        @foreach($solicitud->PersonaSolicitante()->first()->GastoPatrimonio()->get() as $gastos)
                                            <tr>
                                                <td>{{$gastos->descripcion}}</td>
                                                <td style="text-align: right">${{number_format((float)$gastos->valor, 2, '.', '')}}</td>
                                            </tr>
                                        @endforeach
                                            <tr>
                                                <td style="font-weight: bold">INGRESOS(SUELDO) - EGRESOS(SUMA)</td>
                                                <td id="sum" style="text-align: right; font-size:20px;" class="{!!($solicitud->PersonaSolicitante()->first()->Actividad()->first()->sueldo_empresa - $solicitud->PersonaSolicitante()->first()->GastoPatrimonio()->sum('valor'))>0?" text-success":"text-danger"!!}">${{ number_format((float)($solicitud->PersonaSolicitante()->first()->Actividad()->first()->sueldo_empresa - $solicitud->PersonaSolicitante()->first()->GastoPatrimonio()->sum('valor')), 2, '.', '')}}</td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <script>
            window.print();
        </script>
    </main>
</div>

</body>

</html>
