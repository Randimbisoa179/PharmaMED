<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entree;
use App\Models\Produit;

class EntreeController extends Controller
{

    //Affiche la liste des Entrees
    public function index()
    {
        $entrees = Entree::with('produit')->get();
        $produits = Produit::all(); //Récupérer tous les produits
        return view('entrees.index', compact('entrees', 'produits'));
    }



    public function create()
    {
        //
        $produits = Produit::all(); //pour le formulaire d'ajout
        return view('entrees.create', compact('produits'));
    }



    //Enregistrer une nouvelle Entree
    public function store(Request $request)
    {
        $request->validate([
            'numEntree' => 'required|unique:entrees,numEntree',
            'stockEntree' => 'required|numeric|min:0',
            'dateEntree' => 'required|date',
            'numMedoc' => 'required|exists:produits,numMedoc',
        ]);

        //Créer l'entree
        Entree::create($request->all());

        //Mettre à jour le stock du produit associé
        // $produit = Produit::where('numProd', $request->numProd)->first();
        $produit = Produit::find($request->numMedoc);
        $produit->stock += $request->stockEntree;
        $produit->save();

        return redirect()->route('entrees.index')->with('success', 'Entrée ajoutée et stock mis à jour avec succès!');
        // return response()->json(['success' => true, 'message' => 'Entrée ajoutée et stock mis à jour avec succès!']);
    }



    public function show(string $id)
    {
        //
    }



    public function edit(string $numEntree)
    {
        //
        $entree = Entree::findOrFail($numEntree);
        $produits = Produit::all(); //Pour le formulaire de modification
        //
        return view('entrees.edit', compact('entree', 'produits'));

    }




    //Mettre à jour une entrée
    public function update(Request $request, string $numEntree)
    {
        $request->validate([
            'stockEntree' => 'required|numeric|min:0',
            'dateEntree' => 'required|date',
            'numMedoc' => 'required|exists:produits,numMedoc',
        ]);

        //Récupérer l'entrée existante
        $entree = Entree::findOrFail($numEntree);

        //Récupérer l'ancien  stock de l'entrée
        $ancienStock = $entree->stockEntree;

        //Mettre à jour l'entrée
        // $entree->update($request->all());

        //Mettre à jour les champs (sauf numEntree)
        $entree->stockEntree = $request->stockEntree;
        $entree->dateEntree = $request->dateEntree;
        $entree->numMedoc = $request->numMedoc;
        $entree->save();

        //Mettre à jour le stock du produit associé
        // $produit = Produit::where('numProd', $request->numProd)->first();
        $produit = Produit::find($request->numMedoc);
        $produit->stock += ($request->stockEntree - $ancienStock);
        $produit->save();

        return redirect()->route('entrees.index')->with('success', 'Entrée mise à jour et stock ajouté avec succès!');
        // return response()->json(['success' => true, 'message' => 'Entrée mise à jour et stock ajouté avec succès!']);
    }



    //Supprimer une entrée
    public function destroy(string $numEntree)
    {
        //Récupérer l'entrée existante
        $entree = Entree::findOrFail($numEntree);
        $quantite = $entree-> stockEntree;


        //Mettre à jour le stock du produit associé
        // $produit = Produit::where('numProd', $entree->numProd)->first();
        $produit = Produit::find($entree->numMedoc);
        $produit->stock -= $quantite;//Soustraire la qte du stock
        // $produit->stock -= $entree->stockEntree;
        $produit->save();

        //Supprimer l'entrée
        $entree->delete();

        return redirect()->route('entrees.index')->with('success', 'Entrée supprimée et stock ajusté avec succès!');
        // return response()->json(['success' => true, 'message' => 'Entrée supprimée et stock ajusté avec succès!']);
    }
}
