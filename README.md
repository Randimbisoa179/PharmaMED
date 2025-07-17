#  Gestion d’une pharmacie

## Technologies utilisées
- **Backend** : Laravel (PHP)
- **Frontend** : Bootstrap
- **Génération de PDF** : FPDF
- **Graphiques** : Chart.js

## Description du projet
Ce projet consiste à développer une application de gestion de pharmacie avec les fonctionnalités suivantes :

### I) Tables manipulées par l’application
1. **MEDICAMENT**  
   - `numMedoc` (string) : Numéro du médicament  
   - `Design` (string) : Désignation du médicament  
   - `prix_unitaire` (int) : Prix unitaire  
   - `stock` (int) : Stock initial toujours à 0  

2. **ENTREE**  
   - `numEntree` (string) : Numéro de l'entrée  
   - `numMedoc` (string) : Référence du médicament  
   - `stockEntree` (int) : Quantité entrée  
   - `dateEntree` (date) : Date de l'entrée  
   - Le stock des médicaments est mis à jour par addition.  

3. **ACHAT**  
   - `numAchat` (string) : Numéro de l'achat  
   - `numMedoc` (string) : Référence du médicament  
   - `nomClient` (string) : Nom du client  
   - `nbr` (int) : Quantité achetée  
   - `dateAchat` (date) : Date de l'achat  
   - Le stock des médicaments est mis à jour par soustraction.  
   - L'application signale un stock insuffisant (-1).  

### II) Fonctionnalités (Traitements)
1. **CRUD**  
   - Création, listage, suppression et modification des 3 tables (9 pts).  

2. **Gestion des stocks**  
   - Signalement en cas de stock insuffisant (1 pt).  
   - Liste des médicaments en rupture de stock (moins de 5 en quantité) (1 pt).  

3. **Recherche**  
   - Recherche de médicament par désignation avec `LIKE %...%` (1 pt).  

4. **Facturation**  
   - Génération d'une facture (PDF) pour les clients après achat (3 pts).  

5. **Statistiques**  
   - Recette totale accumulée par la pharmacie (1 pt).  
   - Affichage des 5 médicaments les plus vendus (2 pts).  
   - Histogramme des recettes par mois (les 5 derniers mois) avec Chart.js (2 pts).  

### Exemple de facture
Date : 23/05/2023
Nom du Client : RAKOTO Bernard

Désignation	Prix Unitaire	Nombre	Total
Paracétamol	1000	2	2000 Ar
Vitamine C	500	3	1500 Ar
TOTAL	3500 Ar

## Installation
1. Cloner le dépôt :  
   ```bash
   git clone [lien-du-projet]

Installer les dépendances :

bash
composer install
npm install
Configurer la base de données dans .env.

Exécuter les migrations :

bash
php artisan migrate

Lancer l'application :

bash
php artisan serve
