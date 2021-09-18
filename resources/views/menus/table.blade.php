<div class="table-responsive">
    <table class="table table-striped" id="menus-table">
        <thead>
            <tr>
                <th>@lang('models/menus.fields.descripcion')</th>
                <th>@lang('models/menus.fields.id_enlace')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
            <tr>
                <td>{{ $menu->descripcion }}</td>
                <td>{{ $menu->Enlace()->first()->referencia??"Ninguno" }}</td>
                <td>
                    {!! Form::open(['route' => ['menus.destroy', $menu->id_menu], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('menus.show', [$menu->id_menu]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('menus.edit', [$menu->id_menu]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>