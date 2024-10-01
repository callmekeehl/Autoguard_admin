
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Styles personnalisés -->
<style>
    /* Styles pour la sidebar */
    .sidebar {
        height: 100vh; /* Hauteur de la sidebar */
        position: fixed; /* Fixe la position de la sidebar */
        top: 0;
        left: 0;
        width: 200px; /* Largeur de la sidebar */
        background-color: #343a40; /* Couleur de fond */
        z-index: 1000;
    }

    .sidebar .nav-link {
        color: #ffffff; /* Couleur du texte */
    }

    .sidebar .nav-link:hover {
        background-color: #007bff; /* Couleur de survol */
    }

    /* Ajouter un margin-left au contenu principal */
    .content {
        margin-left: 250px; /* Largeur de la sidebar */
        padding: 20px; /* Espacement */
    }
</style>

<div class="sidebar">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Autoguard ADMIN</div>
        </a>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!--Utilisateurs-->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.utilisateurs.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Utilisateurs</span></a>
        </li>

        <!--Polices-->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.polices.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Polices</span></a>
        </li>

        <!--Garages-->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.garages.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Garages</span></a>
        </li>

        <!--Déclarations-->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.declarations.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Déclarations</span></a>
        </li>


    </ul>

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Profil</span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                     aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Info
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->
</div>
