{!! Form::text('indicator', !empty($categoria)?"update":"create", ['class' => 'form-control', 'style'=>'display: none', 'id'=>'indicator']) !!}
<!-- Titulo categoría Field -->
<div class="form-group col-sm-12">
    {!! Form::label('titulo', __('models/categorias.fields.titulo').' Categoría:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control toupper','placeholder' =>'Título de categoría','required']) !!}
</div>

<!-- URL imagen Field -->
<div class="form-group col-sm-12">
    {!! Form::label('url_imagen_temp', 'Imagen tarjeta *') !!}
    <img src="{!! url(!empty($categoria)?'/'.$categoria->url_imagen:'/img/imgcarrusel.png') !!}" class="img-see img-fluid rounded img-zoomable mx-auto d-block" style="max-width:180px;margin-bottom: 3px">
    <div class="custom-file">
        {!! Form::file('url_imagen_temp', ['class'=>'custom-file-input image-select','accept'=>'image/*']) !!}
        {!! Form::label('url_imagen_temp','Seleccione una imagen',['class'=>'custom-file-label']) !!}
        <!--SE CREA UN INPUT OCULTO QUE ENVIE Y TRAIGA LA IMAGEN-->
        {!! Form::text('imghide', null, ['class' => 'form-control img-hide', 'style'=>'display: none', 'id'=>'imghide']) !!}
    </div>
    <small id="nameHelp" class="form-text text-muted">* (.png) con tamaño 1200 * 800</small>
</div>

<div  id="ModalForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                {!! Form::text('idchild', null, ['class' => 'form-control', 'style'=>'display: none', 'id'=>'idchild']) !!}

                <!-- URL imagen Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('url_imagen_temp', 'Imagen tarjeta *') !!}
                    <img id="img-see-child" src="{!! url('/img/imgcarrusel.png') !!}" class="img-see img-fluid rounded img-zoomable mx-auto d-block" style="max-width:180px;margin-bottom: 3px">
                    <div class="custom-file">
                        {!! Form::file('url_imagen_temp', ['class'=>'custom-file-input image-select','accept'=>'image/*']) !!}
                        {!! Form::label('url_imagen_temp','Seleccione una imagen',['class'=>'custom-file-label img-text-child']) !!}
                        <!--SE CREA UN INPUT OCULTO QUE ENVIE Y TRAIGA LA IMAGEN-->
                        {!! Form::text('imghidechild', null, ['class' => 'form-control img-hide', 'style'=>'display: none', 'id'=>'imghidechild']) !!}
                    </div>
                </div>

                <!-- Titulo tarjeta Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('titulo_child', 'Título Tarjeta:') !!}
                    {!! Form::textarea('titulo_child', null, ['class' => 'form-control titlearea','placeholder'=>'Título de la tarjeta','rows'=>'1']) !!}
                </div>

                <!-- Descripcion Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('descripcion_child', 'Descripción Elemento:') !!}
                    {!! Form::textarea('descripcion_child', null, ['class' => 'form-control','placeholder'=>'Descripción de la tarjeta','rows'=>'2']) !!}
                </div>

                <!-- Enlace Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('url', 'Enlace') !!}
                    <div class="input-group">
                        {!! Form::select('url', $enlaces,!empty($tarjeta)?$tarjeta->id_enlace:null,['class'=>'custom-select ipt-list','placeholder' =>'Seleccione Enlace o Url']) !!}
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">www</span>
                        </div>
                    </div>
                    <span class="invalid-feedback" id="msg_url"></span>
                    <small id="nameHelp" class="form-text text-muted">Enlace que se apertura al hacer clic</small>
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit("Guardar cambios", ['class' => 'btn btn-primary submitmodal']) !!}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="card border-success">
        <div class="card-header">
            <i class="fa fa-align-justify"></i>
            Tarjetas
            <a class="fa-pull-right modalclick" href="#" data-toggle="modal" data-target="#ModalForm"><i class="fa fa-plus-square fa-lg"></i></a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Enlace</th>
                        <th colspan="3">@lang('crud.action')</th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($categoria))
                @foreach($categoria->CategoriaChild()->get() as $child)
                    <tr>
                        <td>{!! $child->id_category_child !!}</td>
                        <td>{!! $child->titulo !!}</td>
                        <td>{{ $child->descripcion }}</td>
                        <td><img src="{!! url($child->url_imagen) !!}" class="d-block w-25 img-zoomable"></td>
                        <td>
                            <a href="{{ url($child->Enlace()->first()->url ) }}" target="_blank">Acceder</a>
                            <i style="display: none">{{ $child->id_enlace }}</i>
                        </td>
                        <td>
                            <div class='btn-group'>
                                <a href="#" class='btn btn-ghost-info btnedit'><i class="fa fa-edit"></i></a>
                                <a href="{!! route('categorias.deletechild', $child->id_category_child) !!}" class='btn btn-ghost-danger btndelete'><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
 </div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
</div>




<script>
    $('.btnedit').on("click", function(e){
        var $parent=$(this).closest("tr");
        //seteamos el id
        $('#idchild').val($parent.children().eq(0).text());
        //seteamos el título
        tinymce.get('titulo_child').setContent($parent.children().eq(1).html());
        $('#titulo_child').val($parent.children().eq(1).html());
        //seteamos la descripcion
        $('#descripcion_child').val($parent.children().eq(2).text());
        //seteamos la imagen
        $('#img-see-child').attr("src",$parent.children().eq(3).find("img").attr("src"));
        //seteamos el enlace
        $('#url').val($parent.children().eq(4).find("i").text());
        $("#ModalForm").modal('show');
        e.preventDefault();
        return;
    });
    $('#ModalForm').on('hidden.bs.modal', function (e) {
        $('#img-see-child').attr("src","{!! url('/img/imgcarrusel.png') !!}");
        $("#imghidechild").val("");
        $(".img-text-child").html("Seleccione una imagen");
        $('#idchild').val("");
        tinymce.get('titulo_child').setContent("");
        $('#titulo_child').val("");
        $('#descripcion_child').val("");
        $('#url').val("");
    });

    $('.btndelete').on("click", function(e){
        if(confirm("¿Está segúro?")){
            console.log("se jue");
        }else{
            e.preventDefault();
            return;
        }
    });

    $('.submitmodal').on('click', function (e) {
        if(!$("#titulo_child").val()){
            alert("El campo título es requerido");
            e.preventDefault();
            return;
        }
        if(!$("#descripcion_child").val()){
            alert("El campo descripcion es requerido");
            e.preventDefault();
            return;
        }
        if(!$("#url").val()){
            alert("El campo enlace es requerido");
            e.preventDefault();
            return;
        }
        if(!$('#idchild').val() && !$("#imghidechild").val()){
            alert("El campo imagen es requerido");
            e.preventDefault();
            return;
        }
    });

    $('.modalclick').on('click', function (e) {
        if(!$("#titulo").val()){
            $('#titulo')[0].reportValidity();
            e.stopPropagation();
            return;
        }
        if($("#indicator").val()=="create" &&!$("#imghide").val()){
            alert("Seleccione la imagen de la cabecera");
            e.stopPropagation();
            return;
        }
    });

    $('.image-select').on('change',  function(evt) {
        var elemento = evt.target;
        var parent = $(elemento).closest(".form-group");
        var file = elemento.files[0];//obtenemos solo el primer archivo
        //Solo admitimos imágenes.
        if (!file.type.match('image.*')) {
            return;
        }
        var reader = new FileReader();
        reader.onload = (function(theFile) {
            return function(e) {
                // Insertamos la imagen en la img con class
                $(parent).find(".img-see").attr("src", e.target.result);
                //llena el label de bootstrap con el nombre
                $(parent).find(".custom-file-label").html(escape(theFile.name));
                // Insertamos la imagen en la text con name=imghidechild
                $(parent).find(".img-hide").val(e.target.result);
            };
        })(file);
        reader.readAsDataURL(file);
    });
    
    tinymce.init({
    selector: 'textarea#titulo_child',
    placeholder: 'Ingrese el título de la tarjeta aquí',
    max_height : 120,
    toolbar: 'undo redo bold',//'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code',
    //plugins: 'lists',
    menubar: false,
    setup: function(editor) {
        editor.on('keyup', function(e) {
            $("#titulo_child").val($(editor.getContent()).text());
        });
    }
    });
</script>