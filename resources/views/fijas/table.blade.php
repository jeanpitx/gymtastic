<div class="table-responsive">
    <table class="table table-striped" id="fijas-table">
        <thead>
            <tr>
                <th>@lang('models/fijas.fields.tipo_parametro')</th>
                <th>@lang('models/fijas.fields.descripcion')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($fijas as $fija)
            <tr>
                <td>{{ $fija->tipo_parametro }}</td>
                <td>{{ $fija->descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['fijas.destroy', $fija->id_fixed_option], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('fijas.show', [$fija->id_fixed_option]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('fijas.edit', [$fija->id_fixed_option]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @if(Auth::user()->hasAnyRole(['root']))
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