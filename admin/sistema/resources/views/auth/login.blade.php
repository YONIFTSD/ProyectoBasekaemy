<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>GOODYEAR</title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- CSS -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/fonts/fontawesome/css/all.min.css') }}" rel="stylesheet">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
</head>
<body class="ms-body ms-primary-theme ms-logged-out">
  <!-- Preloader -->
  <div id="preloader-wrap">
    <div class="spinner spinner-8">
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
    </div>
  </div>
  <!-- Main Content -->
  <main class="body-content">
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper ms-auth">
      <div class="ms-auth-container">
        <div class="ms-auth-col">
          <div class="ms-auth-bg"></div>
        </div>
        <div class="ms-auth-col">
          <div class="ms-auth-form">
            <form action="{{ route('dashboard-login') }}" method="POST" class="needs-validation" novalidate>
            <div class="text-left boxed-logo-l mb-4 mb-md-5">
                <img class="img-fluid" src="{{ asset('assets/img/logo-84x41.png') }}">
            </div>
              <h3>Inicie sesión</h3>
              <p>Por favor ingrese su correo electrónico y contraseña para continuar</p>
              <div class="mb-3">
                <label>Correo electrónico</label>
                <div class="input-group">
                  <input type="email" name="username" class="form-control" required>
                  <div class="invalid-feedback">Por favor proporcione un correo electrónico válido.</div>
                </div>
              </div>
              <div class="mb-2">
                <label for="validationCustom09">Contraseña</label>
                <div class="input-group">
                  <input type="password" name="password" class="form-control" required>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="invalid-feedback">Por favor proporcione una contraseña.</div>
                </div>
              </div>
              <button class="btn btn-primary mt-4 d-block w-100 text-uppercase" type="submit">Iniciar sesión</button> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Scripts Start -->
  <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>