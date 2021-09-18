<div class="table-responsive pt-0">
    <table class="table table-striped" id="tarjetas-table">
        <thead>
            <tr>
            <th>@lang('models/tarjetas.fields.titulo')</th>
            <th>@lang('models/tarjetas.fields.descripcion')</th>
            <th style="min-width: 210px">Tipo tarjeta </th>
            <th>Imagen</th>
            <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tarjetas as $tarjeta)
            <tr>
            <td>{!! $tarjeta->titulo !!}</td>
            <td>{{ $tarjeta->descripcion }}</td>
            <td>{{ $tarjeta->tipo_tarjeta }}</td>
            <td><img src="{!! $tarjeta->url_imagen !!}" class="d-block w-50" style="min-width: 120px"></td>
                <td>
                    {!! Form::open(['route' => ['tarjetas.destroy', $tarjeta->id_tarjeta], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('tarjetas.show', [$tarjeta->id_tarjeta]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('tarjetas.edit', [$tarjeta->id_tarjeta]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @if(empty($tarjeta) || $tarjeta->titulo!=="SOLICITUDES BCM" || Auth::user()->hasAnyRole(['root']))
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>