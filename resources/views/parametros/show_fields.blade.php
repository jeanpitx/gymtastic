<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', __('models/parametros.fields.tipo').':') !!}
    <p>{{ $parametro->tipo }}</p>
</div>

<!-- Parametro Field -->
<div class="form-group">
    {!! Form::label('parametro', __('models/parametros.fields.parametro').':') !!}
    <p>{{ $parametro->parametro }}</p>
</div>

<!-- Detalle Field -->
<div class="form-group">
    {!! Form::label('detalle', __('models/parametros.fields.detalle').':') !!}
    <p>{{ $parametro->detalle }}</p>
</div>
