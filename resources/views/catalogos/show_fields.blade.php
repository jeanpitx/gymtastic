<!-- Id Tipo Catalogo Field -->
<div class="form-group">
    {!! Form::label('id_tipo_catalogo', __('models/catalogos.fields.id_tipo_catalogo').':') !!}
    <p>{{ $catalogo->TipoCatalogo->descripcion }}</p>
</div>


<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/catalogos.fields.descripcion').':') !!}
    <p>{{ $catalogo->descripcion }}</p>
</div>