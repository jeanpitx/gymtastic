@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('enlaces.index') !!}">@lang('models/enlaces.singular')</a>
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
                              <strong>@lang('crud.edit') @lang('models/enlaces.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($enlace, ['route' => ['enlaces.update', $enlace->id_enlace], 'method' => 'patch']) !!}

                              @include('enlaces.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection