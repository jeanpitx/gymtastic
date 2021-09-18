@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('postulaciones.index') !!}">@lang('models/postulaciones.singular')</a>
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
                              <strong>Edit @lang('models/postulaciones.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($postulacion, ['route' => ['postulaciones.update', $postulacion->id_postulacion], 'method' => 'patch']) !!}

                              @include('postulaciones.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection