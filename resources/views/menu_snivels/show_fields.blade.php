<style>
    label{
        font-weight: bold;
    }
</style>
<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/menuSnivels.fields.descripcion').':') !!}
    <p>{{ $menuSnivel->descripcion }}</p>
</div>

<!-- Id Menu Pnivel Field -->
<div class="form-group">
    {!! Form::label('id_menu_pnivel', __('models/menuSnivels.fields.id_menu_pnivel').':') !!}
    <p>{{ $menuSnivel->MenuPnivel()->first()->descripcion }}</p>
</div>

<!-- Id Enlace Field -->
<div class="form-group">
    {!! Form::label('id_enlace', __('models/menuSnivels.fields.id_enlace').':') !!}
    <p>{{ $menuSnivel->Enlace()->first()->referencia??"Ninguno" }}</p>
</div>

