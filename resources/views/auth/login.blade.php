<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Funbox | Entrar</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:300,400,500,600" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/img/logo/funboxlogo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme-b.css') }}">
</head>
<body id="auth_wrapper" >
  <div id="login_wrapper">
    <div id="login_content">
            <div class="logo">
                <img src="{{ asset('assets/img/logo/funboxlogo.png') }}" alt="logo" class="logo-img">
            </div>
      <h1 class="login-title">
        Iniciar sesión
      </h1>
      <div class="login-body">
        <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
          <div class="form-group label-floating is-empty">
            <label class="control-label">Correo</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group label-floating is-empty">
            <label class="control-label">Contraseña</label>
            <input type="password" class="form-control" name="password" required>
          </div>
          <a href="javascript:void(0)" class="forgot-pass pull-right">¿Olvidaste tu contraseña?</a>
          <div class="checkbox inline-block">
            <label>
              <input type="checkbox" class="checkbox-inline" {{ old('remember') ? 'checked' : '' }}>
              Recordarme
            </label>
          </div>
          <button type="submit" class="btn btn-info btn-block m-t-40">Iniciar</button>
        </form>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/app.bundle.js') }}"></script>
</body>
</html>