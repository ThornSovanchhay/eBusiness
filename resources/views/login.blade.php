<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  
    <title>User Login</title>
    <!-- Icons-->
    <link href="{{asset('admin-assets/vendors/@coreui/icons/css/coreui-icons.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/vendors/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/vendors/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{asset('admin-assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin-assets/vendors/pace-progress/css/pace.min.css')}}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app flex-row align-items-center">
    <form action="{{url('admin/login')}}" method="POST">
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-group">
                        <div class="card p-4">
                        <div class="card-body">
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="icon-user"></i>
                                </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Username" name='username' 
                                required autofocus>
                            </div>
                            <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="icon-lock"></i>
                                </span>
                            </div>
                            <input class="form-control" type="password" placeholder="Password" name="password" 
                                required>
                            </div>
                            <div class="row">
                            <div class="col-6">
                                <button class="btn btn-primary px-4" type="submit">Login</button>
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-link px-0" type="button">Forgot password?</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <div>
                            <h2>Sign up</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <button class="btn btn-primary active mt-3" type="button">Register Now!</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('admin-assets/vendors/jquery/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/popper.js/js/popper.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/pace-progress/js/pace.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin-assets/vendors/@coreui/coreui/js/coreui.min.js')}}"></script>
  </body>
</html>
