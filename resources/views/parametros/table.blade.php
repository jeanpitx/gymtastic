<div class="table-responsive">
    <table class="table table-striped" id="parametros-table">
        <thead>
            <tr>
                <th>@lang('models/parametros.fields.tipo')</th>
                <th>@lang('models/parametros.fields.parametro')</th>
                <th>@lang('models/parametros.fields.detalle')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($parametros as $parametro)
            <tr>
                <td>{{ $parametro->tipo }}</td>
                <td>{{ $parametro->parametro }}</td>
                <td>{{ $parametro->detalle }}</td>
                <td>
                    {!! Form::open(['route' => ['parametros.destroy', $parametro->id_parametro], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('parametros.show', [$parametro->id_parametro]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('parametros.edit', [$parametro->id_parametro]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>