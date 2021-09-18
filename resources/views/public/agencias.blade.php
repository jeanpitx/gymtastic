@extends('public/layouts.app')

@section('content')
<style>
    @media (max-width: 575px) {
        .imgresize{
            height: 140px;
            margin-top: -80px;
            margin-bottom: 30%
        }
        .conresize{
            max-width: 80%;
            margin-left: 10%;
            padding-left: 30px !important;
            padding-right: 30px !important;
        }
    }
    @media (min-width: 575px) {
        .imgresize{
            height: 140px;
            margin-top: -80px;
        }
    }
    @media (min-width: 768px) {
        .rigthline{
            border-right: 2px solid #fff;
        }
        .lineseparehide{
            display: none;
        }
    }
    @media (max-width: 768px) {
        .lineseparehide{
            display: block;
        }
    }
    
    #map{
        min-height: 263px !important
    }
    .icim{
        max-width: 23px;
        margin-right: -1px;
        margin-left: -1px;
    }
    .col-2-5{
        -ms-flex: 0 0 22%;
        flex: 0 0 22%;
        max-width: 22%;
    }
</style>
    <div class="container" style="background: rgb(241, 241, 241)"> <!--p4-4 da un espacio arriba del contenido-->
        <div class="row">
            <!--MENÚ INTERNO-->
            @include('public.layouts.intermenu')
            <!--FIN MENÚ INTERNO-->

            <!--TARJETAS FIJA -->
            <div class="col-md-12 col-lg-8 pl-0 pl-lg-4 pr-0">
                <div class="w-100" id="map"></div>
                
                
                <div class="col-md-12 mt-3 py-3" style="background-color: rgb(226, 226, 226)">
                    <div class="row">
                        <div class="col-12 contenido">
                            <div class="titlecontent mb-2">
                                Mapa<b>Interactivo</b>BCM
                            </div>
                            <p>Bienvenido al mapa dinámico, has clic en cualquiera de los siguientes elementos y se mostrará su ubicación exacta en el mapa.<p>
                        </div>
                        <!--COMIENZA-->
                        <div class="col-md-6 col-sm-12 pt-3 pb-4 rigthline">
                            <a class="datamap" data-lat="-1.046775" data-lon="-80.464044" href="#">
                            <div class="row d-flex justify-content-center" style="color:rgb(98, 167, 42);">
                                <div class="col-2-5 pl-0 pr-0 text-right">
                                    <img class="icim" src="{{url('img/icons/ico_car.svg')}}">
                                    <img class="icim" src="{{url('img/icons/ico_ubi.svg')}}">
                                    <img class="icim" src="{{url('img/icons/ico_caj.svg')}}">
                                </div>
                                <div class="col-6">
                                    <div class="w-100 px-2 elveticaboldfont datamaptitle" style="border-left: 1px solid rgb(14, 105, 55); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        MATRIZ PORTOVIEJO <br><!--ELEMENTOS Y TITULO-->
                                        CajeroAutomáticoBCM <br>
                                        AutoBancoBCM
                                    </div>
                                    <div class="w-100 px-2 mt-1 elveticafont" style="border-left: 1px solid rgb(22, 133, 11); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        <p style="color: rgb(22, 133, 11);">
                                            Av. Reales tamarindos y álamos
                                        </p><!--DIRECCION-->
                                        <!--TELEFONOS-->
                                        Telefonos: <br><!--ELEMENTOS Y TITULO-->
                                        +593-98 338-8382<br>
                                        +593-5 244-0102<br>
                                        +593-5 244-2180
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <!--LINEA SEPARADORA-->
                        <div class="lineseparehide" style="border-bottom: 2px solid #fff; width:90%; margin-left:5%;"></div>
                        <div class="col-md-6 col-sm-12 pt-3 pb-4">
                            <a class="datamap" data-lat="-1.055040" data-lon="-80.455953" href="#">
                            <div class="row d-flex justify-content-center" style="color: rgb(98, 167, 42);">
                                <div class="col-2-5 pr-0 text-right">
                                    <img class="icim" src="{{url('img/icons/ico_caj.svg')}}">
                                    <img class="icim" src="{{url('img/icons/ico_ubi.svg')}}">
                                </div>
                                <div class="col-6">
                                    <div class="w-100 px-2 elveticaboldfont datamaptitle" style="border-left: 1px solid rgb(14, 105, 55); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        AGENCIA PORTOVIEJO <br><!--ELEMENTOS Y TITULO-->
                                        CajeroAutomáticoBCM
                                    </div>
                                    <div class="w-100 px-2 mt-1 elveticafont" style="border-left: 1px solid rgb(22, 133, 11); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        <p style="color: rgb(22, 133, 11);">
                                            Av. Manabí y Alajuela
                                        </p><!--DIRECCION-->
                                        <!--TELEFONOS-->
                                        Telefonos: <br><!--ELEMENTOS Y TITULO-->
                                        +593-5 263-2222<br>
                                        +593-5 263-2223<br>
                                        Fax:<br>
                                        +593-5 263-5527<br>
                                        Casilla Postal:<br>
                                        13-01-0381
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!--LINEA SEPARADORA-->
                        <div style="border-bottom: 2px solid #fff; width:90%; margin-left:5%;"></div>

                        <div class="col-md-6 col-sm-12 pt-3 pb-4 rigthline">
                            <a class="datamap" data-lat="-0.9475717" data-lon="-80.7219906" href="#">
                            <div class="row d-flex justify-content-center" style="color:rgb(98, 167, 42);">
                                <div class="col-2-5 pr-0 text-right">
                                    <img class="icim" src="{{url('img/icons/ico_caj.svg')}}">
                                    <img class="icim" src="{{url('img/icons/ico_ubi.svg')}}">
                                </div>
                                <div class="col-6">
                                    <div class="w-100 px-2 elveticaboldfont datamaptitle" style="border-left: 1px solid rgb(14, 105, 55); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        SUCURSAL MANTA <br><!--ELEMENTOS Y TITULO-->
                                        CajeroAutomáticoBCM
                                    </div>
                                    <div class="w-100 px-2 mt-1 elveticafont" style="border-left: 1px solid rgb(22, 133, 11); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        <p style="color: rgb(22, 133, 11);">
                                            Calle 9 y Av. 2 
                                        </p><!--DIRECCION-->
                                        <!--TELEFONOS-->
                                        Teléfono:<br>
                                        +593-5 262-6060<br>
                                        Telefax:<br>
                                        +593-5 262-6040
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <!--LINEA SEPARADORA-->
                        <div class="lineseparehide" style="border-bottom: 2px solid #fff; width:90%; margin-left:5%;"></div>
                        <div class="col-md-6 col-sm-12 pt-3 pb-4">
                            <a class="datamap" data-lat="-0.959889" data-lon="-80.690525" href="#">
                            <div class="row d-flex justify-content-center" style="color: rgb(98, 167, 42);">
                                <div class="col-2-5 pr-0 text-right">
                                    <img class="icim" src="{{url('img/icons/ico_caj.svg')}}">
                                    <img class="icim" src="{{url('img/icons/ico_ubi.svg')}}">
                                </div>
                                <div class="col-6">
                                    <div class="w-100 px-2 elveticaboldfont datamaptitle" style="border-left: 1px solid rgb(14, 105, 55); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        AGENCIA MANTA <br><!--ELEMENTOS Y TITULO-->
                                        CajeroAutomáticoBCM
                                    </div>
                                    <div class="w-100 px-2 mt-1 elveticafont" style="border-left: 1px solid rgb(22, 133, 11); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        <p style="color: rgb(22, 133, 11);">
                                            Terminal Terreste<br>
                                            Vía Puerto - Aeropuerto,<br>
                                            localidad El Palmar
                                        </p><!--DIRECCION-->
                                        <!--TELEFONOS-->
                                        Celular:<br>
                                        +593-98 432-5935
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!--LINEA SEPARADORA-->
                        <div style="border-bottom: 2px solid #fff; width:90%; margin-left:5%;"></div>

                        <div class="col-md-6 col-sm-12 pt-3 pb-4 rigthline">
                            <a class="datamap" data-lat="-0.6970192" data-lon="-80.09613" href="#">
                            <div class="row d-flex justify-content-center" style="color:rgb(98, 167, 42);">
                                <div class="col-2-5 pr-0 text-right">
                                    <img class="icim" src="{{url('img/icons/ico_caj.svg')}}">
                                    <img class="icim" src="{{url('img/icons/ico_ubi.svg')}}">
                                </div>
                                <div class="col-6">
                                    <div class="w-100 px-2 elveticaboldfont datamaptitle" style="border-left: 1px solid rgb(14, 105, 55); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        SUCURSAL CHONE <br><!--ELEMENTOS Y TITULO-->
                                        CajeroAutomáticoBCM
                                    </div>
                                    <div class="w-100 px-2 mt-1 elveticafont" style="border-left: 1px solid rgb(22, 133, 11); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        <p style="color: rgb(22, 133, 11);">
                                            Bolívar y Atahualpa 
                                        </p><!--DIRECCION-->
                                        <!--TELEFONOS-->
                                        Teléfono:<br>
                                        +593-5 269-5973<br>
                                        Telefax:<br>
                                        +593-5 269-6921
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <!--LINEA SEPARADORA-->
                        <div class="lineseparehide" style="border-bottom: 2px solid #fff; width:90%; margin-left:5%;"></div>
                        <div class="col-md-6 col-sm-12 pt-3 pb-4">
                            <a class="datamap" data-lat="-0.603605" data-lon="-80.423593" href="#">
                            <div class="row d-flex justify-content-center" style="color: rgb(98, 167, 42);">
                                <div class="col-2-5 pr-0 text-right">
                                    <img class="icim" src="{{url('img/icons/ico_caj.svg')}}">
                                    <img class="icim" src="{{url('img/icons/ico_ubi.svg')}}">
                                </div>
                                <div class="col-6">
                                    <div class="w-100 px-2 elveticaboldfont datamaptitle" style="border-left: 1px solid rgb(14, 105, 55); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        AGENCIA BAHÍA <br><!--ELEMENTOS Y TITULO-->
                                        CajeroAutomáticoBCM
                                    </div>
                                    <div class="w-100 px-2 mt-1 elveticafont" style="border-left: 1px solid rgb(22, 133, 11); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        <p style="color: rgb(22, 133, 11);">
                                            Malecón y Ante
                                        </p><!--DIRECCION-->
                                        <!--TELEFONOS-->
                                        Teléfono:<br>
                                        +593-5 269-0207<br>
                                        Telefax:<br>
                                        +593-5 269-1141
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!--LINEA SEPARADORA-->
                        <div style="border-bottom: 2px solid #fff; width:90%; margin-left:5%;"></div>

                        <div class="col-md-6 col-sm-12 pt-3 pb-4 rigthline">
                            <a class="datamap" data-lat="-2.1908482" data-lon="-79.8831737" href="#">
                            <div class="row d-flex justify-content-center" style="color:rgb(98, 167, 42);">
                                <div class="col-2-5 pr-0 text-right">
                                    <img class="icim" src="{{url('img/icons/ico_caj.svg')}}">
                                    <img class="icim" src="{{url('img/icons/ico_ubi.svg')}}">
                                </div>
                                <div class="col-6">
                                    <div class="w-100 px-2 elveticaboldfont datamaptitle" style="border-left: 1px solid rgb(14, 105, 55); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        SUCURSAL GUAYAQUIL
                                    </div>
                                    <div class="w-100 px-2 mt-1 elveticafont" style="border-left: 1px solid rgb(22, 133, 11); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        <p style="color: rgb(22, 133, 11);">
                                            Baquerizo Moreno 1110<br>
                                            entre Fco. de P. Ycaza y<br>
                                            9 de Octubre
                                        </p><!--DIRECCION-->
                                        <!--TELEFONOS-->
                                        Teléfonos:<br>
                                        +593-4 256-4017<br>
                                        +593-4 256-4062
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <!--LINEA SEPARADORA-->
                        <div class="lineseparehide" style="border-bottom: 2px solid #fff; width:90%; margin-left:5%;"></div>
                        <div class="col-md-6 col-sm-12 pt-3 pb-4">
                            <a class="datamap" data-lat="-1.029219" data-lon="-80.344743" href="#">
                            <div class="row d-flex justify-content-center" style="color: rgb(98, 167, 42);">
                                <div class="col-2-5 pr-0 text-right">
                                    <img class="icim" src="{{url('img/icons/ico_caj.svg')}}">
                                </div>
                                <div class="col-6">
                                    <div class="w-100 px-2 elveticaboldfont datamaptitle" style="border-left: 1px solid rgb(14, 105, 55); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        PÚNTO DE ATENCIÓN ABDÓN CALDERÓN <br><!--ELEMENTOS Y TITULO-->
                                        CajeroAutomáticoBCM
                                    </div>
                                    <div class="w-100 px-2 mt-1 elveticafont" style="border-left: 1px solid rgb(22, 133, 11); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        <p style="color: rgb(22, 133, 11);">
                                            Exteriores de la Coop. de Ahorro y Crédito Abdón Calderón<br>
                                            Av. Eloy Alfaro frente al Parque Central 
                                        </p><!--DIRECCION-->
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!--LINEA SEPARADORA-->
                        <div style="border-bottom: 2px solid #fff; width:90%; margin-left:5%;"></div>

                        <div class="col-md-6 col-sm-12 pt-3 pb-4 rigthline">
                            <a class="datamap" data-lat="-1.207028" data-lon="-80.378583" href="#">
                            <div class="row d-flex justify-content-center" style="color:rgb(98, 167, 42);">
                                <div class="col-2-5 pr-0 text-right">
                                    <img class="icim" src="{{url('img/icons/ico_caj.svg')}}">
                                </div>
                                <div class="col-6">
                                    <div class="w-100 px-2 elveticaboldfont datamaptitle" style="border-left: 1px solid rgb(14, 105, 55); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        PÚNTO DE ATENCIÓN SANTA ANA <br><!--ELEMENTOS Y TITULO-->
                                        CajeroAutomáticoBCM
                                    </div>
                                    <div class="w-100 px-2 mt-1 elveticafont" style="border-left: 1px solid rgb(22, 133, 11); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        <p style="color: rgb(22, 133, 11);">
                                            Entrada de la ciudad<br>
                                            Estación de Servicios "Santa María"<br>
                                            Av. Luis Alberto Giler - Entrada a la Ciudad
                                        </p><!--DIRECCION-->
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <!--LINEA SEPARADORA-->
                        <div class="lineseparehide" style="border-bottom: 2px solid #fff; width:90%; margin-left:5%;"></div>
                        <div class="col-md-6 col-sm-12 pt-3 pb-4">
                            <a class="datamap" data-lat="-1.046727" data-lon="-80.455371" href="#">
                            <div class="row d-flex justify-content-center" style="color: rgb(98, 167, 42);">
                                <div class="col-2-5 pr-0 text-right">
                                    <img class="icim" src="{{url('img/icons/ico_caj.svg')}}">
                                </div>
                                <div class="col-6">
                                    <div class="w-100 px-2 elveticaboldfont datamaptitle" style="border-left: 1px solid rgb(14, 105, 55); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        PÚNTO DE ATENCIÓN UTM <br><!--ELEMENTOS Y TITULO-->
                                        CajeroAutomáticoBCM
                                    </div>
                                    <div class="w-100 px-2 mt-1 elveticafont" style="border-left: 1px solid rgb(22, 133, 11); color: rgb(14, 105, 55); font-size:11px; font-style:bold;">
                                        <p style="color: rgb(22, 133, 11);">
                                            Exteriores de la Universidad Técnica de Manabí<br>
                                            Av. Urbina y Che Guevara junto a la Mutualista Pichincha
                                        </p><!--DIRECCION-->
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>

            <!--SEPARADOR TEXTO-->
            <div class="col-md-12 pb-3" style="z-index: 100; margin-bottom:0px"></div>
            <!--FIN CONTENEDOR TARJETAS-->
            @include('public.layouts.footersub')
        </div>
    </div>
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYJO2PChEbwGdiy5NKxl7m5tAeFaMOIFg&callback=initMap">
    </script>
    <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
    <script>
        /************************INICIA CODIGO UBICACION*********************/
        function initMap() {
            var myLatlng = {lat: -1.0468064, lng: -80.4639659};
            var map = new google.maps.Map(
                document.getElementById('map'), {
                    scrollwheel: true,
                    zoom: 7, 
                    center: myLatlng});

            /*var infoWindow = new google.maps.InfoWindow(
                {content: 'Clic sobre el mapa para seleccionar su ubicación!', position: myLatlng});*/

            var labels  = [];
            var locations=[];
            $(".datamap").each(function( key, value ) {
                var title=$(value).find(".datamaptitle").text().trim();
                title=title.indexOf("\n")==-1?title:title.substring(0,title.indexOf("\n"));
                labels[key]=title;
    
                locations[key]={lat: parseFloat( $(value).attr("data-lat")), lng: parseFloat( $(value).attr("data-lon"))}
            });

            const markers = locations.map((location, i) => {
                marker=new google.maps.Marker({
                    position: location,
                    label: {
                        text:labels[i], 
                        color: "000",
                        fontWeight: 'bold',
                        fontSize: '14px',
                    },
                    icon: {
                        url: "{{url('img/m1.png')}}",
                        labelOrigin: new google.maps.Point(20, -8)
                    }
                });

                google.maps.event.addListener(marker, 'click', function(mapsMouseEvent) {
                    map.panTo(mapsMouseEvent.latLng);
                    map.setZoom(18);
                });

                return marker;
            });

            

            $(".datamap").on("click",function (e){
                var Latlng={lat: parseFloat( $(this).attr("data-lat")), lng: parseFloat( $(this).attr("data-lon"))};
                $("html, body").animate({ scrollTop: 0 }, "slow");
                map.panTo(Latlng);
                map.setZoom(18)
                e.preventDefault()
                return;
            });

            var mcOptions = {
                //imagePath: 'https://googlemaps.github.io/js-marker-clusterer/images/m',
                styles:[{
                    url: "{{url('img/m2.png')}}",
                    width: 30,
                    height:40,
                    //backgroundPosition:'0 5',
                    anchorText: [-5,0],
                    fontFamily:"comic sans ms",
                    textSize:15,
                    textColor:'#fff' //#35cb79
                }]
            };
            
            marker=new MarkerClusterer(map, markers, mcOptions);
        }
    </script>
@endsection