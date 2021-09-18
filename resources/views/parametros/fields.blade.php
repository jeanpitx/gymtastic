<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', __('models/parametros.fields.tipo').':') !!}
    {!! Form::text('tipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Parametro Field -->
<div class="form-group">
    {!! Form::label('parametro', __('models/parametros.fields.parametro').':') !!}
    {!! Form::text('parametro', null, ['class' => 'form-control']) !!}
</div>

<!-- Detalle Field -->
<div class="form-group">
    {!! Form::label('detalle', __('models/parametros.fields.detalle').':') !!}
    {!! Form::text('detalle', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
</div>
