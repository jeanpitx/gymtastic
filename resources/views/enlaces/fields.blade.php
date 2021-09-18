<!-- Referencia Field -->
<div class="form-group">
    {!! Form::label('referencia', __('models/enlaces.fields.referencia').':') !!}
    {!! Form::text('referencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', __('models/enlaces.fields.url').':') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Metodo Field -->
<div class="form-group">
    {!! Form::label('metodo', __('models/enlaces.fields.metodo').':') !!}
    {!! Form::select('metodo', ['_blank' => 'Nueva Pestaña', '_self' =>'Pestaña actual'],null,['class'=>'form-control','placeholder' =>
    'Seleccione el metodo para abrir el enlace']) !!}
</div>

@if(Auth::user()->hasAnyRole(['root']))
    <!-- Estado Field -->
    <div class="form-group">
        {!! Form::label('estado', __('models/enlaces.fields.estado').':') !!}
        {!! Form::select('estado', ['A' => 'Activo', 'D' =>'Desactivado'],null,['class'=>'form-control','placeholder' =>
        'Seleccione el estado']) !!}
    </div>

    <!-- Privilegios Field -->
    <div class="form-group">
        {!! Form::label('privilegios', 'Privilegios:') !!}
        {!! Form::text('privilegios', null, ['class' => 'form-control']) !!}
    </div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
</div>
