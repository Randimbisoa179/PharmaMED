<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Produit;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dom\Attr;
use Illuminate\Http\Request;

class AchatController extends Controller
{

    public function index()
    {
        //
        $achats = Achat::all();
        $produits = Produit::all();
        return view('achats.index', compact('achats', 'produits'));
    }




    public function create()
    {
        //
        $produits = Produit::all();

        return view('achats.create', compact('produits'));
    }




    public function store(Request $request)
    {
        //Validation des données
        $request->validate([
            'numAchat' => 'required|unique:achats',
            'numMedoc' => 'required|exists:produits,numMedoc',
            'nomClient' => 'required',
            'nbr' => 'required|numeric|min:1',
            'dateAchat' => 'required|date',
        ]);

        //Récupérer le produit associé
        $produit = Produit::findOrFail($request->numMedoc);

        //Vérifier si le stock est suffisant
        if ($produit->stock < $request->nbr){
            return redirect()->back()->with('error', 'Stock insuffisant pour ce medicament!');
        }

        //Enregistrer l'achat
        Achat::create([
            'numAchat' => $request->numAchat,
            'numMedoc' => $request->numMedoc,
            'nomClient' => $request->nomClient,
            'nbr' => $request->nbr,
            'dateAchat' => $request->dateAchat,
        ]);

        //Mettre à jour le stock du produit
        $produit = Produit::find($request->numMedoc);
        $produit->stock -= $request->nbr;
        $produit->save();

        return redirect()->route('achats.index')->with('success', 'Achat ajouté et stock mis à jour avec succès!');
    }



    public function show(string $id)
    {
        //
    }



    public function edit($numAchat)
    {
        //Récupérer l'achat à modifier
        $achat = Achat::findOrFail($numAchat);
        $produits = Produit::all();
        // $achat = Achat::where('numAchat', $numAchat)
        //                 ->where('numProd', $numProd)
        //                 ->firstOrFail();

        //Retourner la vue d'édition avec les données de l'achat
        return view('achats.edit', compact('achat','produits'));
    }



    public function update(Request $request, $numAchat)
    {
        //
        $request->validate([
            // 'numProd' => 'required',
            'nomClient' => 'required',
            'nbr' => 'required|numeric|min:3',
            'dateAchat' => 'required|date',
        ]);

        $achat = Achat::findOrFail($numAchat); //Récupérer l'achat à modifier
        // $achat = Achat::where('numAchat', $numAchat)->where('numProd', $numProd)->firstOrFail();


        
        // $achat->update($request->all());
        // $achat->update([
        //     'nomClient' => $request->nomClient,
        //     'nbrLitre' => $request->nbrLitre,
        //     'dateAchat' => $request->dateAchat,
        // ]);

        $produit = Produit::findOrFail($achat->numMedoc); //Récupérer le produit associé

        $difference = $request->nbr - $achat->nbr; //Calculer le diff entre l'ancienne et la nouvelle qte de Litres

        //Vérifier si le stock est suffisant pour la nouvelle quantité
        if($produit->stock < $difference){
            return redirect()->back()->with('error', 'Stock insuffisant pour ce medicament!');
        }

        //Mettre à jour le stock du produit
        $produit->stock -= $difference;
        $produit->save();

        //Mettre à jour l'achat
        $achat->update([
            'nomClient' => $request->nomClient,
            'nbr' => $request->nbr,
            'dateAchat' => $request->dateAchat,
        ]);

        return redirect()->route('achats.index')->with('success', 'Achat mis à jour et stock ajouté avec succès!');
    }

    public function destroy($numAchat)
    {
        //Récupérer l'achat à supprimer
        $achat = Achat::findOrFail($numAchat);
        // $achat = Achat::where('numAchat', $numAchat)
        //                 ->where('numProd', $numProd)
        //                 ->firstOrFail();

        //Récupérer le produit associé
        $produit = Produit::findOrFail($achat->numMedoc);

        //Augmenter le stock du produit de la quantité achetée
        $produit->stock += $achat->nbr;
        $produit->save();

        $achat->delete();

        return redirect()->route('achats.index')->with('success', 'Achat supprimé et stock ajusté avec succès!');
    }
    public function generateReceipt($numAchat){
    
$achat = Achat::with('produits')->findOrFail($numAchat);

// recuperer les memes achats d'unne personne
$achats = Achat::where('nomClient', $achat->nomClient)
->where('dateAchat', $achat->dateAchat)
// ->where('numAchat', $achat->numAchat)
->with('produits')
->get();

// recupere tous les produits associes a l'achat
$produits = collect();//creer un collection vide
foreach ($achats as $acht) {
foreach ($acht->produits as $produit) {
    $produits = $produits->merge($acht->produits);
}
}

// verifier si les produits sont associés
if (!$achat->produits || $achat->produits->isEmpty()) {
    return redirect()->back()->with('error','Aucun medicament associé à cet achat');
}
$total=0;
$sousTotal=$produit->prix_unitaire * $achat->nbr;
$total +=$sousTotal;

// generer le facture
$data =[
    'dateAchat'=>$achat->dateAchat,
    'nomClient'=>$achat->nomClient,
    'Design'=>$produit->Design,
    'prix_unitaire'=>$produit->prix_unitaire,
    'nbr'=>$achat->nbr,
    'total'=>$sousTotal,
    'totalM'=>$total,
    'numAchat'=>$achat->numAchat

];
   // $pdf = Pdf::loadView('receipt', compact('achat'));
        $pdf= Pdf::loadView('receipt', $data);
        return $pdf->stream('receipt_' . $achat->numAchat . '.pdf');
        $request->session()->forget('success');
    }

}
