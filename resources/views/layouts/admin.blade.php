<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pharmacie</title>
    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
    <link href="css/fontawesome.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/selectize.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
</head>
<body id="page-top">
<div class="spinner"></div>
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home')}}">

            <div class="sidebar-brand-text mx-3">Pharmacie</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="/home">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tableau de bord</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <!-- Nav Item - Medicaments -->
        <li class="nav-item">
            @canany(['isAdmin','isGerent'])
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-briefcase-medical text-white"></i>
                    <span>Médicaments</span>
                </a>
            @endcan
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('medicaments.create')}}">Ajouter</a>
                    <a class="collapse-item" href="{{ route('medicaments.index')}}">liste</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Stock Collapse Menu -->
        <li class="nav-item">
            @canany(['isAdmin','isGerent'])
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-database text-white"></i>
                    <span>Stocks</span>
                </a>
            @endcanany
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('stocks.create') }}">Entrée</a>
                    <a class="collapse-item" href="/stock/sortir">Sortie</a>
                    <a class="collapse-item" href="{{ route('stocks.index') }}">Etat</a>
                </div>
            </div>
        </li>

        @canany(['isAdmin'])
        <hr class="sidebar-divider">
        @endcanany


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            @canany(['isAdmin'])
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                   aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-file-invoice text-white"></i>
                    <span>Factures</span>
                </a>
            @endcanany
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('invoices.index')}}">Entrées</a>
                    <a class="collapse-item" href="{{ route('indexSortir')}}">Sorties</a>
                    {{--                    <a class="collapse-item" href="{{ route('invoices.index')}}">afficher</a>--}}

                </div>
            </div>
        </li>

              @canany(['isAdmin'])
                 <hr class="sidebar-divider">
                @endcanany
        <!-- Nav Item - Recu Collapse Menu -->
        <li class="nav-item">
            @canany(['isAdmin','isVendeur'])
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapserecu"
                   aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder text-white"></i>
                    <span>Reçus</span>
                </a>
            @endcanany
            <div id="collapserecu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('recu.create')  }}">Créer un reçus</a>
                    <a class="collapse-item" href="{{ route('close-session')}}">Fermer la Session</a>
                    <a class="collapse-item" href="{{ route('recu.index') }}">Liste des reçus</a>
                    <a class="collapse-item" href="{{ route('session.index')  }}">Liste des Sessions</a>
                    <div class="collapse-divider"></div>

                </div>
            </div>
        </li>
        <!-- Nav Item - users Collapse Menu -->
        <li class="nav-item">
            @canany(['isAdmin'])
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                   aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-user text-white"></i>
                    <span>Utilisateurs</span>
                </a>
            @endcanany
            <div id="collapseUsers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('users.create')  }}">Créer</a>
                    <a class="collapse-item" href="{{ route('users.index') }}">Liste</a>

                </div>
            </div>
        </li>
        <!-- Nav Item - Commandes Collapse Menu -->
        <li class="nav-item">
            @canany(['isAdmin','isGerent'])
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCommandes"
                   aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-shopping-cart text-white"></i>
                    <span>Commandes</span>
                </a>
            @endcanany
            <div id="collapseCommandes" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('commandes.create')  }}">Créer</a>
                    <a class="collapse-item" href="{{ route('commandes.index') }}">Liste</a>

                </div>
            </div>
        </li>


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column hide-content">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <ul class="navbar-nav mr-auto ">
                </ul>


                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mr-2 d-none d-lg-inline text-gray-600 big fa fa-user fa-2x">
{{--                                                <i class="fa fa-user fa-2x"></i>--}}
{{--                                                <img src="{{ asset('img/logo.jpg')}}" class="icon-circle" width="60px"--}}
{{--                                                     alt="user-avatar">--}}
                                            </i>

                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt  fa-sm fa-fw mr-2">
                                    <span class="ml-2 font-weight-bold ">Déconnexion</span>
                                </i>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

        {{--            </nav>--}}
        <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @include('inc.messages')
                @yield('content')
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- End of Content Wrapper -->

<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script src="js/selectize.js"></script>


@yield('page-js-script')


<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/custom.js"></script>


</body>
</html>
