@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 2%">
                <div class="card" style="width: 40rem;">
                    <div class="card-body">
                        <h4 class="card-title">{!! __('Verify Your Email Address') !!}</h4>
                        @if (session('resent'))
                            <p class="alert alert-success" role="alert">{!! __('A fresh verification link has been sent to your email address') !!}</p>
                        @endif
                        <p class="card-text">
                            {!! __('Before proceeding, please check your email for a verification link.If you did not receive the email,') !!}
                            <i><a href="#" class="xs" onclick="$('#form-request-email').toggle('slow'); return false;">@lang('click here')</a></i>
                        </p>
                        <form id="form-request-email" method="POST" action="{{ route('verification.resend') }}" style="display: none">
                            @csrf
                            <input type="submit" class="btn btn-success" value="@lang('Click here to request it')"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection