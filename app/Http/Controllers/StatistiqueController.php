<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achat;
// use App\Models\Entretien;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class StatistiqueController extends Controller
{
    
    // public function index()
    // {
    //     //Récupérer la date actuelle
    //     // $now = Carbon::now();

    //     //Calculer la date de début (5 mois avant la date actuelle)
    //     // $startDate = $now->copy()->subMonths(5)->startOfMonth();

    //     //Récupérer la recette totale accumulée
    //     // $recetteTotale = Achat::sum('nbrLitre');

    //     // //Récupérer les recettes par mois (les 5 derniers mois)
    //     // $recettesParMois = Achat::select(DB::raw('SUM(nbrLitre) as total_recette'), DB::raw('MONTH(dateAchat) as mois'))
    //     //                           ->where('dateAchat', '>=', now()->subMonths(5))
    //     //                           ->groupBy('mois')
    //     //                           ->get();

    //     // return view('statistiques.index', compact('recetteTotale', 'recettesParMois'));

    //     //Récupérer la recette totale accumulée (UNIQUEMENT A PARTIR DES SERVICES)
    //     $recetteTotale = DB::table('entretiens')->join('services', 'entretiens.numServ', '=', 'services.numServ')->sum('services.prix');

    //     //Récupérer la date la plus récente parmi les entretiens
    //     $latestDate = DB::table('entretiens')->max('dateEntretien');
    //     // dd($latestDate);

    //     //Convertir la date en objet Carbon pour faciliter les calculs
    //     $referenceDate = Carbon::parse($latestDate);

    //     //Calculer la date de début (5 mois avant la dernière date)
    //     $startDate = $referenceDate->copy()->subMonths(4)->startOfMonth();

    //     //Générer une liste complète des 5 derniers mois
    //     $moisComplets = [];
    //     for ($i = 0; $i < 5; $i++){
    //         $moisComplets[] = $startDate->copy()->addMonths($i)->format('Y-m');
    //     }

    //     //Récupérer les recettes par mois (les 5 derniers mois)
    //     $recettesParMois = DB::table('entretiens')->join('services', 'entretiens.numServ', '=', 'services.numServ')
    //                                               ->select(
    //                                                     DB::raw('SUM(services.prix) as total_recette'),
    //                                                     DB::raw('MONTH(dateEntretien) as mois'),
    //                                                     DB::raw('YEAR(dateEntretien) as annee')
    //                                               )
    //                                               ->where('dateEntretien', '>=', $startDate)
    //                                               ->where('dateEntretien' , '<=', $referenceDate->endOfMonth())
    //                                               ->groupBy('annee', 'mois')
    //                                               ->orderBy('annee', 'asc')
    //                                               ->orderBy('mois', 'asc')
    //                                               ->get();

    //     $moisEnLettres = [
    //         1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin',
    //         7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre' 
    //     ];

    //     // $recettesParMois = $recettesParMois->take(5);
    //     $recettesParMois = $recettesParMois->map(function ($item) use ($moisEnLettres){
    //         $item->mois = $moisEnLettres[$item->mois] . ' ' . $item->annee;
    //         return $item;
    //     });

    //     return view('statistiques.index', compact('recetteTotale', 'recettesParMois'));

    //     // $recetteEntretiens = DB::table('entretiens')->join('services', 'entretiens.numServ', '=', 'services.numServ')->sum('services.prix');

    //     // $recetteTotale = Achat::sum('nbrLitre') + $recetteEntretiens;
    // }

    public function index()
    {
        // Récupérer la date la plus récente parmi les entretiens
        $latestDate = DB::table('achats')->max('dateAchat');
        $referenceDate = Carbon::parse($latestDate);

        // Calculer la date de début (5 mois avant la dernière date)
        $startDate = $referenceDate->copy()->subMonths(4)->startOfMonth();

        // Générer une liste complète des 5 derniers mois
        $moisComplets = [];
        for ($i = 0; $i < 5; $i++) {
            $moisComplets[] = $startDate->copy()->addMonths($i)->format('Y-m');
        }

        // Récupérer les recettes par mois (les 5 derniers mois)
        $recettesParMois = DB::table('achats')
            ->join('produits', 'achats.numMedoc', '=', 'produits.numMedoc')
            ->select(
                DB::raw('SUM(produits.prix_unitaire * achats.nbr) as total_recette'),
                DB::raw('DATE_FORMAT(dateAchat, "%Y-%m") as mois')
            )
            ->where('dateAchat', '>=', $startDate)
            ->where('dateAchat', '<=', $referenceDate->endOfMonth())
            ->groupBy('mois')
            ->orderBy('mois', 'asc')
            ->get()
            ->keyBy('mois'); // Utiliser le mois comme clé pour faciliter le mapping

        // Combler les mois manquants avec des recettes à 0
        $recettesCompletes = [];
        foreach ($moisComplets as $mois) {
            $recettesCompletes[] = [
                'mois' => $mois,
                'total_recette' => $recettesParMois->has($mois) ? $recettesParMois[$mois]->total_recette : 0,
            ];
        }

        // Convertir les mois en noms de mois (ex: "2025-03" => "Mars 2025")
        $moisEnLettres = [
            1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin',
            7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'
        ];

        $recettesCompletes = array_map(function ($item) use ($moisEnLettres) {
            list($annee, $mois) = explode('-', $item['mois']);
            $item['mois'] = $moisEnLettres[(int)$mois] . ' ' . $annee;
            return $item;
        }, $recettesCompletes);

        // Récupérer la recette totale accumulée (uniquement les services)
        $monthlyRevenue = Achat::join('produits', 'achats.numMedoc', '=','produits.numMedoc')
        ->selectRaw('SUM(achats.nbr * produits.prix_unitaire) as recette_totale')
        ->value('recette_totale');
        

        // // // Top 5  des medicaments les plus vendus
        $medicamentsPlusVendus= DB::table('produits')
        ->join('achats', 'produits.numMedoc', '=' , 'achats.numMedoc')
        ->select('produits.Design', DB::raw('SUM(achats.nbr) as total_vendu'))
        ->groupBy('produits.Design')
        ->orderByDesc('total_vendu')
        ->limit(5)
        ->get();
        // $topClients = DB::table('achats')
        // ->select('nomClient', DB::raw('COUNT(*) as total_entretiens'), DB::raw('0 as total_achats'))
        // ->groupBy('nomClient')
        // ->unionAll(
        //     DB::table('achats')
        //         ->select('nomClient', DB::raw('0 as total_entretiens'), DB::raw('COUNT(*) as total_achats'))
        //         ->groupBy('nomClient')
        // )
        // ->get()
        // ->groupBy('nomClient')
        // ->map(function ($item) {
        //     return [
        //         'nomClient' => $item->first()->nomClient,
        //         'total_entretiens' => $item->sum('total_entretiens'),
        //         'total_achats' => $item->sum('total_achats'),
        //         'total_participations' => $item->sum('total_entretiens') + $item->sum('total_achats'),
        //     ];
        // })
        // ->sortByDesc('total_participations')
        // ->take(5);

        

        return view('statistiques.index', compact('monthlyRevenue', 'recettesCompletes','medicamentsPlusVendus'));
    }

}


    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }

