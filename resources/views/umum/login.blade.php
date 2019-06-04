<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700&display=swap" rel="stylesheet">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/adminltebower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/adminlte/css/AdminLTE.min.css')}}">

    <script src="{{ asset('/js/sweetalert2.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('/css/sweetalert2.min.css')}}">
    <link href="{{ asset('/css/genosstyle.css') }}" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="bodylogin">

        @if(session('gagal'))
        <script>
            Swal.fire({
                type: 'error',
                title: '{{session('
                gagal ')}}!',
            })
        </script>
        @endif

        <div class="login-box" style="padding-top: 100px;margin-top: 0">
            <div class="login-logo">
                <a href="" ><b  style="color: white"> Euforia Resto</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Masukan User ID dan password anda</p>

                <form method="post" action="/postlogin">
                    {{csrf_field()}}
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="user_id" placeholder="User ID">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="text-right" style="width: 100%">
                            <button type="submit" class="btn btn-block btn-primary btn-flat">Login</button>
                        </div>

                        <p style="margin-top: 10px;font-family: 'Merriweather Sans', sans-serif;">Jika anda belum terdaftar bisa <a href="#">Daftar disini.</a> </p>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        </div>
    <!-- jQuery 3 -->
    <script src="{{ asset ('/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset ('/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- iCheck -->

</body>

</html>
