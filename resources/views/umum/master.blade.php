<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Euforia Resto</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,600,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset ('adminlte/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset ('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset ('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/genosstyle.css') }}" rel="stylesheet" />

</head>

<body>

    <div class="wrapper">

        <div class="headermenu">
            <div class="p-5">
                <h2 class="text-white"> Euforia Resto </h2>
                <h2 class="text-white"> Nama Pelanggan </h2>
                <h4 class="text-white  align-text-bottom"> Silahkan pilih pesanan anda </h4>
            </div>

        </div>

        <div id="content" class="container menumakanan">

            <nav class="navbar navbarfont navbar-expand-lg navbar-inverse navbar-light bg-white rounded">
                <a class="navbar-brand" href="#">
                    <!-- <img src="{{ asset('/assets/gambar/logo2.png') }} " alt="logo" /> -->
                </a>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                    <ul class="navbar-nav  nav-tabs mr-auto w-100">
                        <li class="nav-item ">
                            <a id="makanan" class="nav-link  active" href="#" >Makanan </a>
                        </li>

                        <li class="nav-item ">
                            <a id="minuman" class="nav-link " href="#" >Minuman</a>
                        </li>

                        <li class="nav-item ">
                            <a id="snack" class="nav-link " href="#" >Snack</a>
                        </li>


                        <li class="search ml-auto">
                            <input class="form-control mr-sm-2" type="search" id="textcari" placeholder="Search" aria-label="Search">
                        </li>
                        <li class="nav-item  dropdown">
                            <a class="nav-link" href="#" data-widget="control-sidebar" data-slide="true">
                                Lihat Pesanan
                                <i class="fa fa-shopping-cart"></i>
                                <span class="badge badge-danger navbar-badge">3</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-light">
        <!-- Control sidebar content goes here -->
        <div class="p-5">
            <button class="btn btn-info" data-widget="control-sidebar"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            <button class="btn btn-danger pull-right" data-widget="control-sidebar"><i class="fa fa-trash" aria-hidden="true"></i></button>
            <h6 class="pt-5">Pesanan Anda</h6>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pesanan</th>
                        <th>Qty</th>
                        <th>Sub Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Beef</td>
                        <td>2</td>
                        <td>Rp 800.000</td>
                        <td>
                            <button class="btn btn-danger btn-sm pull-right" data-widget="control-sidebar"><i class="fa fa-close" aria-hidden="true"></i></button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Pizza</td>
                        <td>3</td>
                        <td>Rp 300.000</td>
                        <td>
                            <button class="btn btn-danger btn-sm pull-right" data-widget="control-sidebar"><i class="fa fa-close" aria-hidden="true"></i></button>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Cola</td>
                        <td>20</td>
                        <td>Rp 80.000</td>
                        <td>
                            <button class="btn btn-danger btn-sm pull-right" data-widget="control-sidebar"><i class="fa fa-close" aria-hidden="true"></i></button>
                        </td>
                    </tr>

                </tbody>
            </table>

            <h5 class="text-right"> Total: Rp 1.180.000</h5>
            <button class="btn btn-info pull-right mt-2" data-widget="control-sidebar">Check Out</button>

        </div>
    </aside>
    @yield('content')
    @yield('footer')

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset ('/adminlte/js/adminlte.js')}}"></script>

    @yield('script')


</body>

</html>
