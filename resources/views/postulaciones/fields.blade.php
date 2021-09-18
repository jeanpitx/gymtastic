<!-- Id Persona Field
<div class="form-group col-sm-12">
    {!! Form::label('id_persona', __('models/postulaciones.fields.id_persona').':') !!}
    {!! Form::number('id_persona', (!empty($postulacion)?$postulacion->Persona()->first()->identificacion:null), ['class' => 'form-control']) !!}
</div>-->

<!-- Correo Electronico Field -->
<div class="form-group col-sm-12">
    {!! Form::label('correo_electronico', __('models/postulaciones.fields.correo_electronico').':') !!}
    {!! Form::text('correo_electronico', null, ['class' => 'form-control','maxlength' => 80,'maxlength' => 80]) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-12">
    {!! Form::label('telefono', __('models/postulaciones.fields.telefono').':') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control','maxlength' => 12,'maxlength' => 12]) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('direccion', __('models/postulaciones.fields.direccion').':') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Expectativas Field -->
<div class="form-group col-sm-12">
    {!! Form::label('expectativas', __('models/postulaciones.fields.expectativas').':') !!}
    {!! Form::text('expectativas', null, ['class' => 'form-control','maxlength' => 100,'maxlength' => 100]) !!}
</div>

<!-- Curriculum Field -->
<div class="form-group col-sm-12">
    {!! Form::label('f_curriculum', __('models/postulaciones.fields.f_curriculum').':').(!empty($postulacion)?' <a href="'.route('PostulacionPdf',['id'=>$postulacion->id_postulacion]).'" target="_blank">ver archivo</a>':'') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('f_curriculum', ['name'=>'f_curriculum','class'=>'custom-file-input'.($errors->has('f_curriculum')?' is-invalid':''),'accept'=>'.pdf','data-max-size'=>'5242880']) !!}
            <label class="custom-file-label" for="inputGroupFile01">Seleccione archivo</label>
        </div>
    </div>
</div>

<!-- Ciudad Field -->
<div class="form-group col-sm-12">
    {!! Form::label('id_ciudad', __('models/postulaciones.fields.id_ciudad').':') !!}
    {{ Form::select('id_ciudad', $ciudad, null, ['id' => 'ciudad','class' => 'form-control ciudad','required']) }}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
</div>
