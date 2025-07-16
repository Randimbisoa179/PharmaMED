<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Afficher la liste des produits
    public function index(Request $request)
    {
        //Récupérer tous les produits
        $produits = Produit::all();

        //return view('produits.index', compact('produits'));

        //Identifier les produits avec un stock inférieur à 10 Litres
        $produitsFaibleStock = $produits->filter(function($produit){
            return $produit->stock < 5;
            
        });

        return view('produits.index', [
            'produits' => $produits,
            'produitsFaibleStock' => $produitsFaibleStock,
        ]);
    }



    public function create()
    {
        //
        return view('produits.create');
    }


    // Enregistrer un nouveau produit
    public function store(Request $request)
    {
        //
        $request->validate([
            'numMedoc' => 'required|unique:produits',
            'Design' => 'required',
            'prix_unitaire' => 'required|integer',
            'stock' => 'required|integer|min:0',
        ]);

        Produit::create($request->all());

        return redirect()->route('produits.index')->with('success', 'Medicament ajouté avec succès!');
    }


    // Afficher les détails d'un produit
    public function show(string $numMedoc)
    {
        //
        $produit = Produit::findOrFail($numMedoc);

        //
        return view('produits.show', compact('produit'));
        // return response()->json($produit);
    }


    
    public function edit(string $numMedoc)
    {
        
        $produit = Produit::findOrFail($numMedoc);

        
        return view('produits.edit', compact('produit'));
    }


    // Mettre à jour un produit
    public function update(Request $request, string $numMedoc)
    {
        //
        $request->validate([
            'Design' => 'required',
            'stock' => 'required|integer|min:0',
        ]);

        //
        $produit = Produit::findOrFail($numMedoc);

        //
        // $produit->update($request->all());

        $produit->Design = $request->input('Design');
        $produit->prix_unitaire = $request->input('prix_unitaire');
        $produit->stock = $request->input('stock');
        $produit->save();
        //
        return redirect()->route('produits.index')->with('success', 'Medicament modifié avec succès!');
    }


    // Supprimer un produit
    public function destroy(string $numMedoc)
    {
        //
        $produit = Produit::findOrFail($numMedoc);

        //
        $produit->delete();

        //
        return redirect()->route('produits.index')->with('success', 'Medicament supprimé avec succès!');
    }

    //recherche des medicaments
    public function search(Request $request){
        //recuperer le mot clé de la requete
        $keyword=$request->input('keyword');

        // recherche des medoc  dont la design est la mot-clé
        $produits= Produit::where('Design','LIKE',"%%{$keyword}")->get();

        //retourner les resultats au format JSON
        return response()->json($produits);
        return view('produits.index', compact('produits','keyword'));
    }
}
