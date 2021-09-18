@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('models/emails.plural')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card border-success">
                         <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            @lang('models/emails.plural')
                            @if(Auth::user()->hasAnyRole(['root']) && Auth::user()->estado=="active")
                                <a class="fa-pull-right ml-2" href="{{ route('emails.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                            @endif
                            <a class="fa-pull-right" href="{{ route('emails.masive') }}" title="Envio de correos masívos"><i class="fas fa-paper-plane fa-lg"></i></a>

                            @if(Auth::user()->hasAnyRole(['root']) && Auth::user()->estado=="active")
                                <a class="fa-pull-right mr-2" href="#" title="Buscar elemento" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-search fa-lg"></i></a>
                            @endif
                         </div>
                         <div class="card-body">
                             @include('emails.table')
                              <div class="fa-pull-right ml-3 mr-3 mt-2">
                                     
                                @include('coreui-templates::common.paginate', ['records' => $emails])

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header py-2">
                    <h5 class="modal-title" id="exampleModalLabel">Ventana de busqueda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['id' => 'frmsearch','route' => 'emails.post.index', 'method' => 'patch']) !!}
                        <div class="form-group">
                            <input placeholder="Dato a buscar" type="text" class="form-control" id="search" name="search">
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer py-2">
                    <button type="button" class="btn btn-primary" id="btn_buscar">Buscar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

