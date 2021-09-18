<style>
    #accordion label{
        font-weight: bold;
    }
</style>

<div class="card" style="margin-bottom: 5px">
    <div class="card-body row" style="margin-top: -8px;margin-bottom: -8px">
        <!-- ESTADO SOLICITUD -->
        <div class="col-auto" style="padding-top:3px"><b>Estado Solicitud: </b>{{ $solicitud->estado }}</div>
        <div class="col-auto" style="margin-left: -15px">
            <div class="dropdown">
                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Acciones
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('printview',$solicitud->id_solicitud)}}" target="_blank">Generar PDF</a>
                    @if(!($solicitud->estado=="RECHAZADA" || $solicitud->estado=="RECHAZADA-CUPO"))
                        <a class="dropdown-item" href="{{route('changestate',['id'=>$solicitud->id_solicitud,'type'=>'APROBADA'])}}">Aprobar</a>
                        <a class="dropdown-item" href="{{route('changestate',['id'=>$solicitud->id_solicitud,'type'=>'RECHAZADA'])}}">Rechazar</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-auto" style="margin-left: -15px">
            <div class="dropdown">
                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Documentos
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('SolicitudPdf',['id'=>$solicitud->id_solicitud,'type'=>'mec'])}}" target="_blank">Mecanizado</a>
                    <a class="dropdown-item" href="{{route('SolicitudPdf',['id'=>$solicitud->id_solicitud,'type'=>'cer'])}}" target="_blank">Certificado Laboral</a>
                    <a class="dropdown-item" href="{{route('SolicitudPdf',['id'=>$solicitud->id_solicitud,'type'=>'rol'])}}" target="_blank">Rol de pago</a>
                </div>
            </div>
        </div>
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
  
        <div id="collapseTarjeta" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body row">
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
                    Datos Personales
                </button>
                <i id="ico_mecanizado" class="fas fa-fingerprint" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
            </h5>
        </div>
        <div id="collapseSolicitante" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
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
                        <p>{{ $solicitud->PersonaSolicitante()->first()->Persona()->first()->nacionalidad }}</p>
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
                        Datos del Conyugue
                    </button>
                    <i id="ico_mecanizado" class="fas fa-church" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
                </h5>
            </div>
            <div id="collapseConyugue" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        <!-- Id_Persona conyugue Field -->
                        <div class="form-group col-auto">
                            {!! Form::label('Identificación', 'Identificación:') !!}
                            <p>{{ $solicitud->PersonaSolicitante()->first()->Conyugue()->first()->identificacion }}</p>
                        </div>
                        <!-- apellido_paterno conyugue Field -->
                        <div class="form-group col-auto">
                            {!! Form::label('apellido_paterno', 'Apellido Paterno:') !!}
                            <p>{{ $solicitud->PersonaSolicitante()->first()->Conyugue()->first()->primer_apellido }}</p>
                        </div>
                        <!-- apellido_paterno conyugue Field -->
                        <div class="form-group col-auto">
                            {!! Form::label('apellido_paterno', 'Apellido Materno:') !!}
                            <p>{{ $solicitud->PersonaSolicitante()->first()->Conyugue()->first()->segundo_apellido }}</p>
                        </div>
                        <!-- nombres conyugue Field -->
                        <div class="form-group col-auto">
                            {!! Form::label('nombres', 'Nombres:') !!}
                            <p>{{ $solicitud->PersonaSolicitante()->first()->Conyugue()->first()->nombres }}</p>
                        </div>
                        <!-- fecha_nacimiento conyugue Field -->
                        <div class="form-group col-auto">
                            {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento:') !!}
                            <p>{{ date("d-m-Y", strtotime($solicitud->PersonaSolicitante()->first()->Conyugue()->first()->fecha_nacimiento)) }}</p>
                        </div>
                        <!-- sexo conyugue Field -->
                        <div class="form-group col-auto">
                            {!! Form::label('sexo', 'Sexo:') !!}
                            <p>{{ $solicitud->PersonaSolicitante()->first()->Conyugue()->first()->sexo=="M"?"MASCULINO":"FEMENINO" }}</p>
                        </div>
                        <!-- nacionalidad conyugue Field -->
                        <div class="form-group col-auto">
                            {!! Form::label('nacionalidad', 'Nacionalidad:') !!}
                            <p>{{ $solicitud->PersonaSolicitante()->first()->Conyugue()->first()->nacionalidad }}</p>
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
        <div id="collapseDireccion" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
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
                        <p>{{ $ciudad[$solicitud->PersonaSolicitante()->first()->Direccion()->first()->id_ciudad] }}</p>
                    </div>
                    <!-- direccion principal y secundaria Field -->
                    <div class="form-group col-auto">
                        {!! Form::label('direccion', 'Dirección principal y secundaria:') !!}
                        <p>{{ $solicitud->PersonaSolicitante()->first()->Direccion()->first()->direccion_principal.", ".$solicitud->PersonaSolicitante()->first()->Direccion()->first()->direccion_secundaria }}</p>
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
                    <!-- antiguedad_bien Field -->
                    <div class="form-group col-auto">
                        {!! Form::label('antiguedad_bien', 'Antiguedad:') !!}
                        <p>{{ intval($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien/12) }} 
                            {{ intval($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien/12)==1?" Año":" Años" }}
                            {{ ($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien%12)  }}
                            {{ intval($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien%12)==1?" Mes":" Meses" }}
                        </p>
                    </div>

                    <!-- direccion referencia Field -->
                    <div class="row col-12">
                        <div class="form-group col-auto">
                            {!! Form::label('referencia', 'Dirección referencia:') !!}
                            <p>{{ $solicitud->PersonaSolicitante()->first()->Direccion()->first()->referencia }}</p>
                        </div>
                        <div class="form-group col-auto">
                            {!! Form::label('coordenadas', 'Coordenadas:') !!}
                            <p><a target="_blank" href="{{ "https://www.google.com/maps/search/?api=1&query=".trim ( str_replace(" ","",$solicitud->PersonaSolicitante()->first()->Direccion()->first()->coordenadas)) }}">Ver ubicación</a></p>
                        </div>
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
                    Actividad Económica
                </button>
                <i id="ico_mecanizado" class="fas fa-user-tie" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
            </h5>
        </div>
        <div id="collapseActividad" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
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

                    <!-- direcciones empresa Field -->
                    <div class="row col-12">
                        <div class="form-group col-auto">
                            {!! Form::label('referencia', 'Dirección principal y secundaria:') !!}
                            <p>{{$ciudad[$solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->id_ciudad]." - ".$solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->direccion_principal.", ".$solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->direccion_secundaria }}</p>
                        </div>
                        <div class="form-group col-auto">
                            {!! Form::label('referencia', 'Dirección referencia:') !!}
                            <p>{{ $solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->referencia }}</p>
                        </div>
                        <div class="form-group col-auto">
                            {!! Form::label('coordenadas', 'Coordenadas:') !!}
                            <p><a target="_blank" href="{{ "https://www.google.com/maps/search/?api=1&query=".trim ( str_replace(" ","",$solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->coordenadas)) }}">Ver ubicación</a></p>
                        </div>
                    </div>



                    <!-- contacto empresa Field -->
                    <div class="form-group col-12">
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
                    Referencias Personales
                </button>
                <i id="ico_mecanizado" class="fas fa-user-friends" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
            </h5>
        </div>
        <div id="collapseReferencia" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
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
                                    <th>@lang('Contacto')</th>
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

    <!-- PATRIMONIOS E INVERSIONES SOLICITANTE -->
    <div class="card" style="margin-bottom: 0 !important;">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseActividad" aria-expanded="false" aria-controls="collapseTwo">
                    Patrimonios e inversiones
                </button>
                <i id="ico_mecanizado" class="fas fa-university" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
            </h5>
        </div>
        <div id="collapseActividad" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <div class="row">
                    <!-- direccion_empresa Field -->
                    <div class="form-group col">
                        <table class="table table-striped table-sm mt-0" id="solicitudes-table">
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
                </div>
            </div>
        </div>
    </div>

    <!-- EGRESOS SOLICITANTE -->
    <div class="card" style="margin-bottom: 0 !important;">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseActividad" aria-expanded="false" aria-controls="collapseTwo">
                    Egresos o gastos
                </button>
                <i id="ico_mecanizado" class="fa fa-dollar-sign" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
            </h5>
        </div>
        <div id="collapseActividad" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
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
                                @foreach($solicitud->PersonaSolicitante()->first()->GastoPatrimonio()->whereNotIn('descripcion',['CASA','VEHÍCULO','TERRENO','OTROS'])->get() as $gastos)
                                    <tr>
                                        <td>{{$gastos->descripcion}}</td>
                                        <td style="text-align: right">${{number_format((float)$gastos->valor, 2, '.', '')}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td style="font-weight: bold">INGRESOS(SUELDO) - EGRESOS(SUMA)</td>
                                    <td id="sum" style="text-align: right; font-size:20px;">${{ number_format((float)($solicitud->PersonaSolicitante()->first()->Actividad()->first()->sueldo_empresa - $solicitud->PersonaSolicitante()->first()->GastoPatrimonio()->whereNotIn('descripcion',['CASA','VEHÍCULO','TERRENO','OTROS'])->sum('valor')), 2, '.', '')}}</td>
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
    $('#accordion .collapse').removeAttr("data-parent").collapse('show');

    if($('#sum').html().replace("$","")>"{!!config('bcm.solicitud_tope')!!}")
        $('#sum').addClass("text-success");
    else
        $('#sum').addClass("text-danger");
</script>