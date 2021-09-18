@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('models/postulaciones.plural')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-success">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            @lang('models/postulaciones.plural') - 
                            <a href="{{route('solicita')}}" target="_blank">Sitio postulaciones</a>
                            @if(Auth::user()->hasAnyRole(['root']))
                                <a class="fa-pull-right" href="{{ route('postulaciones.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                            @endif
                        </div>
                        <div class="card-body pt-2">
                            <div class="row mb-2">
                                <div class="col-12">
                                    <small><b>Filtros:</b></small>
                                </div>
                                <div class="col-4">
                                    {!! Form::open(['id' => 'filterform','route' => 'postulacionestype']) !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Ciudad</span >
                                            </div>
                                            {!! Form::select('filtro_ciudad', $ciudad ,$filtro_ciudad??$filtro_ciudad,['class'=>'custom-select filtro_ciudad']) !!}
                                            <span class="invalid-feedback">{{ $errors->first('filtro_ciudad') }}</span>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            @include('postulaciones.table')

                            <div class="fa-pull-right ml-3 mr-3 mt-2">
                                @include('coreui-templates::common.paginate', ['records' => $postulaciones])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //corrige error en paginacion cuando se filtra por un elemento
        $("a.page-link").on("click", function (){
            //filtro ciudad
            $(this).attr("href",$(this).attr("href") + "&filtro_ciudad=" + $("select[name=filtro_ciudad]").val());
        });

        $("select[name=filtro_ciudad]").on("change", function (){
            $("#filterform").submit();
        });
    </script>
@endsection

