<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('name', __('models/roles.fields.user').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'readonly']) !!}
</div>


<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('roles', __('models/roles.fields.role_id').':') !!}
    <small class="text-info">@lang('Hold Ctrl key to select multiple items').</small>
    {!! Form::select('roles[]', $allRoles, $selectedRoles, ['multiple'=>'multiple','class' => 'form-control','required']) !!}
    
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', __('models/roles.fields.estado').':') !!}
    {!! Form::select('estado', ['active'=>'Activo','locked'=>'Bloqueado'], null, ['class' => 'form-control','required']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
</div>
