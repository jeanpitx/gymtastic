<!-- Tipo Parametro Field -->
<div class="form-group">
    {!! Form::label('tipo_parametro', __('models/fijas.fields.tipo_parametro').':') !!}
    <p>{{ $fija->tipo_parametro }}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/fijas.fields.descripcion').':') !!}
    <p>{{ $fija->descripcion }}</p>
</div>

<!-- Detalle 1 Field -->
@if($fija->detalle1)
    <div class="form-group">
        {!! Form::label('detalle1', 'Detalle 1:') !!}
        <p>{!! $fija->detalle1 !!}</p>
    </div>
@endif

<!-- Detalle 2 Field -->
@if($fija->detalle2)
    <div class="form-group">
        {!! Form::label('detalle2', 'Detalle 2:') !!}
        <p>{!! $fija->detalle2 !!}</p>
    </div>
@endif