<style>
    label{
        font-weight: bold;
    }
</style>
<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/menuPnivels.fields.descripcion').':') !!}
    <p>{{ $menuPnivel->descripcion }}</p>
</div>

<!-- Id Menu Field -->
<div class="form-group">
    {!! Form::label('id_menu', __('models/menuPnivels.fields.id_menu').':') !!}
    <p>{{ $menuPnivel->Menu()->first()->descripcion }}</p>
</div>

<!-- Id Enlace Field -->
<div class="form-group">
    {!! Form::label('id_enlace', __('models/menuPnivels.fields.id_enlace').':') !!}
    <p>{{ $menuPnivel->Enlace()->first()->referencia??"Ninguno" }}</p>
</div>

