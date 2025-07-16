@extends('layouts.app')

@section('title', 'Statistiques')

@section('content')
<div class="container">
    <h1 class="my-4">Statistiques</h1>

    <!-- Afficher la recette totale -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Recette Totale Accumulée</h5>
        </div>
        <div class="card-body">
            <p style="font-size: 20px;">La recette totale accumulée par la pharmacie est de : <strong>{{ $monthlyRevenue }} AR</strong></p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5>Les 5 medicaments les plus vendus</h5>
        </div>
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

    <!-- Afficher l'histogramme des recettes par mois -->
    <div class="card">
        <div class="card-header">
            <h5>Histogramme des Recettes par Mois (Les 5 derniers mois)</h5>
        </div>
        <div class="card-body" style="width: 800px; margin-left: 50px">
            <canvas id="recettesChart" width="400" height="500" ></canvas>
        </div>
    </div>
</div>

<!-- Elément HTML caché pour stocker les données -->
<div id="chart-data"
    data-labels="{{ json_encode(array_column($recettesCompletes, 'mois')) }}"
    data-recettes="{{ json_encode(array_column($recettesCompletes, 'total_recette')) }}">
</div>

<!-- Inclure Chart.js localement -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/chartjs/chart.umd.js') }}"></script>
<canvas id="recettesChart" width="100" height="10"></canvas>
<script src="{{ asset('js/recettesChart.js') }}"></script>
@endsection
