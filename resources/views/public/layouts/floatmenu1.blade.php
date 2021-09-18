@inject('service', 'App\Clases\Utilities')
<div class="dropdown-menu dropdown-menu-right dropmenu py-0" style="min-width: 300px" aria-labelledby="dropdownLinea">
    <div class="col-md-12 px-0">        
        <div class="card text-center">
            <div class="card-header bg-success pt-1 px-3">
                <ul class="nav nav-tabs card-header-tabs float-parent">
                    <li class="nav-item" style="font-size: 13px">
                        <a class="nav-link py-1 px-sm-2 active" href="#">Clientes</a>
                        <div class="float-element">
                            <h6 class="card-title text-success">
                                {!!$service->filterFixed($fijas,"menu-bancalinea")->detalle1!!}
                            </h6>
                            <p class="card-text" style="font-size: 12px">
                                {{$service->filterFixed($fijas,"menu-bancalinea")->detalle2}}
                            </p>
                            <a href="{{$service->filterUrlArray($service->filterFixed($fijas,"menu-bancalinea")->enlace)}}" target="{{$service->filterFixed($fijas,"menu-bancalinea")->enlace["metodo"]??"_self"}}" title="{{$service->filterFixed($fijas,"menu-bancalinea")->descripcion}}" class="btn btn-sm btn-success">
                                Ingresa <span class="fa fa-sign-in-alt"></span>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item" style="font-size: 13px">
                        <a class="nav-link py-1 px-sm-2" href="#">Chat</a>
                        <div class="float-element">
                            <h6 class="card-title text-success">
                                {!!$service->filterFixed($fijas,"menu-chat")->detalle1!!}
                            </h6>
                            <p class="card-text" style="font-size: 12px">
                                {{$service->filterFixed($fijas,"menu-chat")->detalle2}}
                            </p>
                            <a href="{{$service->filterUrlArray($service->filterFixed($fijas,"menu-chat")->enlace)}}" target="{{$service->filterFixed($fijas,"menu-chat")->enlace["metodo"]??"_self"}}" title="{{$service->filterFixed($fijas,"menu-chat")->descripcion}}" class="btn btn-sm btn-success">
                                Chatea <span class="fab fa-whatsapp"></span>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item" style="font-size: 13px">
                        <a class="nav-link py-1 px-sm-2 text-white" href="#">{{$service->filterFixed($fijas,"menu-navappbcm")->descripcion}}</a>
                        <div class="float-element">
                            <h6 class="card-title text-success">
                                {!!$service->filterFixed($fijas,"menu-navappbcm")->detalle1!!}
                            </h6>
                            <p class="card-text" style="font-size: 12px">
                                {{$service->filterFixed($fijas,"menu-navappbcm")->detalle2}}
                            </p>
                            <a href="{{$service->filterUrlArray($service->filterFixed($fijas,"menu-playstore")->enlace)}}" target="{{$service->filterFixed($fijas,"menu-playstore")->enlace["metodo"]??"_self"}}" title="{{$service->filterFixed($fijas,"menu-playstore")->descripcion}}">
                                {!! Html::image('img/welcome/GooglePlay.svg', 'Tienda App Store', ['class' => 'img-fluid','style' => 'max-width:120px']) !!}
                            </a>
                            <a href="{{$service->filterUrlArray($service->filterFixed($fijas,"menu-appstore")->enlace)}}" target="{{$service->filterFixed($fijas,"menu-appstore")->enlace["metodo"]??"_self"}}" title="{{$service->filterFixed($fijas,"menu-appstore")->descripcion}}">
                                {!! Html::image('img/welcome/AppStore.svg', 'Tienda App Store', ['class' => 'img-fluid','style' => 'max-width:120px']) !!}
                            </a>
                        </div>
                    </li>
                    <li class="nav-item ml-auto fondo-opaco-close" style="font-size: 12px">
                        <a class="nav-link py-1 px-sm-2 text-white border-success fondo-opaco-close" href="#" title="Cerrar">X</a>
                    </li>
                </ul>
            </div>
            <div class="card-body text-left float-show">
                <!--AQUI SE MUESTRA LA INFORMACION DE FLOAT-ELEMENT-->
            </div>
        </div>          
    </div>
</div>