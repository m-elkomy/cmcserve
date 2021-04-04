<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Minaati is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, admin theme, bootstrap 4, responsive, sass support, ui kits, crm, ecommerce">
    <meta name="author" content="Themesbox17">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{trans('admin.Login')}}</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Start css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="vertical-layout">
<!-- Start Containerbar -->
<div id="containerbar" class="containerbar authenticate-bg">
    <!-- Start Container -->
    <div class="container">
        <div class="auth-box login-box">
            <!-- Start row -->
            <div class="row no-gutters align-items-center justify-content-center">
                <!-- Start col -->
                <div class="col-md-6 col-lg-5">
                    <!-- Start Auth Box -->
                    <div class="auth-box-right">
                        <div class="card">
                            <div class="card-body">
                                @if(session()->has('error'))
                                    <div class="alert alert-danger">
                                        <h4>{{session('error')}}</h4>
                                    </div>
                                    @endif
                                <form method="post">
                                    {!! csrf_field() !!}
                                    <div class="form-head">
                                        <a href="{{url('/')}}" class="logo"><img src="{{\Illuminate\Support\Facades\Storage::url(setting()->logo)}}" class="img-fluid" alt="logo"></a>
                                    </div>
                                    <h4 class="text-primary my-4">{{trans('admin.Login')}} !</h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" placeholder="{{trans('admin.Email')}}" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" placeholder="{{trans('admin.Password')}}" name="password"  required>
                                    </div>
                                    <div class="form-row mb-3">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-checkbox text-left">
                                                <input type="checkbox" class="custom-control-input" id="rememberme" name="remember_me" value="1">
                                                <label class="custom-control-label font-14" for="rememberme">{{trans('admin.Remember Me')}}</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="forgot-psw">
                                                <a id="forgot-psw" href="{{url(aurl('forget/password'))}}" class="font-14">{{trans('admin.Forgot Password')}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-lg btn-block font-18">{{trans('admin.Login')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Auth Box -->
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
    </div>
    <!-- End Container -->
</div>
<!-- End Containerbar -->
<!-- Start JS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('assets/js/detect.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
<!-- End js -->
</body>
</html>
