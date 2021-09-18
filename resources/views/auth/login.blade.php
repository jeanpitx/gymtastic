<!DOCTYPE html>
<html lang="es">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inicio de sesión</title>
    <meta name="description" content="CoreUI Template - InfyOm Laravel Generator">
    <meta name="keyword" content="CoreUI,Bootstrap,Admin,Template,InfyOm,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/css/coreui.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/coreui-icons-free@1.0.1-alpha.1/coreui-icons-free.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
</head>
<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <form method="post" action="{{ url('/login') }}">
                            @csrf
                            <h1>Inicio de sesión</h1>
                            <p class="text-muted">Iniciar sesión en su cuenta</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="icon-user"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" onkeypress="noCharacters(event);"
                                       placeholder="Usuario">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}" placeholder="Clave" name="password" onkeypress="noCharactersPassword(event);">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                       <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-success px-4" type="submit">Iniciar sesión</button>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-link px-0" style="color:#4dbd74" href="{{ url('/password/reset') }}">
                                        @lang('auth.login.forgot_password')
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-white bg-success py-5 d-md-down-none" style="width:10%">
                    <div class="card-body text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CoreUI and necessary plugins-->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>
<script type="text/javascript">
    function noCharacters(e)
    {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key);
        especiales = "39-60-62-61-40-41-92-47";//'<>=()/\

        tecla_especial = false;

        for(var i in especiales.split("-")){
            if(key == especiales.split("-")[i]){
                tecla_especial = true;
                break;
            }
        }

        if(tecla_especial){
            e.preventDefault();
        }

    }
    function noCharactersPassword(e)
    {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key);
        especiales = "39";//'<>=()/\

        tecla_especial = false;

        for(var i in especiales.split("-")){
            if(key == especiales.split("-")[i]){
                tecla_especial = true;
                break;
            }
        }

        if(tecla_especial){
            e.preventDefault();
        }

    }
</script>

</body>
</html>
