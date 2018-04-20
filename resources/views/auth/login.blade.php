<!DOCTYPE html>
<html>
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>App | Inventario </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}"> 
        <!-- Ionicons -->
    <link rel="stylesheet" href=" {{ asset('bower_components/Ionicons/css/ionicons.min.css') }} ">
        <!-- Theme style -->
    <link rel="stylesheet" href=" {{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>PREDHESCA </b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicio de Sesión </p>
    {!! Form::open(['route'=>'auth.login','method'=>'POST']) !!}
    	<div class="form-group has-feedback">
    		{!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email','required']) !!}
	        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	    </div>
	    <div class="form-group has-feedback">
    		{!! Form::password('password',['class'=>'form-control','placeholder'=>'Contraseña','required']) !!}
	        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
	    </div>
	    <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Recordar Contraseña
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
        	{!! Form::submit('Iniciar Sesión',['class'=>'btn btn-primary']) !!}
        </div>
        <!-- /.col -->
      </div>
    {!! Form::close() !!}
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src=" {{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src=" {{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.7 --> 
<script src=" {{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src=" {{ asset('plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
