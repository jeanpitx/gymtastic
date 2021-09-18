@extends('layouts.app')

@section('content')
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Carrusel</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                 @include('flash::message')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card border-success">
                             <div class="card-header">
                                 <i class="fa fa-align-justify"></i>
                                 Carruseles
                                 <a class="fa-pull-right" href="{{ route('carousel.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                             </div>
                             <div class="card-body">
                                    @include('carousel.table')
                                    <div class="fa-pull-right ml-3 mr-3 mt-2">
                                         
    @include('coreui-templates::common.paginate', ['records' => $carousel])
    
                                  </div>
                             </div>
                         </div>
                      </div>
                 </div>
             </div>
        </div>
@endsection

