@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('solicitudes.index') !!}">@lang('models/solicitudes.singular')</a>
          </li>
          <li class="breadcrumb-item active">@lang('crud.edit')</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>@lang('crud.edit') @lang('models/solicitudes.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($solicitud, ['route' => ['solicitudes.update', $solicitud->id_solicitud], 'method' => 'patch']) !!}
                                <div class="row">
                                    @include('solicitudes.fields')
                                </div>
                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection