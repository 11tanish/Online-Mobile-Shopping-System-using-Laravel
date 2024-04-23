<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>::To Do App | Log in ::</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href={{asset("plugins/fontawesome-free/css/all.min.css")}}>
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href={{asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{asset("dist/css/adminlte.min.css")}}>
  
  <!-- Custom CSS -->
  <style>
    .login-page {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      width: 360px;
      margin: auto;
    }

    .card-outline {
      border: 2px solid #007bff; /* Set border color */
    }

    .card-header {
      background-color: #007bff; /* Set header background color */
      color: #fff; /* Set header text color */
    }

    .login-box-msg {
      font-size: 18px;
      text-align: center;
      margin-bottom: 20px;
    }

    .input-group-text {
      background-color: #007bff; /* Set input group text background color */
      border: 1px solid #007bff; /* Set input group text border color */
    }

    .btn-primary {
      background-color: #007bff; /* Set button background color */
      border-color: #007bff; /* Set button border color */
    }

    .btn-primary:hover {
      background-color: #0056b3; /* Set button hover background color */
      border-color: #0056b3; /* Set button hover border color */
    }

    .btn-block {
      display: block;
      width: 100%;
    }

    .btn-outline-primary {
      color: #007bff; /* Set button text color */
      border-color: #007bff; /* Set button border color */
    }

    .btn-outline-primary:hover {
      color: #0056b3; /* Set button hover text color */
      border-color: #0056b3; /* Set button hover border color */
    }
  </style>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition login-page" style="background-color: #2C3E50;">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
   @if($errors->any())
    @php echo "<script>
          Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Invalid Username Or Password'
          });
      </script>" @endphp
   @endif
    <div class="card-header text-center">
      <h1><b>Megashop </b></h1>
    </div>
    <div class="card-body">
      <p class="login-box-msg">"Unlock exclusive deals with your login now!"</p>
      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="{{ route('password.request') }}">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="/register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src={{asset("plugins/jquery/jquery.min.js")}}></script>
<!-- Bootstrap 4 -->
<script src={{asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
<!-- AdminLTE App -->
<script src={{asset("dist/js/adminlte.min.js")}}></script>
</body>
</html>
