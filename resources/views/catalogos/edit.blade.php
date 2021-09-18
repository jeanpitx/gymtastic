@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('catalogos.index') !!}">@lang('models/catalogos.singular')</a>
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
                              <strong>@lang('crud.edit') @lang('models/catalogos.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($catalogo, ['route' => ['catalogos.update', $catalogo->id_catalogo], 'method' => 'patch']) !!}
                                    @include('catalogos.fields')
                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection