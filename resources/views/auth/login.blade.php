<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>MaterialLab - jQuery full version</title>
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
      <div id="register_wrapper">
        <ul class="card-actions icons right-top">
          <li>
            <a href="javascript:void(0)" data-toggle="register">
              <i class="zmdi zmdi-close"></i>
            </a>
          </li>
        </ul>
        <div class="logo">
            <img src="assets/img/logo/ml-logo.png" alt="logo" class="logo-img">
        </div>
        <h1 class="login-title">
          Create an account
        </h1>
        <div class="login-body">
                    <div class="col-xs-12">
                        <button class="btn btn-facebook btn-block"><i class="zmdi zmdi-facebook"></i> Sign Up with Facebook</button>
                    </div>
                    <div class="col-xs-12">
                        <button class="btn btn-google btn-block"><i class="zmdi zmdi-google-plus"></i> Sign Up with Google</button>
                    </div>
                    <div class="col-xs-12">
                        <button class="btn btn-twitter btn-block"><i class="zmdi zmdi-twitter"></i> Sign Up with Twitter</button>
                    </div>

          <form class="clear-both">
                        <h2 class="text-center p-t-20">
                            Or sign up below
                        </h2>
            <div class="form-group label-floating is-empty">
              <label class="control-label">Name</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group label-floating is-empty">
              <label class="control-label">Email</label>
              <input type="email" class="form-control">
            </div>
            <div class="form-group label-floating is-empty">
              <label class="control-label">Password</label>
              <input type="password" class="form-control">
            </div>
            <div class="form-group label-floating is-empty">
              <label class="control-label">Confirm Password</label>
              <input type="password" class="form-control">
            </div>
            <div class="checkbox inline-block">
              <label>
                <input type="checkbox" class="checkbox-inline" value="">
                I agree to the <a href="javascript:void(0)">terms of services</a>
              </label>
            </div>
            <a href="javascript:void(0)" class="btn btn-info btn-block m-t-40">Create my account</a>
          </form>
        </div>
        <div class="login-footer p-15">
          <p>
            Already have an account? <a href="javascript:void(0)" data-toggle="register">Sign In</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/app.bundle.js') }}"></script>
</body>
</html>