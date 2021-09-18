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
    <link rel="shortcut icon" type="image/x-icon" href="{{url('img/icon-96x96.png')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    <title>misAnalisisOnline - Validator</title>


    <!-- Bootstrap CSS 4.0.1-->
    {!! Html::style('libs/bootstrap4/css/bootstrap.min.css') !!}
    <!-- fontawesome-->
    {!! Html::style('libs/fontawesome5/css/all.css') !!}
    <!-- Jean Meza -->
    {!! Html::style('css/cardselector.css') !!}
    
    <!-- select 2-->
    {!! Html::style('libs/select2/css/select2.min.css') !!}

    <!-- Bootstrap y JQUERY PARA COMPROBAR CEDULA  -->
    {!! Html::script('js/jquery.min.js') !!}
    {!! Html::script('libs/bootstrap4/js/popper.min.js') !!}
    {!! Html::script('libs/bootstrap4/js/bootstrap.min.js') !!}
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
        .format1{
            background-color:rgba(203, 209, 212, 0.72) !important;
            font-family: 'Courier New';
            font-weight: bold !important;
            font-size: 30px !important;
            color: rgb(56, 56, 56) !important;
            padding-bottom: 0px!important;
            padding-top: 0px!important;
            max-height: 40px;
        }
    </style>
</head>
<body style="background: #fff">
    <div id="app">
        <main class="pt-3">

            @if(!empty($error))
                <div class="container"> <!--p4-4 da un espacio arriba del contenido-->
                    <div class="row d-flex justify-content-center">
                        <div class="px-5">
                            <!-- AQUI VA EL CONTENIDO DE LA PAGINA -->
                            <div class="card" style="max-width:360px; background-color: pink; border: 2px solid red; border-radius: 20px 50px;">
                                <div class="card-body text-center px-4">
                                    <div class="w-100 d-flex justify-content-center pb-4">
                                        <img src="{{url('img/error.png')}}" class="img-fluid">
                                    </div>
                                    
                                    <h4 class="card-title pt-2" style="font-family: 'Segoe UI';font-size:21px">
                                        Los datos ingresados son incorrectos, no existen registros coincidentes.
                                    </h4>
                                </div>
                            </div>

                            <div class="w-100 d-flex justify-content-center pb-4">
                                @if($error=="error2")
				<!-- https://www2.misanalisis.online:8143/validator/hep -->
                                <a href="{{route('jota')}}" class="mt-3 btn btn-danger" style="border-color:transparent; background-color: hsl(3, 100%, 61%);font-family: Arial, Helvetica, sans-serif;font-weight: bold; font-size:15px;">
                                    Intentar nuevamente
                                </a>
                                @else
                                <a href="{{route('jota')}}" class="mt-3 btn btn-danger" style="border-color:transparent; background-color: hsl(3, 100%, 61%);font-family: Arial, Helvetica, sans-serif;font-weight: bold; font-size:15px;">
                                    Intentar nuevamente
                                </a>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            @elseif(!empty($success))
                <div class="container"> <!--p4-4 da un espacio arriba del contenido-->
                    <div class="row d-flex justify-content-center">
                        <div class="px-5">
                            <!-- AQUI VA EL CONTENIDO DE LA PAGINA -->
                            <div class="card" style="max-width:360px; background-color: #ddffda; border: 2px solid green; border-radius: 50px 20px;">
                                <div class="card-body text-center py-4 px-4">
                                    <div class="w-100 d-flex justify-content-center pb-4 pt-3">
                                        <img src="{{url('img/success.png')}}" class="img-fluid">
                                    </div>
                                    
                                    <div class="mx-2">
                                        <h4 class="card-title pt-2" style="font-family: 'Segoe UI';font-size:25px">
                                            Los datos impresos deben coincidir con:
                                        </h4>
                                    
                                        <div class="form-group" style="text-align: left">
                                            <label class="mb-0" style="font-weight: bold; font-size:14px; color:rgba(27, 43, 65, 0.72);">
                                                Paciente
                                            </label>
                                            {!! Form::text('id', $success["name"], ['class' => 'form-control toupper','readonly','style'=>'border: 1px dashed rgb(170, 170, 170); background-color:transparent; border-radius:3px; min-width:100%; font-weight: bold; font-size:14px; color:rgba(27, 43, 65, 0.72);']) !!}
                                        </div>
                                        
                                        <div class="form-group" style="text-align: left">
                                            <label class="mb-0" style="font-weight: bold; font-size:14px; color:rgba(27, 43, 65, 0.72);">
                                                Fecha
                                            </label>
                                            {!! Form::text('id', $success["fecha"], ['class' => 'form-control','readonly','style'=>'border: 1px dashed rgb(170, 170, 170); background-color:transparent; border-radius:3px; min-width:100%; font-weight: bold; font-size:14px; color:rgba(27, 43, 65, 0.72);']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="w-100 d-flex justify-content-center pb-4">
                                <a href="{{route('jota')}}" class="mt-3 btn btn-danger" style="border-color:transparent; background-color: hsl(145, 80%, 42%);font-family: Arial, Helvetica, sans-serif;font-weight: bold; font-size:15px;">
                                    Realizar otra validación
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="container"> <!--p4-4 da un espacio arriba del contenido-->
                    <div class="row d-flex justify-content-center">
                        <div class="px-5">
                            <!-- AQUI VA EL CONTENIDO DE LA PAGINA -->
                            <div class="card" style="max-width:360px;background: rgba(26, 57, 96, 0.1); border-color:transparent;border-radius:15px">
                                <div class="card-body text-center py-5 px-5">
                                    <div class="w-100 d-flex justify-content-center pb-4">
                                        <img src="{{url('img/logosp.jpg')}}" class="img-fluid">
                                    </div>
                                    
                                    <h4 class="card-title pt-2" style="font-family: 'Segoe UI';font-size:18px">
                                        Por favor ingrese los siguientes datos:
                                    </h4>

                                    {!! Form::open(['route' => 'posthep','style'=>'margin-top:20px']) !!}
                                        <div class="form-group" style="text-align: left">
                                            <label class="mb-0" style="font-weight: bold; font-size:14px; color:rgba(27, 43, 65, 0.72);">
                                                Id
                                            </label>
                                            {!! Form::text('id', null, ['class' => 'form-control toupper format1','autocomplete'=>'off','required']) !!}
                                        </div>
                                        <div class="form-group" style="text-align: left">
                                            <label class="mb-0" style="font-weight: bold; font-size:14px; color:rgba(27, 43, 65, 0.72);">
                                                Factor
                                            </label>
                                            {!! Form::text('factor', null, ['class' => 'form-control toupper format1','autocomplete'=>'off','required']) !!}
                                        </div>
                                        <button type="submit" class="mt-2 btn btn-primary" style="font-family: Arial, Helvetica, sans-serif;font-weight: bold; font-size:15px;">
                                            Verificar impresión
                                        </button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </main>
    </div>

    <!-- Bootstrap y JQUERY AL INICIO  -->
    <!-- select2 -->
    {!! Html::script('libs/select2/js/select2.min.js') !!}

    <!-- Jean Meza -->
    {!! Html::script('js/validaciones.js') !!}
    {!! Html::script('js/principal.js') !!}
</body>

</html>

