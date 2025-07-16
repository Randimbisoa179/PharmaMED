@extends('layouts.app')

@section('title', 'Liste des Achats')

@section('content')
<div class="container">
    <h1 class="my-4">Liste des Achats</h1>

    <!-- Bouton pour ouvrir la modale :ajouter un achat -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addAchatModal">
        <i class="fas fa-plus"></i> Ajouter un Achat
    </button>

    <!-- Message de succès -->
    @if (session('success'))
        <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle text-success me-2" style="font-size: 1.3rem"></i><span style="font-size: 1.2rem; font-weight: bold;"> {{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Message d'erreur -->
    @if (session('error'))
        <div id="error-message" class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle text-danger me-2" style="font-size: 1.3rem"></i><span style="font-size: 1.2rem; font-weight: bold;"> {{session('error') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tableau des achats -->
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Numéro Achat</th>
                <th>Numéro Médicament</th>
                <th>Nom Client</th>
                <th>Quantité commandé</th>
                <th>Date Achat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($achats as $achat)
            <tr>
                <td>{{ $achat->numAchat }}</td>
                <td>{{ $achat->numMedoc }}</td>
                <td>{{ $achat->nomClient }}</td>
                <td>{{ $achat->nbr }}</td>
                <td>{{ $achat->dateAchat }}</td>
                <td>
                    <!-- Bouton pour ouvrir la modale "Voir" -->
                    <button type="button" class="btn btn-info btn-sm view-achat" data-bs-toggle="modal" data-bs-target="#viewAchatModal" data-numachat="{{ $achat->numAchat }}" data-nummedoc="{{ $achat->numMedoc }}" data-nomclient="{{ $achat->nomClient }}" data-nbr="{{ $achat->nbr }}" data-dateachat="{{ $achat->dateAchat }}">
                        <i class="fas fa-eye"></i> Voir
                    </button>

                    <!-- Bouton pour ouvrir la modale "Modifier" -->
                    <button type="button" class="btn btn-success btn-sm edit-achat" data-bs-toggle="modal" data-bs-target="#editAchatModal" data-id="{{ $achat->id }}" data-numachat="{{ $achat->numAchat }}" data-nummedoc="{{ $achat->numMedoc }}" data-nomclient="{{ $achat->nomClient }}" data-nbrlitre="{{ $achat->nbrLitre }}" data-dateachat="{{ $achat->dateAchat }}" data-route="{{ route('achats.update', $achat->numAchat) }}">
                        <i class="fas fa-edit"></i> Modifier
                    </button>

                    <!-- Bouton "Supprimer" -->
                    <button type="button" class="btn btn-danger btn-sm delete-achat" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" data-route="{{ route('achats.destroy', $achat->numAchat) }}">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>

                      <!-- Bouton pour générer le reçu PDF -->
                      <a href="{{ route('achats.generateReceipt', $achat->numAchat) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-envelope"></i> Facture
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modales pour Ajouter, Voir, Modifier, Supprimer -->
@include('achats.modals.add') 
@include('achats.modals.view')
@include('achats.modals.edit')
@include('achats.modals.delete')


<script>
    //Masquer le message d'erreur après 5 sec
    setTimeout(function(){
        var errorMessage = document.getElementById('error-message');
        if (errorMessage){
            errorMessage.style.display = 'none';
        }
    }, 5000);
</script>

@endsection
