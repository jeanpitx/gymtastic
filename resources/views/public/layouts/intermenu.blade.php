@inject('service', 'App\Clases\Utilities')
<div class="col-md-4 pr-4 mr-xl-3 mnu-color d-lg-flex align-items-center d-none d-lg-block" style="max-width: 350px; min-height:263px;max-height:263px;">
    <div class="row">
        <div class="col-md-6 d-flex align-items-center px-0"><!--border-right: 1px dashed #cccccc;-->
            <ul class="list-group list-group-flush px-lg-0 inmenu-parent">
                @foreach($menus as $menu)
                    <li class="list-group-item border-0 mnu-color pr-0 inmenu-pd-lg-1 pl-4 inmenu "><!--current-->
                        <a class="btn btn-sm btn-light-new mnu-uniline text-left inmenufont" style="min-width: 152px" 
                            href="{{url($menu->Enlace()->first()->url??"#")}}" 
                            target="{{$menu->Enlace()->first()->metodo??"_self"}}"
                            >{{$menu->descripcion}}</a>
                        <ul class="inmenu-items">
                            @foreach($menu->MenuPnivel()->get() as $mpnivel)
                                <li class="list-group-item mnu-color px-0 mw-xl" style="min-width: 150px;background: rgb(187, 187, 187) !important;">
                                    <a class="btn btn-sm mr-sm-4 btn-light-new2 text-left insubmenufont d-flex justify-content-between align-items-center plusmenu-title" style="min-width: 100%; font-weight: bold;"
                                        href="{{url($mpnivel->Enlace()->first()->url??"#")}}" 
                                        target="{{$mpnivel->Enlace()->first()->metodo??"_self"}}"
                                        >{{$mpnivel->descripcion}} @if(!$mpnivel->id_enlace)<i class="fas fa-plus"></i>@endif
                                    </a>
                                    <ul class="list-group list-group-none plusmenu-items">
                                        @foreach($mpnivel->MenuSnivel()->get() as $msnivel)
                                            <li class="list-group-item py-0 px-0 mb-1 bg-transparent">
                                                <a class="btn btn-sm btn-light-new2 px-0 insubmenufont text-left" style="min-width: 135px" 
                                                    href="{{url($msnivel->Enlace()->first()->url??"#")}}" 
                                                    target="{{$msnivel->Enlace()->first()->metodo??"_self"}}"
                                                >{{$msnivel->descripcion}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach

                
                <!--<li class="list-group-item border-0 mnu-color pr-0 inmenu-pd-lg-1 pl-4 inmenu" style="max-width: 100% !important">
                    <a class="btn btn-sm btn-light-new mnu-uniline text-left inmenufont" style="min-width: 100%;">SOLICITUDES</a>
                </li>-->
                <li class="list-group-item border-0 mnu-color pr-0 inmenu-pd-lg-1 pl-4" style="max-width: 100% !important">
                    <a class="btn btn-sm btn-light-new text-left inmenufont" style="min-width: 100%;"
                        href="{{$service->filterUrlArray($service->filterFixed($fijas,"menu-navcontacto")->enlace)}}" target="{{$service->filterFixed($fijas,"menu-navcontacto")->enlace["metodo"]??"_self"}}"
                        >
                        {{$service->filterFixed($fijas,"menu-navcontacto")->descripcion}}
                    </a>
                </li>
                <!--BOTON CHAT-->
                <li class="btn-chat list-group-item border-0 mnu-color pr-0 inmenu-pd-lg-1 pl-4 pr-4" style="max-width: 100% !important">
                    <a class="btn btn-sm my-2 my-sm-0 mr-sm-4 btn-light btn-linea text-left text-white inmenufont" style="min-width: 100%;"
                    href="{{$service->filterUrlArray($service->filterFixed($fijas,"menu-chat")->enlace)}}" target="{{$service->filterFixed($fijas,"menu-chat")->enlace["metodo"]??"_self"}}"
                    >
                        {{$service->filterFixed($fijas,"menu-chat")->descripcion}}
                    </a>
                </li>
                <!--BOTON SOLICITUDES-->
                <li class="btn-soli list-group-item border-0 mnu-color pr-0 inmenu-pd-lg-1 pl-4 pr-4" style="max-width: 100% !important">
                    <button type="button" class="btn btn-sm mr-sm-4 btn-light-new-oscure text-left inmenufont" style="min-width: 100%;" data-toggle="modal" data-target="#ModalSolicitud">
                        {{$service->filterFixed($fijas,"inmenu-solicitud")->descripcion}}
                    </a>
                </li>
            </ul>
        </div>
        <!--AQUI SE MUESTRA EL OTRO MENÚ-->
        <div class="col-md-6 d-lg-flex align-items-center pl-xl-2 pl-lg-1" style="position:absolute;top:0;right:0; height:100%;background:rgb(226, 226, 226)">
            <ul class="list-group list-group-flush insubmenu">
            </ul>
        </div>
    </div>
</div>