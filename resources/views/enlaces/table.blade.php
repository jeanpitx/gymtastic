<div class="table-responsive">
    <table class="table table-striped" id="enlaces-table">
        <thead>
            <tr>
                <th>@lang('models/enlaces.fields.referencia')</th>
                <th>@lang('models/enlaces.fields.url')</th>
                <th>@lang('models/enlaces.fields.metodo')</th>
                <th>@lang('models/enlaces.fields.estado')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($enlaces as $enlace)
            <tr>
                <td>{!! $enlace->referencia !!}</td>
                <td><a href="{{ url($enlace->url) }}" target="{{$enlace->url=="#"?"_self":"_blank"}}">{{ url($enlace->url) }}</a></td>
                <td>{{ $enlace->metodo=="_blank"?"NUEVA VENTANA":"VENTANA ACTUAL" }}</td>
                <td>{{ $enlace->estado=="A"?"ACTIVADO":"DESACTIVADO" }}</td>
                <td>
                    {!! Form::open(['route' => ['enlaces.destroy', $enlace->id_enlace], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('enlaces.show', [$enlace->id_enlace]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="#" class="btn btn-ghost-info copiar" title="Copiar enlace" data-toggle="tooltip" data-placement="top"><i class="fas fa-copy"></i></a>
                        <a href="{{ route('enlaces.edit', [$enlace->id_enlace]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @if($enlace->privilegios == null || Auth::user()->hasAnyRole([$enlace->privilegios]))
                            @if(Auth::user()->hasAnyRole(['root']))
                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                            @endif
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>
    $(".copiar").on("click", function(e){
        var txtcopy=$(e.target).closest("tr").find("td").eq(1).text().trim();
        var tempElement = $("<input>");
        $(e.target).parent().append(tempElement);
        tempElement.val(txtcopy).select();
        document.execCommand("copy");
        tempElement.remove();
        $(e.target).attr('title',"Copiado!");
        $(e.target).tooltip('show');
        $(e.target).attr('title',"Copiar enlace");
        e.preventDefault();
        return;
    });
</script>