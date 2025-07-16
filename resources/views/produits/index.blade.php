@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')
<div class="container">
    <h1 class="my-4">Liste des médicaments</h1>

    <div>
      
           <input class="form-control me-2" type="text" placeholder="Recherche par sa désignation..." id="searchInput" onkeyup="myFunction()"><br>
      
    <!-- Bouton pour ouvrir la modale :ajouter un produit -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addProductModal">
        <i class="fas fa-plus"></i> Ajouter un médicament
    </button>
    

    <!-- Message de succès -->
    @if (session('success'))
        <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle text-success me-2" style="font-size: 1.3rem"></i><span style="font-size: 1.2rem; font-weight: bold;"> {{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!--Afficher un message d'alerte pour les produits en faible stock-->
    @if ($produitsFaibleStock->isNotEmpty())
        <div class="alert alert-warning" role="alert">
         
            <h5><i class="fas fa-exclamation-circle me-2 text-danger"></i>Attention! Les médicaments suivants sont en rupture de stocks (moins de 5) :</h5>
            <ul>
                @foreach ($produitsFaibleStock as $produit)
                    <li>{{ $produit->Design }} (Stock actuel: {{ $produit->stock }} )</li>
                   
                    @endforeach
            </ul>
            
        </div>
    @endif

    <!-- Tableau des produits -->
    <table class="table table-bordered table-striped" id="medicamentsTable">
        <thead class="thead-dark">
            <tr>
                <th>Numéro</th>
                <th>Designation</th>
                <th>Prix unitaire</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
            <tr class="{{ $produit->stock < 5 ? 'table-warning' : '' }}">
                <td>{{ $produit->numMedoc }}</td>
                <td id="design">{{ $produit->Design }}</td>
                <td>{{$produit->prix_unitaire}} Ar</td>
                <td>{{ $produit->stock }}</td>
                <td>
                    
                    <!-- Bouton pour ouvrir la modale "Voir" -->
                    <button type="button" class="btn btn-info btn-sm view-product" data-bs-toggle="modal" data-bs-target="#viewProductModal" data-nummedoc="{{ $produit->numMedoc }}" data-design="{{ $produit->Design }}" data-prix_unitaire="{{$produit->prix_unitaire}}" data-stock="{{ $produit->stock }}">
                        <i class="fas fa-eye"></i> Voir
                    </button>
                    
                    <!-- Bouton pour ouvrir la modale "Modifier" -->
                    <button type="button" class="btn btn-success btn-sm edit-product" data-bs-toggle="modal" data-bs-target="#editProductModal" data-nummedoc="{{ $produit->numMedoc }}" data-design="{{ $produit->Design }}" data-prix_unitaire="{{$produit->prix_unitaire}}" data-stock="{{ $produit->stock }}" data-route="{{ route('produits.update', $produit->numMedoc) }}">
                        <i class="fas fa-edit"></i> Modifier
                    </button>    

                    
                        <button type="button" class="btn btn-danger btn-sm delete-product" 
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteConfirmationModal" 
                                data-route="{{ route('produits.destroy', $produit->numMedoc) }}">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modales pour Ajouter, Voir, Modifier, Supprimer ENTRETIENS -->
@include('produits.modals.add') 
@include('produits.modals.view')
@include('produits.modals.edit')
@include('produits.modals.delete')


<script>
    function myFunction(){
        var input, filter, table, tr, td, i;
        input=document.getElementById("searchInput");
        filter= input.value.toUpperCase();
        table=document.getElementById("medicamentsTable");
        tr=table.getElementsByTagName("tr");

        for(i=0; i<tr.length; i++){
            td=tr[i].getElementsByTagName("td")[1];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter)> -1) {
                    tr[i].style.display="";
                    
                }else{
                    tr[i].style.display="none";
                }
            }
        }
    }
</script>
@endsection
