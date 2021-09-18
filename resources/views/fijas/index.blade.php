@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('models/fijas.plural')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card border-success">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             @lang('models/fijas.plural')
                             @if(Auth::user()->hasAnyRole(['root']))
                                <a class="fa-pull-right" href="{{ route('fijas.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                             @endif
                         </div>
                         <div class="card-body">
                             @include('fijas.table')
                              <div class="fa-pull-right ml-3 mr-3 mt-2">
                                     
        @include('coreui-templates::common.paginate', ['records' => $fijas])

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

