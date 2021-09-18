@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('menuSnivels.index') }}">@lang('models/menuSnivels.singular')</a>
            </li>
            <li class="breadcrumb-item active">@lang('crud.detail')</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>@lang('crud.detail')</strong>
                                 <a href="#" onclick="goBack()" class="btn btn-link">@lang('crud.Back')</a>
                             </div>
                             <div class="card-body">
                                 @include('menu_snivels.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
