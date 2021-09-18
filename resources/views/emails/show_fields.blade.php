<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/emails.fields.email').':') !!}
    <p>{{ $email->email }}</p>
</div>

<!-- Cedula Field -->
<div class="form-group">
    {!! Form::label('cedula', __('models/emails.fields.identificacion').':') !!}
    <p>{{ $email->identificacion }}</p>
</div>

<!-- Tipo Registro Field -->
<div class="form-group">
    {!! Form::label('tipo_registro', __('models/emails.fields.tipo_registro').':') !!}
    <p>{{ $email->tipo_registro }}</p>
</div>

