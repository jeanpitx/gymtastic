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
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>@lang('crud.add_new') @lang('models/roles.parent')</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'roles.store']) !!}

                                    <!-- User Id Field -->
                                    <div class="form-group">
                                        {!! Form::label('name', __('models/roles.fields.user').':') !!}
                                        {!! Form::text('name', null, ['class' => 'form-control'.($errors->has('name')?'is-invalid':'')  ]) !!}
                                    </div>

                                    <!-- Email Field -->
                                    <div class="form-group">
                                        {!! Form::label('email', __('models/roles.fields.email').':') !!}
                                        {!! Form::email('email', old('email'), ['class' => 'form-control '.($errors->has('email')?'is-invalid':'') ]) !!}
                                        <i>{!! __('models/roles.fields.msg_mail') !!}</i>
                                    </div>

                                    <!-- Clave Temporal Field -->
                                    <div class="form-group">
                                        {!! Form::label('password', __('models/roles.fields.password').':') !!}
                                        {!! Form::text('password', null, ['class' => 'autogeneric form-control '.($errors->has('password')?'is-invalid':''), 'readonly']) !!}
                                        <i>{!! __('models/roles.fields.msg_key') !!}</i>
                                    </div>

                                    <!-- Submit Field -->
                                    <div class="form-group col-sm-12">
                                        {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                                        <a href="#" onclick="goBack()" class="btn btn-default">@lang('crud.cancel')</a>
                                    </div>


                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
