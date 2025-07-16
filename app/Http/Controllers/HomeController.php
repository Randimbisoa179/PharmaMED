<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class HomeController extends Controller
// {
//     public function index(){
//         //Logique pour la page d'accueil
//         return view('home'); //Retourne la vue "home.blade.php"
//     }
    
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Achat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class HomeController extends Controller
{
    public function index()
    {
        // Nombre total de clients (uniques)
        // $totalClients = DB::table('achats')
        //     ->select('nomClient')
        //     ->union(DB::table('')->select('nomClient'))
        //     ->distinct()
        //     ->count();

        // Stock actuel (somme des stocks de tous les produits)
        $currentStock = Produit::sum('stock');

        // Recettes du mois (somme des achats et services ce mois-ci)
        // $monthlyRevenue = Achat::whereMonth('dateAchat', now()->month)->sum('nbrLitre') * 5000; // Exemple de calcul
        $monthlyRevenue = Achat::join('produits', 'achats.numMedoc', '=','produits.numMedoc')
        ->selectRaw('SUM(achats.nbr * produits.prix_unitaire) as recette_totale')
        ->value('recette_totale');

        
        // Produits en rupture de stock (moins de 10 litres)
        $lowStockProducts = Produit::where('stock', '<', 5)->count();


        // // // Top 5  des medicaments les plus vendus
        $medicamentsPlusVendus= DB::table('produits')
        ->join('achats', 'produits.numMedoc', '=' , 'achats.numMedoc')
        ->select('produits.Design', DB::raw('SUM(achats.nbr) as total_vendu'))
        ->groupBy('produits.Design')
        ->orderByDesc('total_vendu')
        ->limit(5)
        ->get();
        // // Top 5 des clients les plus actifs
        // $topClients = DB::table('achats')
        //     ->select('nomClient', DB::raw('COUNT(*) as total_entretiens'), DB::raw('0 as total_achats'))
        //     ->groupBy('nomClient')
        //     ->unionAll(
        //         DB::table('achats')
        //             ->select('nomClient', DB::raw('0 as total_entretiens'), DB::raw('COUNT(*) as total_achats'))
        //             ->groupBy('nomClient')
        //     )
        //     ->get()
        //     ->groupBy('nomClient')
        //     ->map(function ($item) {
        //         return [
        //             'nomClient' => $item->first()->nomClient,
        //             'total_entretiens' => $item->sum('total_entretiens'),
        //             'total_achats' => $item->sum('total_achats'),
        //             'total_participations' => $item->sum('total_entretiens') + $item->sum('total_achats'),
        //         ];
        //     })
        //     ->sortByDesc('total_participations')
        //     ->take(5);

                    // Récupérer la date la plus récente parmi les entretiens
        // $latestDate = DB::table('entretiens')->max('dateEntretien');
        // $referenceDate = Carbon::parse($latestDate);

        // Calculer la date de début (5 mois avant la dernière date)
        // $startDate = $referenceDate->copy()->subMonths(4)->startOfMonth();

        // Générer une liste complète des 5 derniers mois
        // $moisComplets = [];
        // for ($i = 0; $i < 5; $i++) {
        //     $moisComplets[] = $startDate->copy()->addMonths($i)->format('Y-m');
        // }

        // Récupérer les recettes par mois (les 5 derniers mois)
    //     $recettesParMois = DB::table('entretiens')
    //         ->join('services', 'entretiens.numServ', '=', 'services.numServ')
    //         ->select(
    //             DB::raw('SUM(services.prix) as total_recette'),
    //             DB::raw('DATE_FORMAT(dateEntretien, "%Y-%m") as mois')
    //         )
    //         ->where('dateEntretien', '>=', $startDate)
    //         ->where('dateEntretien', '<=', $referenceDate->endOfMonth())
    //         ->groupBy('mois')
    //         ->orderBy('mois', 'asc')
    //         ->get()
    //         ->keyBy('mois'); // Utiliser le mois comme clé pour faciliter le mapping

    //     // Combler les mois manquants avec des recettes à 0
    //     $recettesCompletes = [];
    //     foreach ($moisComplets as $mois) {
    //         $recettesCompletes[] = [
    //             'mois' => $mois,
    //             'total_recette' => $recettesParMois->has($mois) ? $recettesParMois[$mois]->total_recette : 0,
    //         ];
    //     }

    //     // Convertir les mois en noms de mois (ex: "2025-03" => "Mars 2025")
    //     $moisEnLettres = [
    //         1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin',
    //         7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'
    //     ];

    //     $recettesCompletes = array_map(function ($item) use ($moisEnLettres) {
    //         list($annee, $mois) = explode('-', $item['mois']);
    //         $item['mois'] = $moisEnLettres[(int)$mois] . ' ' . $annee;
    //         return $item;
    //     }, $recettesCompletes);

    //     // Récupérer la recette totale accumulée (uniquement les services)
    //     $recetteTotale = DB::table('entretiens')
    //         ->join('services', 'entretiens.numServ', '=', 'services.numServ')
    //         ->sum('services.prix');

        // return view('statistiques.index', compact('recetteTotale', 'recettesCompletes'));
        


        return view('home', compact('currentStock', 'monthlyRevenue', 'lowStockProducts','medicamentsPlusVendus'));
    // }
}

}