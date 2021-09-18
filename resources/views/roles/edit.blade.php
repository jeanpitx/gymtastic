@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('models/roles.plural')</li>
    </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>@lang('crud.edit') @lang('models/roles.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($roleUser, ['route' => ['roles.update', $roleUser->id], 'method' => 'patch']) !!}

                              @include('roles.fields_update')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection