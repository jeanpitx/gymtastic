<div class="form-group col-sm-12">
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
</div>


<div class="form-group col-sm-12">
    <h5>Información personal y de tarjeta de crédito</h5>
    <div  style="border-bottom: 1px solid green; width=100%"></div>
</div>


<!-- Nombre Tarjeta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_tarjeta', __('Nombre tarjeta').':') !!}
    {!! Form::text('nombre_tarjeta', null, ['class' => 'form-control toupper','required']) !!}
</div>

<!-- Tipo Tarjeta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_tarjeta', __('Tipo tarjeta').':') !!}
    {!! Form::select('tipo_tarjeta', ['1' => 'VISA NACIONAL', '2' =>
            'VISA CLASICA', '3' => 'VISA ORO'],null,['class'=>'form-control','placeholder' =>
            'Seleccione tipo tarjeta','required']) !!}
</div>

<!-- Estado Cuenta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_cuenta', __('Estado cuenta').':') !!}
    {!! Form::text('estado_cuenta', null, ['class' => 'form-control toupper','required']) !!}
</div>

<!-- PRIMER APELLIDO Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primer_apellido', __('Primer Apellido').':') !!}
    {!! Form::text('primer_apellido', $solicitud->PersonaSolicitante()->first()->Persona()->first()->primer_apellido, ['class' => 'form-control toupper','required']) !!}
</div>

<!-- SEGUNDO APELLIDO Field -->
<div class="form-group col-sm-6">
    {!! Form::label('segundo_apellido', __('Segundo Apellido').':') !!}
    {!! Form::text('segundo_apellido', $solicitud->PersonaSolicitante()->first()->Persona()->first()->segundo_apellido, ['class' => 'form-control toupper']) !!}
</div>

<!-- NOMBRES COMPLETOS Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres_completos', __('Nombres Completos').':') !!}
    {!! Form::text('nombres_completos', $solicitud->PersonaSolicitante()->first()->Persona()->first()->nombres, ['class' => 'form-control toupper','required']) !!}
</div>

<div class="form-group col-sm-12">
    <h5>Datos de dirección de contacto y domicilio</h5>
    <div  style="border-bottom: 1px solid green; width=100%"></div>
</div>

<!-- Tipo Vivienda Field -->
<div class="form-group col-md-6">
    {!! Form::label('vivienda', 'Tipo Vivienda') !!}<b class="text-danger"> *</b>
    {!! Form::select('vivienda', ['A' => 'Alquilada', 'P' =>
    'Prestada', 'PH' => 'Propia Hipotecada', 'PNH' => 'Propia no
    hipotecada', 'VF' => 'Vive con
    familiares'], $solicitud->PersonaSolicitante()->first()->Direccion()->first()->tipo_bien,['class'=>'form-control','placeholder' =>
    'Seleccione el tipo de vivienda','required']) !!}
    <span class="invalid-feedback">{{ $errors->first('correo') }}</span>
</div>

<!-- Ciudad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ciudad', __('Ciudad').':') !!}
    {!! Form::select('ciudad', $ciudad,$solicitud->PersonaSolicitante()->first()->Direccion()->first()->id_ciudad, ['class' => 'form-control','placeholder' => 'Seleccione su ciudad...','required']) !!}
</div>

<!-- Direccion principal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_principal', __('Dirección principal').':') !!}
    {!! Form::text('direccion_principal', $solicitud->PersonaSolicitante()->first()->Direccion()->first()->direccion_principal, ['class' => 'form-control toupper','required']) !!}
</div>

<!-- Direccion secundaria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_secundaria', __('Dirección secundaria').':') !!}
    {!! Form::text('direccion_secundaria', $solicitud->PersonaSolicitante()->first()->Direccion()->first()->direccion_secundaria, ['class' => 'form-control toupper','required']) !!}
</div>

<!-- Direccion referencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_referencia', __('Dirección referencia').':') !!}
    {!! Form::text('direccion_referencia', $solicitud->PersonaSolicitante()->first()->Direccion()->first()->referencia, ['class' => 'form-control toupper','required']) !!}
</div>

