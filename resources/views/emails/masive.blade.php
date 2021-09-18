@extends('layouts.app')

@section('content')
    {!! Html::script('js/ajaxsubmit.form.min.js') !!}
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('emails.index') !!}">@lang('models/emails.plural')</a>
      </li>
      <li class="breadcrumb-item active">Envio de correos masívos</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>@lang('crud.add_new') @lang('models/emails.singular')</strong>
                            </div>
                            <div class="card-body">
                                <div id="masiveloading" style="position: absolute; background:white; width:100%;height:100%;left:0;top:0;z-index:999;padding-top:10px; color:rgb(92, 89, 89); text-align:center; font-size:20px;display:none;">
                                    <p>Enviando...</p>
                                    <p>Destinatario:</p>
                                    <p><span>1</span>/<b>{{count($emails)}}</b></p>
                                </div>
                                {!! Form::open(['route' => 'emails.masivesend','files'=>true,'id'=>'formmasive']) !!}
                                    <div class="row">
                                        <div class="col-7">
                                            <!-- Titulo Field -->
                                            <div class="form-group">
                                                {!! Form::label('titulo', 'Título del mensaje:') !!}
                                                {!! Form::text('titulo', null, ['class' => 'form-control','placeholder' => 'Título de los correos','required']) !!}
                                            </div>

                                            <!-- Imagen Field -->
                                            <div class="form-group">
                                                {!! Form::label('imagen', 'Seleccione imagen desde archivos:') !!}
                                                <img id="imgsee" src="{!! url('/img/imgcarrusel.png') !!}" class="img-fluid rounded col-4 img-zoomable mx-auto d-block" style="margin-bottom: 3px">
                                                {!! Form::select('imagen', $images,null,['class'=>'custom-select ipt-list','placeholder' =>'Seleccione ruta de la imagen']) !!}
                                            </div>

                                            <!-- Documento Field -->
                                            <div class="form-group">
                                                {!! Form::label('documento', 'Documento PDF:') !!}
                                                <div class="custom-file">
                                                    {!! Form::file('documento', ['name'=>'documento','class'=>'custom-file-input'.($errors->has('documento')?' is-invalid':''),'accept'=>'.pdf','data-max-size'=>'5242880']) !!}
                                                    {!! Form::text('dochide', null, ['class' => 'form-control', 'style'=>'display: none']) !!}
                                                    <label class="custom-file-label" for="inputGroupFile01">Seleccione archivo PDF</label>
                                                </div>
                                            </div>

                                            <!-- Enlace Field -->
                                            <div class="form-group">
                                                {!! Form::label('url', 'Enlace:') !!}
                                                {!! Form::select('url', $enlaces,null,['class'=>'custom-select ipt-list','placeholder' =>'Seleccione Enlace o Url']) !!}
                                            </div>

                                            <!-- Mensaje Field -->
                                            <div class="form-group">
                                                {!! Form::label('mensaje', 'Contenido del mensaje:') !!}
                                                {!! Form::textarea('mensaje', null, ['class' => 'form-control','placeholder' => 'Mensaje de los correos','rows'=>'3','required']) !!}
                                            </div>

                                            <!-- Submit Field -->
                                            <div class="form-group">
                                                {!! Form::text('emailmasive',null,['class'=>'form-control','id' =>'emailmasive','style' =>'display:none']) !!}
                                                {!! Form::button("Enviar mensajes", ['class' => 'btn btn-primary','id' => 'btnmasive']) !!}
                                                <a href="{{ route('emails.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            {!! Form::label('mensaje', 'Listado de clientes ('.count($emails).'):') !!}
                                            <div class="table-responsive" style="max-height: 580px">
                                            <table class="table" id="tablemail">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Correo</th>
                                                        <th scope="col">Estado</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($emails as $email)
                                                        <tr>
                                                            <th scope="row">{{ $loop->index +1 }}</th>
                                                            <td data-table="mail" style="max-width: 180px">{{$email->email}}</td>
                                                            <td data-table="estado">En espera</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
    <script>
        //FUNCION LIMITA TAMAÑO MAXIMO DE ARCHIVOS
        $('#imagen').on('change', function(event) {
            if($(event.target).val())
                $("#imgsee").attr("src",$(event.target).val());
            else
                $("#imgsee").attr("src","{!! url('/img/imgcarrusel.png') !!}");
        });
        if($("#imagen").val())
            $("#imgsee").attr("src",$("#imagen").val());

        //FUNCION LIMITA TAMAÑO MAXIMO DE ARCHIVOS
        $('.custom-file-input').on('change', function(event) {
            var inputFile = event.currentTarget;
            if($(event.target).get(0).files.length){
                $(inputFile).parent()
                    .find('.custom-file-label')
                    .html(inputFile.files[0].name);
            }
        });
        $('#documento').bind('change',  function(evt) {
            var file = evt.target.files[0];//obtenemos solo el primer archivo
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    $("input[name='dochide']").val(e.target.result);
                };
            })(file);
            reader.readAsDataURL(file);
        });

        //funcion envia datos
        var time = 100;
        $("#btnmasive").click(function(e){
        var time = 100;
            $('#tablemail td[data-table="mail"]').each(function(key, value){
                sendMail(key,value);
            });
        });

        function sendMail(key,value){
            time += 100;
            setTimeout( function(){
                $("#emailmasive").val($(value).html());
                $(window).scrollTop(0);
                $("#masiveloading").show();
                $("#masiveloading").children().eq(1).html("Destinatario: " + $(value).html());
                $("#masiveloading").children().eq(2).children().eq(0).html(key +1);
                $("#formmasive").ajaxSubmit(function(data) {
                    if(data[0]=="Enviado"){
                        $('#tablemail td[data-table="estado"]').eq(key).html("Enviado");
                    }else{
                        $('#tablemail td[data-table="estado"]').eq(key).html("Error");
                        console.log(data[0]);
                    }
                //console.log($('#tablemail td[data-table="estado"]').length -1); console.log(key);
                    if($('#tablemail td[data-table="estado"]').length -1 ==key){
                        $("#masiveloading").children().eq(1).html("Destinatario: ");
                        $("#btnmasive").html("Enviados!");
                        $("#btnmasive").prop( "disabled", true );
                        $("#masiveloading").hide();
                        alert("Los mensajes han sido enviados, ver detalle en la tabla!");
                    }
                })
            }, time);
        }

        tinymce.init({
            selector: 'textarea#mensaje',
            placeholder: 'Ingrese el mensaje aquí',
            max_height : 180,
            toolbar: 'undo redo bold italic alignleft aligncenter alignright bullist outdent indent',
            plugins: 'lists',
            menubar: false,
            setup: function(editor) {
                    editor.on('keyup', function(e) {
                        $("#mensaje").val(editor.getContent());
                    });
                    editor.on('load', function(e) {
                        $("#mensaje").val(editor.getContent());
                    });
            }
        });
    </script>
@endsection
