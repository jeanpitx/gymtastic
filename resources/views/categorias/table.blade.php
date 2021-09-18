<div class="table-responsive">
    <table class="table table-striped" id="categorias-table">
        <thead>
            <tr>
                <th>@lang('models/categorias.fields.titulo')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->titulo }}</td>
                <td>
                    {!! Form::open(['route' => ['categorias.destroy', $categoria->id_category], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('categorias.show', [$categoria->id_category]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('categorias.edit', [$categoria->id_category]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
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