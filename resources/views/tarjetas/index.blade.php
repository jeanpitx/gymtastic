@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('models/tarjetas.plural')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card border-success">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             @lang('models/tarjetas.plural')
                             <a class="fa-pull-right" href="{{ route('tarjetas.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body pt-2">
                            <div class="row mb-2">
                                <div class="col-12">
                                    <small><b>Filtros:</b></small>
                                </div>
                                <div class="col-4">
                                    {!! Form::open(['id' => 'filterform','route' => 'tarjetatype']) !!}
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span  class="input-group-text">Tipo Tarjeta:</span>
                                            </div>
                                            {!! Form::select('tipo_tarjeta', ['all'=>'Todos','tarjeta'=>'Tarjeta','circular'=>'Circular'],$tipo_tarjeta??$tipo_tarjeta,['class'=>'custom-select']) !!}
                                            <span class="invalid-feedback">{{ $errors->first('filtro_ciudad') }}</span>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>  
                            @include('tarjetas.table')
                            <div class="fa-pull-right ml-3 mr-3 mt-2">
                                @include('coreui-templates::common.paginate', ['records' => $tarjetas])
                            </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
    <script>
        $("select[name=tipo_tarjeta]").on("change", function (){
            $("#filterform").submit();
        });
    </script>
@endsection

