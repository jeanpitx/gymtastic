<style>
    label{
        font-weight: bold;
    }
</style>
<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/menus.fields.descripcion').':') !!}
    <p>{{ $menu->descripcion }}</p>
</div>

<!-- Id Enlace Field -->
<div class="form-group">
    {!! Form::label('id_enlace', __('models/menus.fields.id_enlace').':') !!}
    <p>{{ $menu->Enlace()->first()->referencia??"Ninguno" }}</p>
</div>

