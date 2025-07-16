<!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary rounded shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand me-3"><i class="	fas fa-clinic-medical"></i>PharmaMed</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto-mb-2 mb-lg-0">
                <li class="nav-item me-3">
                    <a class="nav-link {{request()->routeIs('home') ? 'active': '' }}" href="{{ route('home') }}"><i class="fas fa-home"></i> ACCUEIL</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link {{request()->routeIs('produits.index') ? 'active': '' }}" href="{{ route('produits.index') }}"><i class="fas fa-book-medical"></i> MEDICAMENTS</a>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link {{request()->routeIs('entrees.index') ? 'active': '' }}" href="{{ route('entrees.index') }}"><i class="fas fa-arrow-down"></i> ENTREES</a>
                </li>

                <li class="nav-item me-3">
                    <a class="nav-link {{request()->routeIs('achats.index') ? 'active': '' }}" href="{{ route('achats.index') }}"><i class="fas fa-shopping-cart"></i> ACHATS</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('statistiques.index') ? 'active': '' }}" href="{{ route('statistiques.index') }}"><i class="fas fa-chart-line"></i> STATISTIQUES</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar .nav-link{
        color: white;
    }

    .navbar .nav-link.active{
        color: green !important;
        background: #808090;
        border-radius: 5px;
        font-weight: bold;
        font-size: 1.15rem;
    }

    .navbar .nav-link:hover{
        color: green;
    }
</style>