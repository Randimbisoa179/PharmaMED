<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture pour {{$numAchat}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .receipt {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details table {
            width: 100%;
            border-collapse: collapse;
        }
        .details th, .details td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .details .montanth{
            text-align: center;
        }
        .details .montant{
            text-align: right;
        }        
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="header">
            <h2>Facture pour l'achat {{$numAchat}}</h2>
            <p>Date : {{ $dateAchat }}</p>
        </div>
        <div class="details">
            <p><strong>Nom du Client :</strong> {{ $nomClient }}</p>
        </div>
    
        <div class="details">
            <table>
                <thead>
                    <tr>
                        <th class="montanth">Designation</th>
                        <th class="montanth">Prix unitaire</th>
                        <th class="montanth">Nombre</th>
                        <th class="montanth">Total</th>
                    </tr>
                </thead>
                <tbody>
                  
                        <tr>
                            <td>{{ $Design }}</td>
                            <td >{{ $prix_unitaire}} AR</td>
                            <td>{{$nbr}}</td>
                            <td>{{$total}} AR</td>
                        </tr> 
                        
                </tbody>
                <tfoot>
                    <tr>
                        <td class="total" colspan="3">Total General</td>
                        <td class="total montant">{{ $totalM }} AR</td>
                    </tr>
                </tfoot>
            </table>
            
        </div>
    </div>
</body>
</html>
