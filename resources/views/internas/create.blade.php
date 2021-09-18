@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('internas.index') !!}">@lang('models/internas.singular')</a>
      </li>
      <li class="breadcrumb-item active">@lang('crud.add_new')</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                @include('flash::message')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>@lang('crud.add_new') @lang('models/internas.singular')</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'internas.store']) !!}

                                   @include('internas.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
