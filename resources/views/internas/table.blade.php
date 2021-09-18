<div class="table-responsive">
    <table class="table table-striped" id="internas-table">
        <thead>
            <tr>
                <th>@lang('models/internas.fields.titulo')</th>
                <th>Imagen</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($internas as $interna)
            <tr>
                <td>{!! $interna->titulo !!}</td>
                <td><img src="{{ $interna->url_imagen }}" class="d-block w-50 img-zoomable"></td>
                <td>
                    {!! Form::open(['route' => ['internas.destroy', $interna->id_interna], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('internas.show', [$interna->id_interna]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('internas.edit', [$interna->id_interna]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
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