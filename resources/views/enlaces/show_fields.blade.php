<!-- Referencia Field -->
<div class="form-group">
    {!! Form::label('referencia', __('models/enlaces.fields.referencia').':') !!}
    <p>{{ $enlace->referencia }}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', __('models/enlaces.fields.url').':') !!}
    <p>{{ $enlace->url }}</p>
</div>

<!-- Metodo Field -->
<div class="form-group">
    {!! Form::label('metodo', __('models/enlaces.fields.metodo').':') !!}
    <p>{{ $enlace->metodo=="_blank"?"NUEVA VENTANA":"VENTANA ACTUAL" }}</p>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', __('models/enlaces.fields.estado').':') !!}
    <p>{{ $enlace->estado=="A"?"ACTIVADO":"DESACTIVADO" }}</p>
</div>

