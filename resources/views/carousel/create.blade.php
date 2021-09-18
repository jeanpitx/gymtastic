@extends('layouts.app')

@section('content')
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
		<a href="{!! route('carousel.index') !!}">Carrusel</a>
		</li>
		<li class="breadcrumb-item active">@lang('crud.add_new')</li>
	</ol>
	<div class="container-fluid">
		<div class="animated fadeIn">
			@include('coreui-templates::common.errors')
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							<i class="fa fa-edit fa-lg"></i>
							<strong>@lang('crud.add_new') Carrusel</strong>
						</div>
						<div class="card-body">
							{!! Form::open(['route' => 'carousel.store', 'files' => true]) !!}

								@include('carousel.fields')

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection