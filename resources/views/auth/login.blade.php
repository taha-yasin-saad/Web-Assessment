<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/admin/')}}/plugins/images/favicon.png">
<title>Login</title>
<!-- Bootstrap Core CSS -->
<link href="{{asset('assets/admin/')}}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="{{asset('assets/admin/')}}/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{asset('assets/admin/')}}/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="{{asset('assets/admin/')}}/css/colors/default.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>


<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
      <div class="lg-info-panel" style="background:url(assets/admin/plugins/images/login-register.jpg) center center/cover no-repeat!important;width:500px;height:100%;position:fixed">
              <div class="inner-panel">
                  <a href="javascript:void(0)" class="p-20 di"><img src="{{asset('assets/admin/plugins/images/admin-logos.png')}}" width="50px"></a>
                  <div class="lg-content">
                      <h2>Login Assessment</h2>
                      <a href="#" class="btn btn-rounded btn-warning p-l-20 p-r-20"> Login Assessment</a>
                  </div>
              </div>
      </div>
      <div class="new-login-box">
                <div class="white-box">
                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h3 class="box-title m-b-0">Login</h3>
                  <form class="form-horizontal new-lg-form" id="loginform" method="post" action="{{ url('/login') }}">
                    {{csrf_field()}}
                    <div class="form-group  m-t-20">
                      <div class="col-xs-12">
                        <label>E-Mail / Username</label>
                        <input class="form-control" type="text" required="" name="email" placeholder="E-Mail / Username">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>Password</label>
                        <input class="form-control" type="password" required="" name="password" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-danger pull-left p-t-0">
                              <input id="checkbox-signup" checked="" name="remember" type="checkbox">
                              <label for="checkbox-signup">Remember me</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                      <div class="col-xs-12">
                        <button class="btn  btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit" style="    background-color: rgb(230,116,72); color: #fff;">Login</button>
                      </div>
                    </div>
                    
                    <div class="form-group m-b-0">
                      <div class="col-sm-12 text-center">
                        <p><a href="{{url('register')}}" class="text-primary m-l-5"><b>Register</b></a></p>
                        
                      </div>
                    </div>
                  </form>
                </div>
      </div>            
  
  
</section>
<!-- jQuery -->
<script src="{{asset('assets/admin/')}}/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('assets/admin/')}}/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{asset('assets/admin/')}}/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="{{asset('assets/admin/')}}/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="{{asset('assets/admin/')}}/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('assets/admin/')}}/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="{{asset('assets/admin/')}}/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<style type="text/css">
  .btn-lang {
      position: fixed;
      right: 0px;
      top: 0;
      z-index: 100;
  }
</style>
</body>
</html>