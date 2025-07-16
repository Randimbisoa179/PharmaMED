# README - Projet 1 : Gestion d’une pharmacie

## Description du projet
Ce projet consiste à développer une application de gestion de pharmacie permettant de gérer les médicaments, les entrées en stock, et les achats des clients. L'application offre des fonctionnalités CRUD pour les tables, génère des factures, et fournit des statistiques utiles pour la gestion de la pharmacie.

## Tables de la base de données
1. **MEDICAMENT**
   - `numMedoc` (string) : Identifiant du médicament.
   - `Design` (string) : Désignation du médicament.
   - `prix_unitaire` (int) : Prix unitaire du médicament.
   - `stock` (int) : Quantité en stock (initialisé à 0).

2. **ENTREE**
   - `numEntree` (string) : Identifiant de l'entrée en stock.
   - `numMedoc` (string) : Identifiant du médicament concerné.
   - `stockEntree` (int) : Quantité entrée en stock.
   - `dateEntree` (date) : Date de l'entrée en stock.

3. **ACHAT**
   - `numAchat` (string) : Identifiant de l'achat.
   - `numMedoc` (string) : Identifiant du médicament acheté.
   - `nomClient` (string) : Nom du client.
   - `nbr` (int) : Quantité achetée.
   - `dateAchat` (date) : Date de l'achat.

## Fonctionnalités
1. **CRUD** : Création, lecture, mise à jour et suppression des données pour les 3 tables.
2. **Gestion du stock** :
   - Mise à jour automatique du stock lors des entrées et des achats.
   - Signalement en cas de stock insuffisant lors d'un achat.
3. **Recherche** : Recherche de médicaments par désignation avec l'opérateur `LIKE %...%`.
4. **Facturation** : Génération d'une facture au format PDF après chaque achat.
5. **Alertes** : Liste des médicaments en rupture de stock (moins de 5 unités).
6. **Statistiques** :
   - Recette totale de la pharmacie.
   - Liste des 5 médicaments les plus vendus.
   - Histogramme des recettes par mois (5 derniers mois).

## Exemple de facture
Date : 23/05/2023
Nom du Client : RAKOTO Bernard

Désignation	Prix Unitaire	Nombre	Total
Paracétamol	1000	2	2000 Ar
Vitamine C	500	3	1500 Ar
3500 Ar

## Technologies recommandées
- **Backend** : PHP.
- **Base de données** : MySQL.
- **Génération de PDF** : Bibliothèque comme FPDF (PHP).
- **Graphiques** : Bibliothèque comme Chart.js.

## Installation
1. Cloner le dépôt du projet.
2. Configurer la base de données avec les tables décrites ci-dessus.
3. Installer les dépendances nécessaires (ex: bibliothèques pour PDF et graphiques).
4. Lancer l'application.

## Auteur
RANDIMBISOAHERINIRINA Euben José Tyran
