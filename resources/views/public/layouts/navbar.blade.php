@inject('service', 'App\Clases\Utilities')
<style>
    .dropdown-submenu,.dropdown-submenu a{
        background-color: transparent; !important;
    }
    .dropdown-submenu:hover,.dropdown-submenu a:hover{
        background-color: transparent !important;
    }
    
    @media (min-width: 0px) and (max-width: 450px) {
        .imgsize{
            width: 100%
        }
        .navbar-brand{
            width: 85% !important;
        }
    }
    @media (min-width: 450px) and (max-width: 1200px) {
        .imgsize{
            width: 310px
        }
    }
    @media (min-width: 1200px) {
        .imgsize{
            width: 350px
        }
    }
</style>
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" id="navbr">
    <div class="container">  
        <div class="navbar-brand mr-lg-4">
            <a href="{{ url('/') }}">
                {!! Html::image('img/logolr.svg', config('app.name', 'Laravel'), ['class' => 'img-fluid imgsize','id'=>'img-logo']) !!}
            </a>
        </div>
        
        <button class="navbar-toggler" style="color: rgb(0, 99, 41)" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse d-xl-flex justify-content-xl-end" id="navbarSupportedContent">
             <!--MENU PARA COMPUTADORAS-->
            <div class="d-none d-lg-block">
                <ul class="navbar-nav pb-sm-3 pb-lg-0" style="font-size:12px;font-family:cambria">
                    <li class="nav-item mr-sm-2 pb-sm-1 pb-lg-0 mx-lg-0 mx-xl-2">
                        <a class="nav-link navfont" href="{{url('/')}}" target="_self">
                            INICIO
                        </a>
                    </li>
                </ul>
            </div>
            
            <!--MENU PARA CELULARES-->
            <div class="d-lg-none">
                <ul class="navbar-nav pb-sm-3 pb-lg-0 text-center" style="font-size:12px;font-family:cambria">
                    <div class="dropdown d-flex justify-content-between">
                        <a class="ml-4" href="{{ url('/solicitud') }}">
                            {!! Html::image('img/logolrw.svg', config('app.name', 'Laravel'), ['class' => 'img-fluid', 'width'
                            =>'350','id'=>'img-logo']) !!}
                        </a>
                        <button class="btn btn-sm mr-sm-1 mr-sm-2 mr-xs-2 icobig-xs text-white" type="button" role="button" id="btn-close-nav" >
                            <i class="fas fa-times fa-lg"></i>
                        </button>
                    </div>
                    <li class="nav-item mr-sm-2 pb-sm-1 pb-lg-0 pt-2">
                        <h6 class="nav-link navfont text-white">MENÚ</h6>
                    </li>
                    <div style="margin-left:29%;width: 40%; border-bottom: 1px solid #cccccc;"></div><!--SEPARADOR-->
                    <li class="nav-item">
                        <a class="nav-link navfont text-white" href="{{url('/')}}" target="_self">
                            INICIO
                        </a>
                    </li>
                    <div style="margin-left:29%;width: 40%; border-bottom: 1px solid #cccccc;"></div><!--SEPARADOR-->
                </ul>
            </div>
        </div>
    </div>
</nav>
<script>
    //mueve el menú si es celular o computadora para que no se repitan los id
    if($(window).width()>991)
        $('#mnufloat').appendTo(".mnufloat-pc");
    else
        $('#mnufloat').appendTo(".mnufloat-mb");
    $( window ).resize(function(e) {
        if($(window).width()>991)
            $('#mnufloat').appendTo(".mnufloat-pc");
        else
            $('#mnufloat').appendTo(".mnufloat-mb");
    });


    //permite usar un submenu
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
        }
        var $subMenu = $(this).next('.dropdown-menu');
        $subMenu.toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass('show');
        });

        return false;
    });
</script>