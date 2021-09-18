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
    {!! Html::style('libs/bootstrap4/css/bootstrap.min.css') !!}
    <!-- Bootstrap 4.1.1 -->
    <style type="text/css" media="all">
        .btn-link{
            color: #20a8d8 !important;
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
        <div style="text-align: center">
            {{ Html::image('http://localhost/img/logov.png', 'BCM', ['class' => 'img-fluid', 'width' => 170 , 'height' => 60]) }}
            <h5>Reporte de Solicitud de tarjetas de crédito</h5>
        </div>
        <div id="accordion"  expanded="false">
            <!-- DATOS DE LA TARJETA DE CRÉDITO -->
            <div class="card" style="margin-bottom: 0 !important;">
                <table class="table table-sm" id="solicitudes-table" style="font-size: 14px !important">
                    <thead>
                        <tr>
                            <th>@lang('Fecha')</th>
                            <th>@lang('Identificaión')</th>
                            <th>@lang('Nombre Tarjeta')</th>
                            <th>@lang('Tipo tarjeta')</th>
                            <th>@lang('Estado Cuenta')</th>
                            <th>@lang('Estado')</th>
                        </tr>
                    </thead>
                    <tbody style="font-weight: normal;">
                        @foreach($solicitudes as $solicitud)
                            <tr>
                                <td>{{  date("d-m-Y", strtotime($solicitud->created_at)) }}</td>
                                <td>{{ $solicitud->PersonaSolicitante()->first()->Persona()->first()->identificacion }}</td>
                                <td>{{ $solicitud->nombre_tarjeta }}</td>
                                <td>{{ ($solicitud->tipo_tarjeta==1?"VISA NACIONAL":($solicitud->tipo_tarjeta==2?"VISA CLÁSICA":"VISA ORO")) }}</td>
                                <td>{{ $solicitud->estado_cuenta }}</td>
                                <td>{{ $solicitud->estado }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </main>
</div>

</body>

</html>
