<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', __('models/menus.fields.descripcion').':') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control toupper']) !!}
</div>

<!-- Niveles Field -->
<!--
<div class="form-group">
    {!! Form::label('levels_html', 'Niveles :') !!}
    {!! Form::textarea('levels_html', null, ['id' => 'levels_html','class' => 'form-control toupper']) !!}
</div>
<div class="form-group">
    {!! Form::label('levels_json', 'Niveles :') !!}
    {!! Form::text('levels_json', null, ['class' => 'form-control', 'style'=>'display:none', 'id'=>'levels_json']) !!}
    <div id="previsualiza">
        {}
    </div>
</div>
 -->

<!-- Enlace Field -->
<div class="form-group">
    <div class="row">
        <div class="col-sm-12">
            {!! Form::label('url', 'Enlace') !!}
            <div class="input-group">
                {!! Form::select('url', $enlaces,!empty($menu)?$menu->id_enlace:null,['class'=>'custom-select ipt-list','placeholder' =>'Seleccione Enlace o Url']) !!}
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
    /*
    CODIGO PARA OBTENER ENLACES Y AÑADIRLOS EN LA URL
    var sites = @json($enlaces["Existentes"]);
    var newArray=[];
    Object.entries(sites).forEach(function(val,id){
        newArray.push({"value":val[0], "text":val[1]});
    });
    console.log(newArray);
    tinymce.init({
      selector: 'textarea#levels_html',
      placeholder: 'Ingrese el contenido aquí',
      toolbar: 'undo redo bullist outdent indent link', //
      link_list: newArray,
      target_list: false,
      link_title: false,
      plugins: 'lists link',
      menubar: false,
      setup: function(editor) {
            editor.on('keyup', function(e) {
                var result=JSON.stringify(FetchChild($(editor.getContent())));
                $("#previsualiza").text(result);
                $("#levels_json").val(result);
            });
            editor.on('load', function(e) {
                var result=JSON.stringify(FetchChild($(editor.getContent())));
                $("#previsualiza").text(result);
                $("#levels_json").val(result);
            });
      }
    });

    function FetchChild(ul){
        var data =[];
        $(ul).children('li').each(function(){
            data.push(buildJSON($(this)));
        });
        return data;
    }

    function buildJSON($li) {
        var subObj = { "name": $li.contents().eq(0).text().trim() };
        if($li.children("a").length>0){
            Object.assign(subObj,{"url":$li.children("a").attr("href")});
        }else{
            Object.assign(subObj,{"url":""});
        }
        $li.children('ul').children().each(function() {
            if (!subObj.children) { 
                subObj.children = [];
            }
            subObj.children.push(buildJSON($(this)));
        });
        return subObj;
    }*/
</script>