@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('categorias.index') !!}">@lang('models/categorias.singular')</a>
          </li>
          <li class="breadcrumb-item active">@lang('crud.edit')</li>
    </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
            @include('flash::message')
            @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>@lang('crud.edit') @lang('models/categorias.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($categoria, ['route' => ['categorias.update', $categoria->id_category], 'method' => 'patch']) !!}

                              @include('categorias.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection