<div class="col-md-12 mb-3 junto-ud">
    siempre junto a usted
</div>

           
<!-- COMIENZA LISTA SUB FOOTER -->
<div class="px-4 row d-flex justify-content-between" style="width: 100%">
    @foreach($footers as $footer)
        <div class="col-auto mb-2">
            <h6 class="img-round-title my-0 mb-1" style="font-size: 14px">{{$footer->descripcion}}</h6>
            <ul class="list-group list-group-none">
                @foreach($footer->FooterElement()->get() as $element)
                    <li class="list-group-item py-0 px-0 mb-1 bg-transparent">
                        <a class="footerfont" style="font-size: 13px" href="{{$element->id_enlace?url($element->Enlace()->first()->estado=="A"?$element->Enlace()->first()->url:"/mantenimiento"):"#"}}" target="{{$element->id_enlace?$element->Enlace()->first()->metodo:"_self"}}">
                            {{$element->descripcion}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div><!-- TERMINA LISTA SUB FOOTER -->

<!-- IMAGEN DEL FINAL -->
<div class="col-md-12 mb-3" style="padding-top:50px;"> 
    <div style="position: absolute;bottom: 0px; left: 0; height: 50px; width: 100%;">
        {!! Html::image('img/welcome/footer.svg', '...', ['class' => 'img-fluid']) !!}
    </div>
</div>
