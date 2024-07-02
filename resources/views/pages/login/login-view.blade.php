<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>AdminLTE 3 | Log in (v2)</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
        <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2.0/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/adminlte-3.2.0/dist/css/adminlte.min.css?v=3.2.0') }}">
    </head>
    <body class="login-page" style="min-height: 463.333px;">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="#" class="h1">
                        <b>Hotel System </b>
                    </a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form action="/do-login" method="post">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="alert alert-danger d-none">
                            {{ $status }}
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                        </div>
                    </form>
                    <div class="social-auth-links text-center mt-2 mb-3">
                        <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook </a>
                        <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+ </a>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/adminlte-3.2.0/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/adminlte-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/adminlte-3.2.0/dist/js/adminlte.min.js?v=3.2.0') }}"></script>

        <script>
            const errorMsg = '{{ $status }}';

            if( errorMsg != '') {
                $('.alert').text(errorMsg);
                $('.alert').fadeIn();
                $('.alert').removeClass('d-none');
            }
        </script>
    </body>
</html>