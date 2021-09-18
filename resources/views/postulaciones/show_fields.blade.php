<style>
    #accordion label{
        font-weight: bold;
    }
</style>

<!-- CABECERA SOLICITUD -->
<div class="card" style="margin-bottom: 5px">
    <div class="card-body row" style="margin-top: -8px;margin-bottom: -8px">    
        <div class="col-auto" style="padding-top:3px"><b>Identificación: </b> {{ $postulacion->Persona()->first()->identificacion }}</div>
        <div class="col-auto" style="padding-top:3px"><b>Nombres: </b> {{ $postulacion->Persona()->first()->primer_apellido." ".$postulacion->Persona()->first()->segundo_apellido." ".$postulacion->Persona()->first()->nombres }}</div>
        <div class="col-auto" style="margin-left: -15px">
            <div class="dropdown">
                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Documentos
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('PostulacionPdf',['id'=>$postulacion->id_postulacion])}}" target="_blank">Hoja de vida</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="accordion"  expanded="false">
    <!-- DIRECCIÓN DE LA PERSONA -->
    <div class="card" style="margin-bottom: 0 !important;">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseDireccion" aria-expanded="false" aria-controls="collapseTwo">
                    Datos Postulación
                </button>
                <i id="ico_mecanizado" class="fas fa-map-signs" style="color: #1e7e34;float: right; font-size:15px; margin-top:1%"></i>
            </h5>
        </div>
        <div id="collapseDireccion" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <div class="row">
                    <!-- Correo Electronico Field -->
                    <div class="form-group col-auto">
                        {!! Form::label('correo_electronico', __('models/postulaciones.fields.correo_electronico').':') !!}
                        <p>{{ $postulacion->correo_electronico }}</p>
                    </div>

                    <!-- Telefono Field -->
                    <div class="form-group col-auto">
                        {!! Form::label('telefono', __('models/postulaciones.fields.telefono').':') !!}
                        <p>{{ $postulacion->telefono }}</p>
                    </div>
                    
                    <!-- ciudad Field -->
                    <div class="form-group col-auto">
                        {!! Form::label('direccion', 'Ciudad:') !!}
                        <p>{{ $ciudad[$postulacion->id_ciudad] }}</p>
                    </div>

                    <!-- Direccion Field -->
                    <div class="form-group col-auto">
                        {!! Form::label('direccion', __('models/postulaciones.fields.direccion').':') !!}
                        <p>{{ $postulacion->direccion }}</p>
                    </div>

                    <!-- Expectativas Field -->
                    <div class="form-group col-12">
                        {!! Form::label('expectativas', __('models/postulaciones.fields.expectativas').':') !!}
                        <p>{{ $postulacion->expectativas }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $('#accordion .collapse').removeAttr("data-parent").collapse('show');
</script>