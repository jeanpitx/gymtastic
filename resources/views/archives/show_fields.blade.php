<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', __('models/archives.fields.nombre').':') !!}
    <p>{{ $archive->nombre }}</p>
</div>

<!-- Url Archivo Field -->
<div class="form-group">
    {!! Form::label('url_archivo', __('models/archives.fields.url_archivo').':') !!}
    <p>{{ url($archive->url_archivo) }}</p>
</div>

<!-- Tipo Archivo Field -->
<div class="form-group">
    {!! Form::label('tipo_archivo', __('models/archives.fields.tipo_archivo').':') !!}
    <p>{{ $archive->tipo_archivo }}</p>
</div>

