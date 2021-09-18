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
    <!--SE DEJA LOCALHOST EN LAS URL SIN HTTPS POR QUE DA PROBLEMA CON LA LIBRERIA, PARA EJECUTAR EN UN AMBIENTE DE PRUEBA APUNTAR A PUBLIC O ELIMINAR EL HOST Y DEJAR SOLO LA RUTA-->
    {!! Html::style('http://localhost/libs/bootstrap4/css/bootstrap.min.css') !!}
    <!-- Bootstrap 4.1.1 -->
    <style type="text/css" media="all">
        .btn-link{
            color: #20a8d8 !important;
        }
        th, tr, thead, tbody, td{
            margin-bottom: -3px !important;
            margin-top: -3px !important;
            padding-bottom: -3px !important;
            padding-top: -3px !important;
        }
        /*th { white-space:pre }*/
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
        <div style="text-align: center; margin-bottom: -8px !important;">
            {{ Html::image('http://localhost/img/logov.png', 'BCM', ['class' => 'img-fluid', 'width' => 150 , 'height' => 60]) }}
            <h6>Solicitud de tarjetas de crédito</h6>
        </div>
        <div id="accordion"  expanded="false">
            <div class="card">
                <div class="card-header" style="font-size:12px !important;background-color: white !important;padding-bottom:2px !important;">
                    <b>Estado Solicitud: </b>{{ $solicitud->estado }}
                </div>
            </div>

            <!-- DATOS DE LA TARJETA DE CRÉDITO -->
            <div class="card">
                <div class="card-header btn-link py-0 py-0" style="font-size:14px !important;  margin-top: -3px;  margin-bottom:-3px !important;">
                    Datos de solicitud
                </div>
            </div>
            <div class="card" style="margin-bottom: -8px !important;">
                <table class="table table-sm" id="solicitudes-table" style="font-size: 12px !important">
                    <thead>
                        <tr>
                            <th>Nombre Tarjeta</th>
                            <th>Tipo Tarjeta</th>
                            <th>Estado Cuenta</th>
                        </tr>
                    </thead>
                    <tbody style="font-weight: normal;">
                            <tr>
                                <td>{{$solicitud->nombre_tarjeta}}</td>
                                <td>{{($solicitud->tipo_tarjeta==1?"VISA NACIONAL":($solicitud->tipo_tarjeta==2?"VISA CLÁSICA":"VISA ORO"))}}</td>
                                <td>{{$solicitud->estado_cuenta}}</td>
                            </tr>
                    </tbody>
                </table>
            </div>

            <!-- DATOS DE LA PERSONA SOLICITANTE -->
            <div class="card">
                <div class="card-header btn-link py-0" style="font-size:14px !important;  margin-top: -2px;  margin-bottom:-3px !important;">
                    Datos Personales
                </div>
            </div>
            <div class="card" style="margin-bottom: -8 !important;">
                <table class="table table-sm" id="solicitudes-table" style="font-size: 11px !important">
                    <thead>
                        <tr>
                            <th>Identificacion</th>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Fecha Nacimiento</th>
                            <th>Sexo</th>
                            <th>Estado Civil</th>
                            <th>Nacionalidad</th>
                        </tr>
                    </thead>
                    <tbody style="font-weight: normal;">
                            <tr>
                                <td>{{$solicitud->PersonaSolicitante()->first()->Persona()->first()->identificacion}}</td>
                                <td>{{$solicitud->PersonaSolicitante()->first()->Persona()->first()->primer_apellido." ".$solicitud->PersonaSolicitante()->first()->Persona()->first()->segundo_apellido}}</td>
                                <td>{{$solicitud->PersonaSolicitante()->first()->Persona()->first()->nombres}}</td>
                                <td>{{date("d-m-Y", strtotime($solicitud->PersonaSolicitante()->first()->Persona()->first()->fecha_nacimiento))}}</td>
                                <td>{{$solicitud->PersonaSolicitante()->first()->Persona()->first()->sexo=="M"?"MASCULINO":"FEMENINO"}}</td>
                                <td>{{$solicitud->PersonaSolicitante()->first()->Persona()->first()->estado_civil}}</td>
                                <td>{{$solicitud->PersonaSolicitante()->first()->Persona()->first()->nacionalidad}}</td>
                            </tr>
                    </tbody>
                </table>
            </div>

            <!-- DATOS DE LA PERSONA CONYUGUE -->
            @if($solicitud->PersonaSolicitante()->first()->Persona()->first()->estado_civil == "CASADO" || 
                $solicitud->PersonaSolicitante()->first()->Persona()->first()->estado_civil =="EN UNION DE HECHO")
                <div class="card">
                    <div class="card-header btn-link py-0" style="font-size:14px !important;  margin-top: -5px;  margin-bottom:-3px !important;">
                        Datos del Conyugue
                    </div>
                </div>
                <div class="card" style="margin-bottom: -8 !important;">
                    <table class="table table-sm" id="solicitudes-table" style="font-size: 11px !important">
                        <thead>
                            <tr>
                                <th>Identificacion</th>
                                <th>Apellidos</th>
                                <th>Nombres</th>
                                <th>Fecha Nacimiento</th>
                                <th>Sexo</th>
                                <th>Nacionalidad</th>
                            </tr>
                        </thead>
                        <tbody style="font-weight: normal;">
                                <tr>
                                    <td>{{$solicitud->PersonaSolicitante()->first()->Conyugue()->first()->identificacion}}</td>
                                    <td>{{$solicitud->PersonaSolicitante()->first()->Conyugue()->first()->primer_apellido." ".$solicitud->PersonaSolicitante()->first()->Persona()->first()->segundo_apellido}}</td>
                                    <td>{{$solicitud->PersonaSolicitante()->first()->Conyugue()->first()->nombres}}</td>
                                    <td>{{date("d-m-Y", strtotime($solicitud->PersonaSolicitante()->first()->Conyugue()->first()->fecha_nacimiento))}}</td>
                                    <td>{{$solicitud->PersonaSolicitante()->first()->Conyugue()->first()->sexo=="M"?"MASCULINO":"FEMENINO"}}</td>
                                    <td>{{$solicitud->PersonaSolicitante()->first()->Conyugue()->first()->nacionalidad}}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            @endif

            <!-- DIRECCIÓN DE LA PERSONA -->
            <div class="card">
                <div class="card-header btn-link py-0" style="font-size:14px !important;  margin-top: -5px;  margin-bottom:-3px !important;">
                    Dirección y Contacto
                </div>
            </div>
            <div class="card" style="margin-bottom: -8 !important;">
                <table class="table table-sm" id="solicitudes-table" style="font-size: 11px !important">
                    <thead>
                        <tr>
                            <th>Tipo Dirección</th>
                            <th>Ciudad</th>
                            <th>Tipo Vivienda</th>
                            <th>Antiguedad</th>
                        </tr>
                    </thead>
                    <tbody style="font-weight: normal;">
                            <tr>
                                <td>{{$solicitud->PersonaSolicitante()->first()->Direccion()->first()->tipo_direccion}}</td>
                                <td>{{$ciudad[$solicitud->PersonaSolicitante()->first()->Direccion()->first()->id_ciudad]}}</td>
                                <td>
                                    @switch($solicitud->PersonaSolicitante()->first()->Direccion()->first()->tipo_bien)
                                        @case("A") ALQUILADA @break
                                        @case("VF") VIVE CON FAMILIARES @break
                                        @case("P") PRESTADA @break
                                        @case("PH") PROPIA HIPOTECADA @break
                                        @case("PNH") PROPIA NO HIPOTECADA @break
                                    @endswitch
                                </td>
                                <td>{{ intval($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien/12) }} 
                                    {{ intval($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien/12)==1?" Año":" Años" }}
                                    {{ ($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien%12)  }}
                                    {{ intval($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien%12)==1?" Mes":" Meses" }}
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2">Dirección principal y secundaria</th>
                                <th colspan="2">Dirección referencia</th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    {{ $solicitud->PersonaSolicitante()->first()->Direccion()->first()->direccion_principal.", ".$solicitud->PersonaSolicitante()->first()->Direccion()->first()->direccion_secundaria }}
                                </td>
                                <td colspan="2">
                                    {{ $solicitud->PersonaSolicitante()->first()->Direccion()->first()->referencia }}
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="card" style="margin-bottom: -8 !important;">
                <table class="table table-striped table-sm" id="solicitudes-table" style="font-size: 11px !important">
                    <thead>
                        <tr>
                            <th>@lang('Tipo Contacto')</th>
                            <th>@lang('Contacto')</th>
                        </tr>
                    </thead>
                    <tbody style="font-weight: normal;">
                        @foreach($solicitud->PersonaSolicitante()->first()->Contacto()->get() as $contacto)
                            <tr>
                                <td>{{strtoupper($contacto->tipo_contacto)}}</td>
                                <td>{{$contacto->contacto}} {{$contacto->extension?" (".$contacto->extension.")":""}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- ACTIVIDAD PERSONA SOLICITANTE -->
            <div class="card">
                <div class="card-header btn-link py-0" style="font-size:14px !important;  margin-top: -5px;  margin-bottom:-3px !important;">
                    Actividad Económica
                </div>
            </div>
            <div class="card" style="margin-bottom: -8 !important;">
                <table class="table table-sm" id="solicitudes-table" style="font-size: 11px !important">
                    <thead>
                        <tr>
                            <th>Empresa</th>
                            <th>Actividad</th>
                            <th>Profesión</th>
                            <th>Cargo</th>
                            <th>Antiguedad</th>
                            <th>Salario</th>
                        </tr>
                    </thead>
                    <tbody style="font-weight: normal;">
                            <tr>
                                <td>{{$solicitud->PersonaSolicitante()->first()->Actividad()->first()->nombre_empresa}}</td>
                                <td>{{strtoupper($solicitud->PersonaSolicitante()->first()->Actividad()->first()->ActividadEmpresa()->first()->descripcion)}}</td>
                                <td>{{strtoupper($solicitud->PersonaSolicitante()->first()->Profesion()->first()->descripcion)}}</td>
                                <td>{{$solicitud->PersonaSolicitante()->first()->Actividad()->first()->cargo}}</td>
                                <td>{{ intval($solicitud->PersonaSolicitante()->first()->Actividad()->first()->antiguedad_laboral/12) }} 
                                    {{ intval($solicitud->PersonaSolicitante()->first()->Actividad()->first()->antiguedad_laboral/12)==1?" Año":" Años" }}
                                    {{ ($solicitud->PersonaSolicitante()->first()->Actividad()->first()->antiguedad_laboral%12)  }}
                                    {{ intval($solicitud->PersonaSolicitante()->first()->Actividad()->first()->antiguedad_laboral%12)==1?" Mes":" Meses" }}
                                </td>
                                <td>{{ "$".number_format((float)$solicitud->PersonaSolicitante()->first()->Actividad()->first()->sueldo_empresa, 2, '.', '')}}</td>
                            </tr>
                            <tr>
                                <th colspan="3">Dirección principal y secundaria</th>
                                <th colspan="3">Dirección referencia</th>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    {{$ciudad[$solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->id_ciudad]." - ".$solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->direccion_principal.", ".$solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->direccion_secundaria }}
                                </td>
                                <td colspan="3">
                                    {{ $solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->referencia }}
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="card" style="margin-bottom: -8 !important;">
                <table class="table table-striped table-sm" id="solicitudes-table" style="font-size: 11px !important">
                    <thead>
                        <tr>
                            <th>@lang('Tipo Contacto')</th>
                            <th>@lang('Contacto')</th>
                        </tr>
                    </thead>
                    <tbody style="font-weight: normal;">
                        @foreach($solicitud->PersonaSolicitante()->first()->Actividad()->first()->Contacto()->get() as $contacto)
                            <tr>
                                <td>{{strtoupper($contacto->tipo_contacto)}}</td>
                                <td>{{$contacto->contacto}} {{$contacto->extension?" (".$contacto->extension.")":""}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Referencias personales y bancarias -->
            <div class="card">
                <div class="card-header btn-link py-0" style="font-size:14px !important;  margin-top: -5px;  margin-bottom:-3px !important;">
                    Referencias Personales
                </div>
            </div>
            <div class="card" style="margin-bottom: -8 !important;">
                <table class="table table-striped table-sm" id="solicitudes-table" style="font-size: 10px !important">
                    <thead style="font-size: 11px !important">
                        <tr>
                            <th colspan="5">Referencias Personales</th>
                        </tr>
                        <tr>
                            <th>Nombres</th>
                            <th>Parentesco</th>
                            <th>Ciudad</th>
                            <th>Direccion</th>
                            <th>Contacto</th>
                        </tr>
                    </thead>
                    <tbody style="font-weight: normal;">
                        @foreach($solicitud->PersonaSolicitante()->first()->ReferenciaPersonal()->get() as $ref_personal)
                            <tr>
                                <td>{{$ref_personal->nombre_completo}}</td>
                                <td>{{$ref_personal->parentesco}}</td>
                                <td>{{$ciudad[$ref_personal->id_ciudad]}}</td>
                                <td>{{$ref_personal->direccion}}</td>
                                <td>{{$ref_personal->telefono.($ref_personal->tipo_telefono=="CELULAR"?" (Cel)":" (Conv)")}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card" style="margin-bottom: -7 !important;">
                <table class="table table-striped table-sm" id="solicitudes-table" style="font-size: 11px !important">
                    <thead>
                        <tr>
                            <th colspan="3">Referencias Bancarias</th>
                        </tr>
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


            <div style="position: fixed;left: 0;bottom: 10; text-align: right; width: 100%;font-size: 10px;">
                PAGINA <b>-1/2-</b>
            </div>
            <div style="page-break-after:always;"></div><!--SALTO DE PAGINA-->

            <!-- PATRIMONIOS SOLICITANTE -->
            <div class="card">
                <div class="card-header btn-link py-0" style="font-size:14px !important;  margin-top: -5px;  margin-bottom:-3px !important;">
                    Patrimonios e inversiones
                </div>
            </div>
            <div class="card" style="margin-bottom: -8 !important;">
                <table class="table table-sm" id="solicitudes-table" style="font-size: 11px !important">
                    <thead>
                        <tr>
                            <th>@lang('Descripción')</th>
                            <th style="text-align: right">@lang('Valor')</th>
                        </tr>
                    </thead>
                    <tbody style="font-weight: normal;">
                        @foreach($solicitud->PersonaSolicitante()->first()->GastoPatrimonio()->whereIn('descripcion',['CASA','VEHÍCULO','TERRENO','OTROS'])->get() as $gastos)
                            <tr>
                                <td>{{$gastos->descripcion}}</td>
                                <td style="text-align: right">${{number_format((float)$gastos->valor, 2, '.', '')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- EGRESOS SOLICITANTE -->
            <div class="card">
                <div class="card-header btn-link py-0" style="font-size:14px !important;  margin-top: -5px;  margin-bottom:-3px !important;">
                    Egresos o gastos
                </div>
            </div>
            <div class="card" style="margin-bottom: 0 !important;">
                <table class="table table-sm" id="solicitudes-table" style="font-size: 11px !important">
                    <thead>
                        <tr>
                            <th>@lang('Descripción')</th>
                            <th style="text-align: right">@lang('Gasto')</th>
                        </tr>
                    </thead>
                    <tbody style="font-weight: normal;">
                        @foreach($solicitud->PersonaSolicitante()->first()->GastoPatrimonio()->whereNotIn('descripcion',['CASA','VEHÍCULO','TERRENO','OTROS'])->get() as $gastos)
                            <tr>
                                <td>{{$gastos->descripcion}}</td>
                                <td style="text-align: right">${{number_format((float)$gastos->valor, 2, '.', '')}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td style="font-weight: bold">INGRESOS(SUELDO) - EGRESOS(SUMA)</td>
                            <td id="sum" class="{!!number_format((float)($solicitud->PersonaSolicitante()->first()->Actividad()->first()->sueldo_empresa - $solicitud->PersonaSolicitante()->first()->GastoPatrimonio()->whereNotIn('descripcion',['CASA','VEHÍCULO','TERRENO','OTROS'])->sum('valor')), 2, '.', '')>config('bcm.solicitud_tope')?'text-success':'text-danger'!!}" style="text-align: right; font-size:15px !important;">${{ number_format((float)($solicitud->PersonaSolicitante()->first()->Actividad()->first()->sueldo_empresa - $solicitud->PersonaSolicitante()->first()->GastoPatrimonio()->whereNotIn('descripcion',['CASA','VEHÍCULO','TERRENO','OTROS'])->sum('valor')), 2, '.', '')}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!--FIRMA-->
            <div style="text-align: center; width: 100%; margin-top: 10px; margin-bottom: 20px; font-size: 13px">
                ____________________________<br> Firma del titular ({{ $solicitud->PersonaSolicitante()->first()->Persona()->first()->identificacion }})
            </div>

            
            <!--AUTORIZACIÓN DÉBITO-->
            <div style="text-align: justify; width: 100%; font-size: 12px;">
                <div style="width: 100%;"><h6>AUTORIZACIÓN DE DEBITO AUTOMÁTICO</h6></div>
                <div style="display: inline-block; width: auto; margin-top: 10px;">Por la presente autorizo a ustedes debitar de mi cuenta: </div>
                <div style="display: inline-block; width: auto; margin-left:15px">Ahorro</div>
                <div style="display: inline-block; margin-right: 5px; margin-left: 5px; margin-top: -3px; border: 1px solid black; width: 15px; height: 15px"></div>
                <div style="display: inline-block; width: auto; margin-left:15px">Corriente</div>
                <div style="display: inline-block; margin-right: 5px; margin-left: 5px; margin-top: -3px; border: 1px solid black; width: 15px; height: 15px"></div>
                <div style=" width: auto;">
                    Nro. ................................ o inversión que mantuviera a mi favor en el Banco Comercial de Manabí S.A., los consumos realizados con la tarjeta Nro. .......................................................... Así como los consumos realizados por las tarjetas Adicionales Autorizadas.
                </div>
            </div>
            <div style="text-align: justify; width: 100%; margin-top: 10px; font-size: 12px;">
                <div style="display: inline-block; width: auto;">Pago mínimo</div>
                <div style="display: inline-block; margin-right: 5px; margin-left: 5px; margin-top: -3px; border: 1px solid black; width: 15px; height: 15px"></div>
                <div style="display: inline-block; width: auto; margin-left: 20px;">Pago total</div>
                <div style="display: inline-block; margin-right: 5px; margin-left: 5px; margin-top: -3px; border: 1px solid black; width: 15px; height: 15px"></div>
                <div style="display: inline-block; width: 60%;margin-left: 60px; padding-left: 130px">Firma: __________________________________</div>
            </div>

            <!--USO EXCLUSIVO BANCO-->
            <div style="text-align: justify; width: 100%; font-size: 12px;">
                <div style="width: 100%;"><h6>PARA USO EXCLUSIVO DEL BANCO COMERCIAL DE MANABÍ</h6></div>
                <div style="display: inline-block; width: auto; margin-top: 10px; font-weight: bold">Aprobada Tarjeta:</div>
                <div style="display: inline-block; width: auto;margin-left: 80px;">Nacional</div>
                <div style="display: inline-block; margin-right: 5px; margin-left: 5px; margin-top: -3px; border: 1px solid black; width: 15px; height: 15px"></div>
                <div style="display: inline-block; width: auto;margin-left: 80px;">Clásica</div>
                <div style="display: inline-block; margin-right: 5px; margin-left: 5px; margin-top: -3px; border: 1px solid black; width: 15px; height: 15px"></div>
                <div style="display: inline-block; width: auto;margin-left: 75px;">Oro</div>
                <div style="display: inline-block; margin-right: 5px; margin-left: 5px; margin-top: -3px; border: 1px solid black; width: 15px; height: 15px"></div>
            </div>
            <div style="text-align: justify; width: 100%; margin-top: 8px">
                <div style="display: inline-block; width: auto; font-weight: bold; font-size: 12px;">Cupo Autorizado:</div>
                <div style="display: inline-block; width: auto;margin-left: 15px;">............................................................................................................................</div>
            </div>
            <div style="text-align: justify; width: 100%; margin-top: 8px">
                <div style="display: inline-block; width: auto; font-weight: bold; font-size: 12px;">Valor en letras:</div>
                <div style="display: inline-block; width: auto;margin-left: 5px;">...................................................................................................</div>
                <div style="display: inline-block; width: auto; font-weight: bold;margin-left: 15px; font-size: 12px;">Fecha:</div>
                <div style="display: inline-block; width: auto;margin-left: 5px; font-size: 12px;">{{date('d/m/Y')}}</div>
            </div>
            <div style="text-align: justify; width: 100%; margin-top: 8px">
                <div style="display: inline-block; width: auto; font-weight: bold; font-size: 12px;">Aprobado por:</div>
                <div style="display: inline-block; width: auto;margin-left: 15px;">................................................................................................................................</div>
            </div>
            <div style="text-align: justify; width: 100%; margin-top: 8px">
                <div style="display: inline-block; width: auto; font-weight: bold; font-size: 12px;">Visto bueno del oficial:</div>
                <div style="display: inline-block; width: auto;margin-left: 5px;">...........................................................</div>
                <div style="display: inline-block; width: auto; margin-left: 8px; font-size: 12px;">Firma:</div>
                <div style="display: inline-block; width: auto;margin-left: 5px;">________________________</div>
            </div>

            <!--TABLA CUMPLIMIENTO-->
            <div style="text-align: justify; width: 100%; font-size: 12px;">
                <div style="width: 100%;"><h6>INFORMACIÓN PARA LAVADO DE ACTIVOS</h6></div>
                <table class="table table-bordered table-sm" id="solicitudes-table" style="font-size: 12px !important">
                    <thead>
                        <tr>
                            <th>Fecha de revisión</th>
                            <th>Cliente</th>
                            <th>Observados</th>
                            <th>Sindicados</th>
                            <th>PEPS</th>
                        </tr>
                    </thead>
                    <tbody style="font-weight: normal;">
                            <tr><td height="15"></td><td height="15"></td><td height="15"></td><td height="15"></td><td height="15"></td></tr>
                            <tr><td height="15"></td><td height="15"></td><td height="15"></td><td height="15"></td><td height="15"></td></tr>
                    </tbody>
                </table>
            </div>

            <!--ACEPTO TERMINOS Y CONDICIONES-->
            <div style="text-align: justify; width: 100%; margin-top: 0px">
                <div style="display: inline-block; margin-right: 5px; margin-top: -6px; border: 1px solid black; width: 15px; height: 15px"></div>
                <div style="display: inline-block; width: auto; font-size: 11px">Acepto que he llenado esta solicitud bajo mi propia voluntad, que autoricé la revision de mi buró crediticio y que he leído los términos y condiciones publicados en la página de las solicitudes en linea BCM</div>
            </div>


            

            <div style="position: fixed;left: 0;bottom: 10; text-align: right; width: 100%;font-size: 10px;">
                PAGINA <b>-2/2-</b>
            </div>
        <script>
            //window.print();
        </script>
    </main>
</div>

</body>

</html>
