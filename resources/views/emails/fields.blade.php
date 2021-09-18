<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/emails.fields.email').':') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Identificacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identificacion', __('models/emails.fields.identificacion').':') !!}
    {!! Form::text('identificacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Registro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_registro', __('models/emails.fields.tipo_registro').':') !!}
    {!! Form::text('tipo_registro', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
</div>
