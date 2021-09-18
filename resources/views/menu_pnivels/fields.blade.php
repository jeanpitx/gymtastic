<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/menuPnivels.fields.descripcion').':') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Menu Field -->
<div class="form-group">
    {!! Form::label('id_menu', __('models/menuPnivels.fields.id_menu').':') !!}
    {!! Form::select('id_menu', $menus,$menuPnivels->id_menu??null,['class'=>'custom-select ipt-list','placeholder' =>'Seleccione Enlace o Url']) !!}
</div>

<!-- Enlace Field -->
<div class="form-group">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('url', 'Enlace') !!}
            <div class="input-group">
                {!! Form::select('url', $enlaces,$menuPnivels->id_enlace??null,['class'=>'custom-select ipt-list','placeholder' =>'Seleccione Enlace o Url']) !!}
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">www</span>
                </div>
            </div>
            <span class="invalid-feedback" id="msg_url"></span>
            <small id="nameHelp" class="form-text text-muted">Enlace que se apertura al hacer clic</small>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
</div>

<script>
    $('select[name="url"]').val('{{!empty($menuSnivel)?$menuPnivels->id_enlace:""}}').change();
</script>