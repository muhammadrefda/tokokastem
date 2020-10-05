<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">


    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <style>
        .drawing-area{
            position: absolute;
            top: 60px;
            left: 122px;
            z-index: 10;
            width: 200px;
            height: 400px;
        }

        .canvas-container{
            width: 200px;
            height: 400px;
            position: relative;
            user-select: none;
        }

        #tshirt-div{
            width: 452px;
            height: 548px;
            position: relative;
            background-color: #fff;
        }

        #canvas{
            position: absolute;
            width: 200px;
            height: 400px;
            left: 0px;
            top: 0px;
            user-select: none;
            cursor: default;
        }
    </style>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-text mx-3">Toko Kastem</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
    <!-- Divider -->
{{--        <hr class="sidebar-divider">--}}
        <!-- Nav Item - Tables -->
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{route('products.index')}}">--}}
{{--                <i class="fas fa-fw fa-table"></i>--}}
{{--                <span>Manage Product</span></a>--}}
{{--        </li>--}}


        <!-- Nav Item - Tables -->
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{route('order.index')}}">--}}
{{--                <i class="fas fa-fw fa-table"></i>--}}
{{--                <span>Manage Order</span></a>--}}
{{--        </li>--}}

{{--        <hr class="sidebar-divider">--}}

        <!-- Nav Item - Tables -->
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{route('promosi.index')}}">--}}
{{--                <i class="fas fa-fw fa-table"></i>--}}
{{--                <span>Daftar Orderan</span></a>--}}
{{--        </li>--}}

        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Daftar Orderan</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Orderan Kain</h6>
                    <a class="collapse-item" href="{{route('fabric.order.index.success')}}">Berhasil</a>
                    <a class="collapse-item" href="{{route('fabric.order.index')}}">Pending</a>
                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Orderan Masker:</h6>
                    <a class="collapse-item" href="{{route('mask.order.index.success')}}">Berhasil</a>
                    <a class="collapse-item" href="{{route('mask.order.index')}}">Pending</a>
                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Orderan Mug:</h6>
                    <a class="collapse-item" href="{{route('mug.order.index.success')}}">Berhasil</a>
                    <a class="collapse-item" href="{{route('mug.order.index')}}">Pending</a>
                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Orderan Tshirt:</h6>
                    <a class="collapse-item" href="{{route('tshirt.order.index.success')}}">Berhasil</a>
                    <a class="collapse-item" href="{{route('tshirt.order.index')}}">Pending</a>
                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Orderan Totebag:</h6>
                    <a class="collapse-item" href="{{route('totebag.order.index.success')}}">Berhasil</a>
                    <a class="collapse-item" href="{{route('totebag.order.index')}}">Pending</a>
                </div>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Orderan Tas:</h6>
                    <a class="collapse-item" href="{{route('bag.order.index.success')}}">Berhasil</a>
                    <a class="collapse-item" href="{{route('bag.order.index')}}">Pending</a>
                </div>
            </div>

        </li>

{{--        <hr class="sidebar-divider">--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTo" aria-expanded="true" aria-controls="collapseTo">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Orderan Masker</span>--}}
{{--            </a>--}}
{{--            <div id="collapseTo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <h6 class="collapse-header">Status Transaksi:</h6>--}}
{{--                    <a class="collapse-item" href="{{route('mask.order.index.success')}}">Berhasil</a>--}}
{{--                    <a class="collapse-item" href="{{route('mask.order.index')}}">Pending</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}

{{--        <hr class="sidebar-divider">--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMug" aria-expanded="true" aria-controls="collapseTwo">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Orderan Mug</span>--}}
{{--            </a>--}}
{{--            <div id="collapseMug" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <h6 class="collapse-header">Status Transaksi:</h6>--}}
{{--                    <a class="collapse-item" href="{{route('mug.order.index.success')}}">Berhasil</a>--}}
{{--                    <a class="collapse-item" href="{{route('mug.order.index')}}">Pending</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}

{{--        <hr class="sidebar-divider">--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTshirt" aria-expanded="true" aria-controls="collapseTwo">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Orderan T-Shirt</span>--}}
{{--            </a>--}}
{{--            <div id="collapseTshirt" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <h6 class="collapse-header">Status Transaksi:</h6>--}}
{{--                    <a class="collapse-item" href="{{route('tshirt.order.index.success')}}">Berhasil</a>--}}
{{--                    <a class="collapse-item" href="{{route('tshirt.order.index')}}">Pending</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <hr class="sidebar-divider">--}}


{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTotebag" aria-expanded="true" aria-controls="collapseTwo">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Orderan Tote Bag</span>--}}
{{--            </a>--}}
{{--            <div id="collapseTotebag" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <h6 class="collapse-header">Status Transaksi:</h6>--}}
{{--                    <a class="collapse-item" href="{{route('totebag.order.index.success')}}">Berhasil</a>--}}
{{--                    <a class="collapse-item" href="{{route('totebag.order.index')}}">Pending</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <hr class="sidebar-divider">--}}


{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBag" aria-expanded="true" aria-controls="collapseTwo">--}}
{{--                <i class="fas fa-fw fa-cog"></i>--}}
{{--                <span>Orderan Tas</span>--}}
{{--            </a>--}}
{{--            <div id="collapseBag" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">--}}
{{--                <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                    <h6 class="collapse-header">Status Transaksi:</h6>--}}
{{--                    <a class="collapse-item" href="{{route('bag.order.index.success')}}">Berhasil</a>--}}
{{--                    <a class="collapse-item" href="{{route('bag.order.index')}}">Pending</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </li>--}}




            <hr class="sidebar-divider">


{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{route('admin.alamat.index')}}">--}}
{{--                    <i class="fas fa-fw fa-cog"></i>--}}
{{--                    <span>Atur Alamat Toko</span>--}}
{{--                </a>--}}
{{--            </li>--}}

        <!-- Divider -->
{{--        <hr class="sidebar-divider d-none d-md-block">--}}

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
{{--                <ul class="navbar-nav ml-auto">--}}

{{--                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->--}}
{{--                    <li class="nav-item dropdown no-arrow d-sm-none">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fas fa-search fa-fw"></i>--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - Messages -->--}}
{{--                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">--}}
{{--                            <form class="form-inline mr-auto w-100 navbar-search">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <button class="btn btn-primary" type="button">--}}
{{--                                            <i class="fas fa-search fa-sm"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </li>--}}


{{--                    <!-- Nav Item - User Information -->--}}
{{--                    <li class="nav-item dropdown no-arrow">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - User Information -->--}}
{{--                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">--}}
{{--                            <form action="{{route("logout")}}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <button class="dropdown-item" style="cursor:pointer">Sign Out</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                </ul>--}}
            <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->

                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else


                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </nav>
            <!-- End of Topbar -->


        <!-- End of Topbar -->
        </div>
    @yield('content')
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Toko Kastem 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

<!-- Include Fabric.js in the page -->
<script src="{{asset('js/fabric.js')}}"></script>
<script src="{{asset('js/dist/fabric.js')}}"></script>
<script src="{{asset('js/dist/fabric.min.js')}}"></script>
<script src="{{asset('js/src/globalFabric.js')}}"></script>

@yield('js')
</body>

</html>
