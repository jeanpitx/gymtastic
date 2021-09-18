<div class="table-responsive">
    <table class="table table-striped" id="archives-table">
        <thead>
            <tr>
                <th>@lang('models/archives.fields.nombre')</th>
                <th>Archivo</th>
                <th>@lang('models/archives.fields.tipo_archivo')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($archives as $archive)
            <tr>
                <td>{{ $archive->nombre }}</td>
                <td><a href="{{ url($archive->url_archivo) }}" target="_blank">Visualizar</a> | <a class="copiar" href="#" data-url="{{ url($archive->url_archivo) }}">Copiar URL</a></td>
                <td>{{ strtoupper($archive->tipo_archivo) }}</td>
                <td>
                    {!! Form::open(['route' => ['archives.destroy', $archive->id_archivo], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('archives.show', [$archive->id_archivo]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('archives.edit', [$archive->id_archivo]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @if($archive->nombre!="Promocion Popup")
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
<script>
    $(".copiar").tooltip('hide');
    $(".copiar").on("click", function(e){
        var txtcopy=$(e.target).attr("data-url");
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
    $('.copiar').on('hide.bs.tooltip', function () {
        $(".copiar").tooltip('dispose');
    });
</script>