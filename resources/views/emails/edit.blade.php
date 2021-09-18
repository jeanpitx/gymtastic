@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('emails.index') !!}">@lang('models/emails.singular')</a>
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
                              <strong>@lang('crud.edit') @lang('models/emails.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($email, ['route' => ['emails.update', $email->id_email_cliente], 'method' => 'patch']) !!}

                              @include('emails.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection