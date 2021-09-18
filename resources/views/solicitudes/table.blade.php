<div class="table-responsive">
    <table class="table table-striped" id="solicitudes-table">
        <thead>
            <tr>
                <th style="min-width: 98px">@lang('Fecha')</th>
                <th>@lang('Identificaión')</th>
                <th>@lang('Nombre Tarjeta')</th>
                <th>@lang('Tarjeta')</th>
                <th>@lang('Estado Cuenta')</th>
                <th>@lang('Estado')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($solicitudes as $solicitud)
            <tr>
                <td style="min-width: 98px">{{  date("d-m-Y", strtotime($solicitud->created_at)) }}</td>
                <td>{{ $solicitud->PersonaSolicitante()->first()->Persona()->first()->identificacion }}</td>
                <td>{{ $solicitud->nombre_tarjeta }}</td>
                <td>{{ ($solicitud->tipo_tarjeta==1?"VISA NACIONAL":($solicitud->tipo_tarjeta==2?"VISA CLÁSICA":"VISA ORO")) }}</td>
                <td>{{ $solicitud->estado_cuenta }}</td>
                <td class="{!!$solicitud->estado=='APROBADA'?'text-success':($solicitud->estado=='NUEVA' || $solicitud->estado=='RENOVADA'?'':'text-danger')!!}">{{ $solicitud->estado.($solicitud->estado=='RENOVADA'?date("d-m-Y", strtotime($solicitud->updated_at)):'') }}</td>
                <td class="">
                    {!! Form::open(['route' => ['solicitudes.destroy', $solicitud->id_solicitud], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('solicitudes.show', [$solicitud->id_solicitud]) }}" class='btn btn-ghost-success' title="Ver Solicitud"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('solicitudes.edit', [$solicitud->id_solicitud]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @if(Auth::user()->hasAnyRole(['root']))
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                        @endif
                        
                        <div  class="btn-group dropleft" role="group">
                            <button class="btn btn-ghost-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-file-pdf fa-lg"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('SolicitudPdf',['id'=>$solicitud->id_solicitud,'type'=>'mec'])}}" target="_blank">Mecanizado</a>
                                <a class="dropdown-item" href="{{route('SolicitudPdf',['id'=>$solicitud->id_solicitud,'type'=>'cer'])}}" target="_blank">Certificado Laboral</a>
                                <a class="dropdown-item" href="{{route('SolicitudPdf',['id'=>$solicitud->id_solicitud,'type'=>'rol'])}}" target="_blank">Rol de pago</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="my_pdf_viewer" style="display: none">
        <canvas id="pdf_renderer"></canvas>
    </div>
</div>