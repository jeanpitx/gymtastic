
<!-- Usuario Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/roles.fields.user').':') !!}
    <p>{{ $roleUser->name }}</p>
</div>

<!-- Rol Id Field -->
<div class="form-group">
    {!! Form::label('role_id', __('models/roles.fields.role_id').':') !!}
    <p>
        @foreach($roleUser->roles()->get() as $rol)
            {{ $rol->name.($roleUser->roles()->latest()->first()->name==$rol->name?"":", ") }}
        @endforeach
    </p>
</div>

<!-- Estado -->
<div class="form-group">
    {!! Form::label('estado', __('models/roles.fields.estado').':') !!}
    <p class="{{ $roleUser->estado=="locked"?"text-danger":"text-success" }}">{{ $roleUser->estado }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/roles.fields.created_at').':') !!}
    <p>{{ $roleUser->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/roles.fields.updated_at').':') !!}
    <p>{{ $roleUser->updated_at }}</p>
</div>

