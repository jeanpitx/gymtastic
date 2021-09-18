<div class="table-responsive">
    <table class="table table-striped" id="roles-table">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Estado</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $users)
                <td>{{ $users->name }}</td>
                <td>{{ $users->name=='Superuser'?'':$users->email }}</td>
                <td>
                    @foreach($users->roles()->get() as $rol)
                        {{ $rol->name.($loop->last?"":", ") }}
                    @endforeach
                </td>
                <td class="{{ $users->estado=="locked"?"text-danger":"text-success" }}">{{ $users->estado }}</td>
                <td>
                    {!! Form::open(['route' => ['roles.destroy', $users->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('roles.show', [$users->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        @if( !$users->roles()->where('name', 'root')->first())
                            <a href="{{ route('roles.edit', [$users->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
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