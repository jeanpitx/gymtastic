@inject('service', 'App\Clases\Utilities')
<style>
    @media (min-width: 575px) {
        .mnufloat{
            min-width: 90%;
        }
    }
    @media (min-width: 575px) {
        .mnufloat{
            min-width: 330px;
        }
    }
</style>
<div id="mnufloat" class="dropdown-menu dropdown-menu-right dropmenu py-0 my-1 flotante mnufloat" aria-labelledby="dropdownLinea">
    <div class="col-md-12 px-0">        
        <div class="card text-center px-1">
            <div class="accordion" id="accordFloat">
                <div class="card" style="border:none !important;">
                    <div class="w-100 mt-4">
                        {!! Html::image('img/logop.png', 'BCM', ['class' => 'img-fluid', 'width'=>'50']) !!}
                    </div>
                    <h6 class="card-title text-secondary aleofont my-3" style="font-size: 18px">
                        {!!$service->filterFixed($fijas,"menu-bancalinea")->detalle1!!}
                    </h6>

                    <div class="card-header py-0 px-0" id="headingOne" style="border:none !important;">
                        <h5 class="mb-0">
                            <button class="btn btn-light btn-block mb-1 text-left text-white btn-linea aleofont" style="font-size:20px;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fas fa-user-circle iclick" style="color: #fff;float: right; font-size:20px;margin-top:4px;"></i>
                                Clientes
                            </button>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordFloat">
                        <div class="card-body">
                            <p class="card-text elveticafont" style="font-size: 15px; color:#434b52!important">
                                {!!$service->filterFixed($fijas,"menu-bancalinea")->detalle2!!}
                            </p>
                            <a class="btn btn-sm btn-light btn-linea text-white px-3 aleofont" style="font-size: 15px" href="{{$service->filterUrlArray($service->filterFixed($fijas,"menu-bancalinea")->enlace)}}" target="{{$service->filterFixed($fijas,"menu-bancalinea")->enlace["metodo"]??"_self"}}" title="{{$service->filterFixed($fijas,"menu-bancalinea")->descripcion}}">
                                Ingresar <span class="fa fa-sign-in-alt" style="margin-left: 4px"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card" style="border:none !important;">
                    <div class="card-header py-0 px-0" id="headingTwo" style="border:none !important;">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block mb-1 text-left text-white btn-linea aleofont collapsed" style="font-size:20px;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fab fa-whatsapp" style="color: #fff;float: right; font-size:20px;margin-top:4px;"></i>
                                Chat
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordFloat">
                        <div class="card-body">
                            <p class="card-text elveticafont" style="font-size: 15px; color:#434b52!important">
                                {!!$service->filterFixed($fijas,"menu-chat")->detalle2!!}
                            </p>
                            <a class="btn btn-sm btn-light btn-linea text-white px-3 aleofont" style="font-size: 15px" href="{{$service->filterUrlArray($service->filterFixed($fijas,"menu-chat")->enlace)}}" target="{{$service->filterFixed($fijas,"menu-chat")->enlace["metodo"]??"_self"}}" title="{{$service->filterFixed($fijas,"menu-chat")->descripcion}}">
                                Chatea <span class="fab fa-whatsapp" style="margin-left: 4px"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card" style="border:none !important;">
                    <div class="card-header py-0 px-0" id="headingThree" style="border:none !important;">
                        <h2 class="mb-0 ">
                        <button class="btn btn-light btn-block mb-1 text-left text-white btn-linea aleofont collapsed" style="font-size:20px;" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="fas fa-mobile-alt" style="color: #fff;float: right; font-size:20px; margin-top:4px;"></i>
                            App Móvil
                        </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordFloat">
                        <div class="card-body">
                            <p class="card-text elveticafont" style="font-size: 15px; color:#434b52!important">
                                {!!$service->filterFixed($fijas,"menu-navappbcm")->detalle2!!}
                            </p>
                            <a href="{{$service->filterUrlArray($service->filterFixed($fijas,"menu-playstore")->enlace)}}" target="{{$service->filterFixed($fijas,"menu-playstore")->enlace["metodo"]??"_self"}}" title="{{$service->filterFixed($fijas,"menu-playstore")->descripcion}}">
                                {!! Html::image('img/welcome/GooglePlay.svg', 'Tienda App Store', ['class' => 'img-fluid','style' => 'max-width:120px']) !!}
                            </a>
                            <a href="{{$service->filterUrlArray($service->filterFixed($fijas,"menu-appstore")->enlace)}}" target="{{$service->filterFixed($fijas,"menu-appstore")->enlace["metodo"]??"_self"}}" title="{{$service->filterFixed($fijas,"menu-appstore")->descripcion}}">
                                {!! Html::image('img/welcome/AppStore.svg', 'Tienda App Store', ['class' => 'img-fluid','style' => 'max-width:120px']) !!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>          
    </div>
</div>
<script>
    $('#accordFloat button').on('click', function (e) {
        if(!$(e.target).hasClass("collapsed")){//no tiene
            e.stopPropagation();
            return;
        }
    });
    $('button>i').on('click',function (){
        $(this).closest("button").trigger( "click" );
    });

    /*$('#mnufloat button').on('click',function (){
        $('#mnufloat button').children("i").attr("class", "fas fa-plus");
        $(this).children("i").attr("class", "fas fa-window-minimize");
    });*/
</script>