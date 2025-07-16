@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
<div class="container">
    <h1 class="my-4">Bienvenue sur PharmaMed!</h1>
    <p style="font-size: 20px;">Gérez votre pharmacie facilement!</p>

    <!-- Tableau de bord avec des statistiques rapides -->
    <center>
    <div class="row my-4 mb-5">

        <!-- Stock actuel -->
        <div class="col-mb-3">
            <div class="card card-stat">
                <div class="card-body">
                    <h5 class="card-title">Stock actuel</h5>
                    <p class="card-text">{{ $currentStock }} </p>
                </div>
            </div>
        </div>

        <!-- Recettes du mois -->
        <div class="col-mb-3">
            <div class="card card-stat">
                <div class="card-body">
                    <h5 class="card-title">Recette totale</h5>
                    <p class="card-text">{{ $monthlyRevenue }} AR</p>
                </div>
            </div>
        </div>

        <!-- Produits en rupture de stock -->
        <div class="col-mb-3">
            <div class="card card-stat">
                <div class="card-body">
                    <h5 class="card-title">Medicament en rupture de stocks</h5>
                    <p class="card-text">{{ $lowStockProducts }} medicament(s)</p>
                </div>
            </div>
        </div>
    </div></center>


    <div class="col-my-4">
        <div class="card card-stat">
            <div class="card-body">
            <h5 class="card-title">Les 5 medicaments les plus vendus</h5>
            <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Medicament</th>
                <th>Quantité vendue</th>
            
            </tr>
    </thead>    
    <tbody>
        @foreach($medicamentsPlusVendus as $produit)
        <tr>
            <td>{{$produit->Design}}</td>
            <td>{{$produit->total_vendu}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
    </div>        
    </div>
    </div>
 

    <!-- Liens rapides vers les principales fonctionnalités -->
    <div class="row my-4">
        <div class="col-md-12">
            <h4>Raccourci</h4>
            <div class="list-group">
                <a href="{{ route('produits.index') }}" class="list-group-item list-group-item-action">Gestion des medicaments</a>
                <a href="{{ route('entrees.index') }}" class="list-group-item list-group-item-action">Gestion des entrées de stock</a>
                <a href="{{ route('achats.index') }}" class="list-group-item list-group-item-action">Gestion des achats</a>
                <a href="{{ route('statistiques.index') }}" class="list-group-item list-group-item-action">Statistiques</a>
            </div>
        </div>
    </div>
</div>


<style>
    /* Style pour les cartes */
.card-stat {
    border: none; /* Supprimer la bordure */
    border-radius: 10px; /* Bordures arrondies */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animation au survol */
    
}

.card-stat:hover {
    transform: translateY(-5px); /* Effet de levée au survol */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Ombre plus prononcée au survol */
}

/* Style pour le titre des cartes */
.card-stat .card-title {
    font-size: 1.2rem; /* Taille du titre */
    font-weight: bold; /* Texte en gras */
    color: #333; /* Couleur du texte */
}

/* Style pour le texte des cartes */
.card-stat .card-text {
    font-size: 1.5rem; /* Taille du texte */
    color: rgba(169, 169, 169, 1); /* Couleur bleue pour les chiffres */
    font-weight: bold; /* Texte en gras */
}
.col-mb-3{
    padding: 10px;
}


</style>

<!-- Elément HTML caché pour stocker les données -->


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/chartjs/chart.umd.js') }}"></script>
<!-- <canvas id="recettesChart" width="400" height="200"></canvas> -->
<script src="{{ asset('js/recettesChart.js') }}"></script>

@endsection
