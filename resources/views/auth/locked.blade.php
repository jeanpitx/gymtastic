@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 2%">
                <div class="card" style="width: 40rem;">
                    <div class="card-body">
                        <h4 class="card-title">{!! __('Your account is locked') !!}</h4>
                        <p class="card-text">{!! __('Please verify your account or contact the administrator, the account you are trying to access is blocked.') !!}</p>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">{!! __('Logout') !!}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection