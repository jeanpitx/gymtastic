@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 2%">
                <div class="card" style="width: 40rem;">
                    <div class="card-body">
                        <h4 class="text-success text-center">{{ config('app.name', 'Laravel') }}</h4>
                        <div style="width:100%; border: 1px solid #dfdfdf;"></div>
                        <h4 class="card-title">Bienvenido al sistema (administración portal web)</h4>
                        @if(Auth::user()->roles()->count()==0)
                            <p>No tiene ningun rol asignado, favor solicite la asignación de un rol al administrador.</p>
                        @else
                            <p>En el menú principal encontrala las opciones que necesita.</p>
                        @endif
                        <p class="text-muted">Opciones rapidas:</p>
                        <a class="btn btn-info" href="{{url('/')}}" target="_blank">
                            Visitar sitio web
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection