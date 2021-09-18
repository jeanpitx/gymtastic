<div class="table-responsive">
    <table class="table table-striped" id="catalogos-table">
        <thead>
            <tr>
                <th>@lang('models/catalogos.fields.id_tipo_catalogo')</th>
                <th>@lang('models/catalogos.fields.descripcion')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($catalogos as $catalogo)
            <tr>
                <td>{{ $catalogo->TipoCatalogo->descripcion }}</td>
                <td>{{ $catalogo->descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['catalogos.destroy', $catalogo->id_catalogo], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('catalogos.show', [$catalogo->id_catalogo]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('catalogos.edit', [$catalogo->id_catalogo]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>