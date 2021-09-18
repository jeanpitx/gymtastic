<div class="table-responsive">
    <table class="table table-striped" id="menuPnivels-table">
        <thead>
            <tr>
                <th>@lang('models/menuPnivels.fields.descripcion')</th>
        <th>@lang('models/menuPnivels.fields.id_menu')</th>
        <th>@lang('models/menuPnivels.fields.id_enlace')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($menuPnivels as $menuPnivel)
            <tr>
                <td>{{ $menuPnivel->descripcion }}</td>
            <td>{{ $menuPnivel->Menu()->first()->descripcion }}</td>
            <td>{{ $menuPnivel->Enlace()->first()->referencia??"Ninguno" }}</td>
                <td>
                    {!! Form::open(['route' => ['menuPnivels.destroy', $menuPnivel->id_menu_pnivel], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('menuPnivels.show', [$menuPnivel->id_menu_pnivel]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('menuPnivels.edit', [$menuPnivel->id_menu_pnivel]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>