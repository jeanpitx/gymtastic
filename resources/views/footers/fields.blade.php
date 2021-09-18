<style>
    .dropzone{
        cursor: move;
    }
    .dropzone.over {
        border: 3px dotted #666;
    }
</style>

<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Titulo:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control toupper','placeholder'=>'Título del pie de página']) !!}
</div>

<!-- Detalle Field -->
<div class="form-group">
    <p style="font-weight: bold">Añadir nueva opción:</p>
    <div class="row ctn-multiple" data-multiple-max="5">
        <div class="col-sm-5">
            {!! Form::label('descripcion', 'Titulo:') !!}
            {!! Form::text('titulo', null, ['class' => 'form-control ctn-multiple-norepeat','placeholder' => 'Titulo']) !!}
        </div>
        <div class="col-sm-7">
            {!! Form::label('descripcion', 'Enlace o Url:') !!}
            <div class="input-group mb-3">
                {!! Form::select('url', $enlaces,null,['class'=>'custom-select ctn-multiple-norepeat ipt-list','placeholder' =>'Seleccione Enlace o Url']) !!}
                <div class="input-group-append">
                  <button class="btn btn-outline-primary ctn-multiple-btn" type="button">Añadir</button>
                </div>
            </div>
        </div>
    </div>

    <p style="font-weight: bold">Opciones disponibles en este menú:</p>
    <ul class="ctn-multiple-content content-move" name="telefono empresa" style="padding-left: 0px;">
        
        @if(!empty($footer))
            @foreach($footer->FooterElement()->get() as $detalle)
                <li class="coinput input-group input-group-sm dropzone" style="margin-bottom:2px" draggable="true">
                    <div class="input-group-prepend">
                        <i class="input-group-text fas fa-arrows-alt"></i>
                    </div>
                    <input value="{{ ($detalle->descripcion) }}" class="form-control ctn-multiple-norepeat" name="titulo_add[]" type="text">
                    {!! Form::select('url_add[]', $enlaces,$detalle->id_enlace,['class'=>'custom-select ctn-multiple-norepeat ipt-list','placeholder' =>'Seleccione Enlace o Url']) !!}
                    <div class="input-group-append">
                        <button class="btn btn-outline-danger" type="button" onclick="actionRmv(this)">-</button>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>
    

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('footers.index') }}" class="btn btn-secondary">@lang('crud.cancel')</a>
</div>

<script>
    $('select[name="url"]').val("").change();
</script>
{!! Html::script('js/multi-input-group.js') !!}