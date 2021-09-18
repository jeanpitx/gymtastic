@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 2%">
                <div class="card" style="width: 40rem;">
                    <div class="card-body">
                        <form method="post" action="{{ route('password.post_expired') }}">
                            @csrf
                            <h4 class="card-title">{!! __('Reset Password') !!}</h4>
                            <p class="text-muted">@lang('Reset your password')</p>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    @lang(session('status')) 
                                    <a href="{{route('home')}}">@lang('Return to homepage')</a>
                                </div>
                            @endif

                            @if(Carbon\Carbon::now()->diffInDays(Auth::user()->password_changed_at) >= config('auth.password_expires_days'))
                                <div class="alert alert-info">
                                    @lang('Your password has expired, please change it.')
                                </div>
                            @endif
                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="icon-lock"></i>
                                  </span>
                                </div>
                                <input type="password" data-toggle="password" class="form-control {{ $errors->has('current_password')?'is-invalid':''}}" name="current_password" placeholder="@lang('auth.current_password')">
                                    
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div> 

                                @if ($errors->has('current_password'))
                                    <span class="invalid-feedback">
                                        <strong>@lang($errors->first('current_password'))</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="icon-lock"></i>
                                  </span>
                                </div>
                                <input type="password" data-toggle="password" class="form-control {{ $errors->has('password')?'is-invalid':''}}" name="password" placeholder="@lang('auth.password')">
                                    
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>@lang($errors->first('password'))</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="icon-lock"></i>
                                  </span>
                                </div>
                                <input type="password" data-toggle="password" name="password_confirmation" class="form-control" placeholder="@lang('auth.confirm_password')">
                                    
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                      <strong>@lang($errors->first('password_confirmation'))</strong>
                                   </span>
                                @endif
                            </div>
                            
                            
                            <button type="submit" class="btn btn-block btn-info btn-flat">@lang('Reset Password')</button>
                            @if(Carbon\Carbon::now()->diffInDays(Auth::user()->password_changed_at) < config('auth.password_expires_days'))
                                <a href="{{route('home')}}" class="btn btn-block btn-secondary btn-flat">
                                    @lang('Return to homepage')
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection