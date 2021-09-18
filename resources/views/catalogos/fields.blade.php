<!-- Id Tipo Catalogo Field -->
<div class="form-group">
    {!! Form::label('id_tipo_catalogo', __('models/catalogos.fields.id_tipo_catalogo').':') !!}
    {!! Form::select('id_tipo_catalogo', $tipos, null, ['class' => 'form-control','required']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/catalogos.fields.descripcion').':') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
</div>
