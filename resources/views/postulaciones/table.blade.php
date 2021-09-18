<div class="table-responsive">
    <table class="table table-striped" id="postulaciones-table">
        <thead>
            <tr>
                <th>@lang('models/postulaciones.fields.id_persona')</th>
                <th>Nombres</th>
                <th>@lang('models/postulaciones.fields.telefono')</th>
                <th>@lang('models/postulaciones.fields.direccion')</th>
                <th>@lang('models/postulaciones.fields.id_ciudad')</th>
                <th>@lang('models/postulaciones.fields.expectativas')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($postulaciones as $postulacion)
            <tr>
                <td>{{ $postulacion->Persona()->first()->identificacion }}</td>
            <td>{{ $postulacion->Persona()->first()->primer_apellido." ".$postulacion->Persona()->first()->segundo_apellido." ".$postulacion->Persona()->first()->nombres }}</td>
            <td>{{ $postulacion->telefono }}</td>
            <td>{{ $postulacion->direccion }}</td>
            <td>{{ $ciudad[$postulacion->id_ciudad] }}</td>
            <td>{!! (strlen($postulacion->expectativas)>30?substr($postulacion->expectativas,0,30).'... <a href="'.route('postulaciones.show', [$postulacion->id_postulacion]).'">ver mas</a>':$postulacion->expectativas) !!}</td>
                <td>
                    {!! Form::open(['route' => ['postulaciones.destroy', $postulacion->id_postulacion], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('postulaciones.show', [$postulacion->id_postulacion]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @if(Auth::user()->hasAnyRole(['root']))
                            <a href="{{ route('postulaciones.edit', [$postulacion->id_postulacion]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                        @endif
                        <div  class="btn-group dropleft" role="group">
                            <button class="btn btn-ghost-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-file-pdf fa-lg"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('PostulacionPdf',['id'=>$postulacion->id_postulacion])}}" target="_blank">Hoja de vida</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>