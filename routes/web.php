<?php

// namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\EntreeController;
use App\Http\Controllers\AchatController;
// use App\Http\Controllers\ServiceController;
// use App\Http\Controllers\EntretienController;
// use App\Http\Controllers\ClientController;
use App\Http\Controllers\StatistiqueController;
use App\Models\Achat;
use App\Models\Produit;

// use App\Models\Entretien;

//Route pour la page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');


//Route par défaut (page d'accueil)
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/test', function () {
//     return view('test');
// });


//Routes CRUD pour chaque contrôleur

//ROUTES POUR LES PRODUITS (Gestion en modale)
//Route::resource('produits', ProduitController::class);
Route::prefix('produits')->group(function(){
    Route::get('/', [ProduitController::class, 'index'])->name('produits.index');
    Route::get('/produits/{numMedoc}', [ProduitController::class, 'show'])->name('produits.show');
    Route::post('/', [ProduitController::class, 'store'])->name('produits.store');
    Route::put('/produits/{numMedoc}', [ProduitController::class, 'update'])->name('produits.update');
    Route::delete('/produits/{numMedoc}', [ProduitController::class, 'destroy'])->name('produits.destroy');
    Route::get('/produits/search', [ProduitController::class, 'search'])->name('produits.search');

});



//ROUTES POUR LES ENTREES (Gestion en modale)
// Route::resource('entrees', EntreeController::class);
Route::prefix('entrees')->group(function(){
    Route::get('/', [EntreeController::class, 'index'])->name('entrees.index'); //Lister toutes les entrées
    Route::get('/create', [EntreeController::class, 'create'])->name('entrees.create'); //Afficher le formulaire de création
    Route::post('/', [EntreeController::class, 'store'])->name('entrees.store'); //Enregistrer une nouvelle entrée
    Route::get('/{numEntree}', [EntreeController::class, 'show'])->name('entrees.show'); //Afficher les détails d'une entrée
    Route::get('/{numEntree}/edit', [EntreeController::class, 'edit'])->name('entrees.edit'); //Afficher le formulaire de modification
    Route::put('/{numEntree}/update', [EntreeController::class, 'update'])->name('entrees.update'); //Mettre à jour une entrée
    Route::delete('/{numEntree}/delete', [EntreeController::class, 'destroy'])->name('entrees.destroy'); //Supprimer une entrée
});



//ROUTES POUR LES ACHATS
// Route::resource('achats', AchatController::class);
Route::prefix('achats')->group(function(){
    Route::get('/', [AchatController::class, 'index'])->name('achats.index');
    Route::get('/create', [AchatController::class, 'create'])->name('achats.create');
    Route::get('/achats/{numAchat}', [AchatController::class, 'show'])->name('achats.show');
    Route::post('/achats', [AchatController::class, 'store'])->name('achats.store');
    Route::put('/{numAchat}/update', [AchatController::class, 'update'])->name('achats.update');
    Route::delete('/{numAchat}/delete', [AchatController::class, 'destroy'])->name('achats.destroy');
    Route::get('/{numAchat}/receipt', [AchatController::class, 'generateReceipt'])->name('achats.generateReceipt');
});








// Route::resource('clients', ClientController::class);

//Route pour la gestion des statistiques
Route::get('/statistiques', [StatistiqueController::class, 'index'])->name('statistiques.index');



//Routes personnalisées
// Route::get('/recherche-client', [AchatController::class, 'search'])->name('recherche.client');
// Route::get('/achats/receipt', [AchatController::class, 'generateReceipt'])->name('achats.receipt');
