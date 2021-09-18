@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('menuPnivels.index') !!}">@lang('models/menuPnivels.singular')</a>
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
                              <strong>@lang('crud.edit') @lang('models/menuPnivels.singular')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($menuPnivel, ['route' => ['menuPnivels.update', $menuPnivel->id_menu_pnivel], 'method' => 'patch']) !!}

                              @include('menu_pnivels.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection