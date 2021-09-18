@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('footers.index') }}">Pie de página</a>
            </li>
            <li class="breadcrumb-item active">Detalle</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Detalle</strong>
                                 <a href="#" onclick="goBack()" class="btn btn-link">@lang('crud.Back')</a>
                             </div>
                             <div class="card-body row">
                                 @include('footers.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
