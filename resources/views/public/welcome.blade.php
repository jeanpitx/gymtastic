@extends('public/layouts.app')

@section('content')
    <div class="container" style="background: rgb(241, 241, 241)"> <!--p4-4 da un espacio arriba del contenido-->
        <div class="row">
            <div class="col-12">
                {!! Html::image(url('img/meta.png'), 'La meta', ['class' => 'img-fluid','style' => 'width:100%']) !!}
                {!! Html::image(url('img/juntos.png'), 'Empecemos juntos', ['class' => 'img-fluid','style' => 'width:100%']) !!}
            </div>
        </div>
    </div>
@endsection
