
<div class="col-md-12 col-lg-12 pl-0 pl-lg-4 pr-0">
	<div id="carouselPrincipal" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				@if($carousel->id_enlace)
				<a href="{{url($carousel->Enlace()->first()->estado=="A"?$carousel->Enlace()->first()->url:"/mantenimiento")}}" target="{{$carousel->Enlace()->first()->metodo}}">
				@endif
				<img src="{{url($carousel->url_imagen)}}" class="d-block w-100" alt="{{$carousel->titulo}}">
				@if($carousel->id_enlace)
					</a>
				@endif
			</div>
		</div>
		
		<a class="carousel-control-prev" href="#carouselPrincipal" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Anterior</span>
		</a>
		<a class="carousel-control-next" href="#carouselPrincipal" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Siguiente</span>
		</a>
	</div>
</div>

<div class="row">
	<!-- Fecha Creación Field -->
	<div class="ml-2 col-6 form-group">
		<b>{!! Form::label('created_at', 'Fecha Creación:') !!}</b>
		<p>{!! $carousel->created_at !!}</p>
	</div>

	<!-- Fecha Actualización At Field -->
	<div class="col-5 form-group">
		<b>{!! Form::label('updated_at', 'Fecha Actualización:') !!}</b>
		<p>{!! $carousel->updated_at !!}</p>
	</div>
</div>