<!-- Coordenadas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_coordenada', __('Coordenadas').':') !!} <a target="_blanck" href="{{ "https://www.google.com/maps/search/?api=1&query=".trim ( str_replace(" ","",$solicitud->PersonaSolicitante()->first()->Direccion()->first()->coordenadas)) }}">Ver mapa</a>
    {!! Form::text('direccion_coordenada', $solicitud->PersonaSolicitante()->first()->Direccion()->first()->coordenadas, ['class' => 'form-control','required']) !!}
</div>

<!-- Antiguedad Field -->
<div class="form-group col-md-6">
    {!! Form::label('antiguedad_vivienda', 'Antiguedad Vivienda') !!}<b class="text-danger"> *</b>
    <div class="form-group row">
        <div class="col-sm-6">
            <div class="input-group margin-bottom-sm">
                <div class="input-group-prepend"><i class="input-group-text far fa-clock"></i></div>
                {!! Form::number('anios_vivienda', intval($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien /12), ['id'=>'anios_vivienda','min'=>'0','class' =>
                'form-control','placeholder' => 'Años','onkeypress' => 'soloNumeros(event);','required']) !!}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="input-group margin-bottom-sm">
                <div class="input-group-prepend"><i class="input-group-text far fa-clock"></i></div>
                {!! Form::number('meses_vivienda', intval($solicitud->PersonaSolicitante()->first()->Direccion()->first()->antiguedad_bien %12), ['id'=>'meses_vivienda','min'=>'0','class' =>
                'form-control','placeholder' => 'Meses','onkeypress' => 'soloNumeros(event);','required']) !!}
            </div>
        </div>
    </div>
</div>

<!-- Telefono Convencional Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono_convencional', __('Telefono convencional').':') !!}
    {!! Form::text('telefono_convencional', $solicitud->PersonaSolicitante()->first()->Contacto()->get()->where('tipo_contacto','CONVENCIONAL')->first()->contacto??null, ['class' => 'form-control','onkeypress' => 'soloNumeros(event);','maxlength'=>'10']) !!}
</div>

<!-- Telefono Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefono_celular', __('Telefono celular').':') !!}
    {!! Form::text('telefono_celular', $solicitud->PersonaSolicitante()->first()->Contacto()->get()->where('tipo_contacto','CELULAR')->first()->contacto??null, ['class' => 'form-control','onkeypress' => 'soloNumeros(event);','maxlength'=>'10','required']) !!}
</div>

<!-- Correo electrónico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo_electronico', __('Correo electrónico').':') !!}
    {!! Form::text('correo_electronico', $solicitud->PersonaSolicitante()->first()->Contacto()->get()->where('tipo_contacto','EMAIL')->first()->contacto??null, ['class' => 'form-control  tolower','required']) !!}
</div>

<div class="form-group col-sm-12">
    <h5>Datos de actividad de la persona</h5>
    <div  style="border-bottom: 1px solid green; width=100%"></div>
</div>

<!-- Empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('empresa', __('Empresa').':') !!}
    {!! Form::text('empresa', $solicitud->PersonaSolicitante()->first()->Actividad()->first()->nombre_empresa, ['class' => 'form-control toupper','required']) !!}
</div>

<!-- Cargo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cargo', __('Cargo').':') !!}
    {!! Form::text('cargo', $solicitud->PersonaSolicitante()->first()->Actividad()->first()->cargo, ['class' => 'form-control toupper','required']) !!}
</div>

<!-- Profesion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profesion', __('Profesion').':') !!}
    {!! Form::select('profesion', $profesion,$solicitud->PersonaSolicitante()->first()->id_profesion, ['class' => 'form-control','placeholder' => 'Seleccione su profesión...','required']) !!}
</div>

<!-- Ciudad empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ciudad_empresa', __('Ciudad empresa').':') !!}
    {!! Form::select('ciudad_empresa', $ciudad,$solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->id_ciudad, ['class' => 'form-control','placeholder' => 'Seleccione su ciudad...','required']) !!}
</div>

<!-- Direccion principal empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_principal_empresa', __('Direccion principal empresa').':') !!}
    {!! Form::text('direccion_principal_empresa', $solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->direccion_principal, ['class' => 'form-control toupper','required']) !!}
</div>

<!-- Direccion secundaria empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_secundaria_empresa', __('Direccion secundaria empresa').':') !!}
    {!! Form::text('direccion_secundaria_empresa', $solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->direccion_secundaria, ['class' => 'form-control toupper','required']) !!}
</div>

<!-- Direccion referencia empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_referencia_empresa', __('Direccion referencia empresa').':') !!}
    {!! Form::text('direccion_referencia_empresa', $solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->referencia, ['class' => 'form-control toupper','required']) !!}
</div>

<!-- Coordenadas empresa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion_coordenada_empresa', __('Coordenadas').':') !!} <a target="_blanck" href="{{ "https://www.google.com/maps/search/?api=1&query=".trim ( str_replace(" ","",$solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->coordenadas)) }}">Ver mapa</a>
    {!! Form::text('direccion_coordenada_empresa', $solicitud->PersonaSolicitante()->first()->Actividad()->first()->Direccion()->first()->coordenadas, ['class' => 'form-control','required']) !!}
</div>

@foreach($solicitud->PersonaSolicitante()->first()->Actividad()->first()->Contacto()->get() as $key=>$contacto)
    <!-- Contacto empresa Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('contacto_empresa[]', __('Contacto empresa')." ".($key +1).':') !!}
        <div class="input-group">
            {!! Form::text('id_contacto_empresa[]', $contacto->id_contacto, ['class' => 'form-control','style'=>'display:none']) !!}
            {!! Form::text('tipo_contacto_empresa[]', $contacto->tipo_contacto, ['class' => 'form-control','placeholder' => 'Contacto','onkeypress' => 'soloNumeros(event);','required','readonly']) !!}
            {!! Form::text('contacto_empresa[]', $contacto->contacto, ['class' => 'form-control','placeholder' => 'Contacto','onkeypress' => 'soloNumeros(event);','required']) !!}
            {!! Form::text('extension_empresa[]', $contacto->extension, ['class' => 'form-control','placeholder' => 'Extension','onkeypress' => 'soloNumeros(event);','style'=>($contacto->tipo_contacto=='CONVENCIONAL'?'':'display:none')]) !!}
        </div>
    </div>
@endforeach


<div class="form-group col-sm-12">
    <h5>Datos de referencia personal</h5>
    <div  style="border-bottom: 1px solid green; width=100%"></div>
</div>

@foreach($solicitud->PersonaSolicitante()->first()->ReferenciaPersonal()->get() as $key=>$ref_personal)
    {!! Form::text('id_referencia_personal[]', $ref_personal->id_referencia_personal, ['class' => 'form-control','style'=>'display:none']) !!}
    <div class="form-group col-sm-12">
        <h5>Referencia personal  {!!($key +1)!!}</h5>
    </div>

    <!-- Nombre completo referencia Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nombre_completo[]', __('Nombre completo').':') !!}
        {!! Form::text('nombre_completo[]', $ref_personal->nombre_completo, ['class' => 'form-control toupper','required']) !!}
    </div>

    <!-- Parentesco referencia Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('parentesco[]', __('Parentesco').':') !!}
        {!! Form::text('parentesco[]', $ref_personal->parentesco, ['class' => 'form-control toupper','required']) !!}
    </div>

    <!-- Ciudad referencia Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('ciudad_referencia_personal[]', __('Ciudad referencia').':') !!}
        {!! Form::select('ciudad_referencia_personal[]', $ciudad,$ref_personal->id_ciudad, ['class' => 'form-control','placeholder' => 'Seleccione su ciudad...','required']) !!}
    </div>

    <!-- Direccion referencia Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('direccion_referencia_personal[]', __('Direccion referencia').':') !!}
        {!! Form::text('direccion_referencia_personal[]', $ref_personal->direccion, ['class' => 'form-control toupper','required']) !!}
    </div>

    <!-- Direccion referencia Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('telefono_referencia[]', __('Direccion referencia').':') !!}
        <div class="input-group">
            {!! Form::select('tipo_telefono_referencia[]', ['CELULAR' => 'Celular', 'CONVENCIONAL' =>
                'Convencional'],$ref_personal->tipo_telefono,['class'=>'form-control','placeholder' =>
                'Seleccione tipo teléfono','required']) !!}
            {!! Form::text('telefono_referencia[]', $ref_personal->telefono, ['class' => 'form-control','placeholder' => 'Contacto','onkeypress' => 'soloNumeros(event);','required']) !!}
        </div>
    </div>
@endforeach



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
</div>
