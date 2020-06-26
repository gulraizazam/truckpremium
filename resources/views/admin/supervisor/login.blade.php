<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Truck Premium</title>

  <!-- Bootstrap CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{asset('css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />

  <style type="text/css">
	  	p.text-danger {
		    color: red !important;
		}
  </style>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-img3-body">

  <div class="container">

    <form method="POST" class="login-form" action="{{route('actLogin')}}">
      @csrf
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        @if(session()->has('errMsg'))
			<p class="text-danger">{{session()->get('errMsg')}}</p>
		@endif
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" name="email" placeholder="Email" autofocus required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <!-- <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label> -->
        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->
      </div>
    </form>
     
  </div>


</body>

</html>
