<div class="table-responsive">
    <table class="table table-striped" id="emails-table">
        <thead>
            <tr>
                <th>@lang('models/emails.fields.email')</th>
                <th>@lang('models/emails.fields.identificacion')</th>
                <th>@lang('models/emails.fields.tipo_registro')</th>
                @if(Auth::user()->hasAnyRole(['root']) && Auth::user()->estado=="active")
                    <th colspan="3">@lang('crud.action')</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach($emails as $email)
            <tr>
                <td>{{ $email->email }}</td>
                <td>{{ $email->identificacion }}</td>
                <td>{{ $email->tipo_registro }}</td>
                @if(Auth::user()->hasAnyRole(['root']) && Auth::user()->estado=="active")
                    <td>
                        {!! Form::open(['route' => ['emails.destroy', $email->id_email_cliente], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('emails.show', [$email->id_email_cliente]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                            <a href="{{ route('emails.edit', [$email->id_email_cliente]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>