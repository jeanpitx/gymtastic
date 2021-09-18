<div class="">
    <table class="table table-hover" id="carousel-table">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <!--<th>Botón</th>-->
                <th>Enlace</th>
                <th colspan="3">{{ __('Action') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($carousel as $carrusel)
            <tr>
                <td>{!! $carrusel->titulo !!}</td>
                <td>{!! $carrusel->descripcion !!}</td>
                <td><img src="{!! $carrusel->url_imagen !!}" class="d-block w-100 img-zoomable"></td>
                <!--<td>{!! ($carrusel->indicador_btn==1)?'Activo':'Inactivo'!!}</td>-->
                <td>{!! ($carrusel->link=='#')?'Sin enlace':$carrusel->link !!}</td>
                <td>
                    {!! Form::open(['route' => ['carousel.destroy', $carrusel->id_carousel], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a title="{{ __('View') }}" href="{!! route('carousel.show', [$carrusel->id_carousel]) !!}" class='btn btn-primary btn-sm'><i class="fa fa-eye"></i></a>
                        <a title="{{ __('Update') }}" href="{!! route('carousel.edit', [$carrusel->id_carousel]) !!}" class='btn btn-warning btn-sm'><i class="fa fa-pencil-alt"></i></a>
                        {!! Form::button('<i class="fa fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('¿Está seguro  que desea eliminar?')", 'title' => __('Delete')]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>