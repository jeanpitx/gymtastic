@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Solicitudes')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-success">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            @lang('Solicitudes') - 
                            <a href="{{route('solicita')}}" target="_blank">Sitio Solicitudes</a>
                            
                            @if(Auth::user()->hasAnyRole(['root']))
                                <a class="fa-pull-right ml-2" href="{{ route('solicitudes.create') }}" title="Añadir Solicitud"><i class="fa fa-plus-square fa-lg"></i></a>
                            @endif
                            
                            <div  class="fa-pull-right dropleft">
                                <a class="fa-pull-right" data-toggle="dropdown" href="{{ route('solicitudes.create') }}" title="Crear"><i class="fa fa-cog fa-lg"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('printall',1)}}" target="_blank">Reporte Completo</a>
                                    <a class="dropdown-item" href="{{route('printall',2)}}" target="_blank">Reporte Aprobadas</a>
                                    <a class="dropdown-item" href="{{route('printall',3)}}" target="_blank">Reporte Rechazadas</a>
                                    <a class="dropdown-item" href="{{route('printall',4)}}" target="_blank">Reporte nuevas</a>
                                </div>
                            </div>
                            <a class="fa-pull-right mr-2" href="#" title="Buscar Solicitud" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-search fa-lg"></i></a>
                        </div>
                        <div class="card-body">
                            @include('solicitudes.table')
                            <div class="fa-pull-right ml-3 mr-3 mt-2">
                                    
                            @include('coreui-templates::common.paginate', ['records' => $solicitudes])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title" id="exampleModalLabel">Ventana de busqueda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['id' => 'frmsearch','route' => 'solicitudes.post.index', 'method' => 'patch']) !!}
                        <div class="form-group">
                            <input placeholder="Cedula a buscar" type="text" class="form-control" id="cedulasearch" name="cedulasearch" maxlength="10" minlength="10">
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer py-2">
                    <button type="button" class="btn btn-primary" id="btn_buscar">Buscar Solicitud</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#exampleModal').on('shown.bs.modal', function (e) {
            $('#cedulasearch').focus();
        });
        $('#exampleModal').on('hidden.bs.modal', function (e) {
            $('#cedulasearch').val("");
        });
        $('#btn_buscar').on('click',function(){//CODIGO BUSCAR
            if($('#cedulasearch').val().length!==10){
                $('#cedulasearch').focus();
                $('#cedulasearch')[0].reportValidity();
            }else{
                $('#exampleModal').modal('hide');
                $('#frmsearch').submit();
            }
        });
        $('#cedulasearch').on('keypress',function(e) {
            if(e.which == 13 && $('#cedulasearch').val().length==10) {
                $('#btn_buscar').trigger("click");
                e.preventDefault();
                return;
            }
        });
    </script>
@endsection

