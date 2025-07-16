<!-- resources/views/entrees/index.blade.php -->

@extends('layouts.app')

@section('title', 'Liste des Entrées')

@section('content')
<div class="container">
    <h1 class="my-4">Liste des Entrées</h1>

    <!-- Bouton pour ouvrir la modale :ajouter une entrée -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addEntreeModal">
        <i class="fas fa-plus"></i> Ajouter une Entrée
    </button>

    <!-- Message de succès -->
    @if (session('success'))
        <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle text-success me-2" style="font-size: 1.3rem"></i><span style="font-size: 1.2rem; font-weight: bold;"> {{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tableau des entrées -->
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Numéro Entrée</th>
                <th>Medicament</th>
                <th>Quantité</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entrees as $entree)
            <tr>
                <td>{{ $entree->numEntree }}</td>
                <td>{{ $entree->produit->Design }}</td>
                <td>{{ $entree->stockEntree }}</td>
                <td>{{ $entree->dateEntree }}</td>
                <td>
                    <!-- Bouton pour ouvrir la modale "Voir" -->
                    <button type="button" class="btn btn-info btn-sm view-entree" data-bs-toggle="modal" data-bs-target="#viewEntreeModal" data-entree="{{ json_encode($entree) }}">
                        <i class="fas fa-eye"></i> Voir
                    </button>

                    <!-- Bouton pour ouvrir la modale "Modifier" -->
                    <button class="btn btn-success btn-sm edit-entree" data-bs-toggle="modal" data-bs-target="#editEntreeModal" 
                            data-numentree="{{ $entree->numEntree }}"
                            data-stockentree="{{ $entree->stockEntree }}"
                            data-dataentree="{{ $entree->dateEntree }}"
                            data-nummedoc="{{ $entree->numMedoc }}">
                        <i class="fas fa-edit"></i> Modifier
                    </button>

                    <!-- Bouton "Supprimer" -->
                    <button class="btn btn-danger btn-sm delete-entree" data-bs-toggle="modal" data-bs-target="#deleteEntreeModal" data-numentree="{{ $entree->numEntree }}">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modales pour Ajouter, Voir, Modifier, Supprimer -->
@include('entrees.modals.add') 
@include('entrees.modals.view') 
@include('entrees.modals.edit')
@include('entrees.modals.delete')

@endsection








