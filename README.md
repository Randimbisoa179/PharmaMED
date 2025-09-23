# ![PHP](https://img.shields.io/badge/PHP-7.4-777BB4?style=flat&logo=php) ![Laravel](https://img.shields.io/badge/Laravel-8.x-EF3B24?style=flat&logo=laravel) ![MySQL](https://img.shields.io/badge/MySQL-5.7-4479A1?style=flat&logo=mysql) ![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=flat&logo=javascript) ![Bootstrap](https://img.shields.io/badge/Bootstrap-4.6-563D7C?style=flat&logo=bootstrap)

# PharmaMED

PharmaMED est une application web de gestion des achats et des entrées de produits pharmaceutiques. Elle permet aux utilisateurs de suivre les achats effectués, de gérer les produits disponibles et de visualiser des statistiques sur les ventes. Ce projet est construit avec le framework Laravel et utilise une base de données MySQL pour le stockage des données.

## Fonctionnalités clés
- Gestion des utilisateurs
- Suivi des achats de produits
- Gestion des entrées de produits
- Statistiques sur les ventes
- Interface utilisateur réactive

## Stack Technologique

| Technologie       | Description                          |
|-------------------|--------------------------------------|
| ![PHP](https://img.shields.io/badge/PHP-7.4-777BB4?style=flat&logo=php)      | Langage de programmation backend     |
| ![Laravel](https://img.shields.io/badge/Laravel-8.x-EF3B24?style=flat&logo=laravel) | Framework PHP pour le développement web |
| ![MySQL](https://img.shields.io/badge/MySQL-5.7-4479A1?style=flat&logo=mysql)  | Système de gestion de base de données |
| ![JavaScript](https://img.shields.io/badge/JavaScript-ES6-F7DF1E?style=flat&logo=javascript) | Langage de programmation pour le frontend |
| ![Bootstrap](https://img.shields.io/badge/Bootstrap-4.6-563D7C?style=flat&logo=bootstrap) | Framework CSS pour le design responsive |

## Instructions d'installation

### Prérequis
- PHP >= 7.4
- Composer
- MySQL
- Node.js et npm

### Étapes d'installation
1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/Randimbisoa179/PharmaMED.git
   cd PharmaMED
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances JavaScript**
   ```bash
   npm install
   ```

4. **Configurer l'environnement**
   - Copier le fichier `.env.example` en `.env` :
   ```bash
   cp .env.example .env
   ```
   - Configurer les variables d'environnement dans le fichier `.env`, notamment les informations de connexion à la base de données.

5. **Générer la clé d'application**
   ```bash
   php artisan key:generate
   ```

6. **Migrer la base de données**
   ```bash
   php artisan migrate
   ```

7. **Démarrer le serveur de développement**
   ```bash
   php artisan serve
   ```

## Utilisation

Pour accéder à l'application, ouvrez votre navigateur et rendez-vous à l'adresse suivante : [http://localhost:8000](http://localhost:8000).

### Exemples d'utilisation
- **Ajouter un produit** : Accédez à la section des produits et remplissez le formulaire pour ajouter un nouveau produit.
- **Visualiser les statistiques** : Naviguez vers la section des statistiques pour voir les données de vente.

## Structure du projet

Voici un aperçu de la structure du projet :

```
PharmaMED/
├── app/
│   ├── Http/
│   │   └── Controllers/         # Contrôleurs pour gérer les requêtes
│   │       ├── AchatController.php
│   │       ├── EntreeController.php
│   │       ├── HomeController.php
│   │       ├── ProduitController.php
│   │       └── StatistiqueController.php
│   ├── Models/                  # Modèles représentant les entités de la base de données
│   │   ├── Achat.php
│   │   ├── Entree.php
│   │   ├── Produit.php
│   │   └── User.php
│   └── Providers/               # Fournisseurs de services pour l'application
│       └── AppServiceProvider.php
├── config/                      # Fichiers de configuration de l'application
├── database/                    # Migrations et seeders pour la base de données
│   ├── migrations/
│   └── seeders/
├── public/                      # Fichiers accessibles publiquement (CSS, JS, images)
├── resources/                   # Ressources de l'application (vues, fichiers statiques)
│   └── views/
├── routes/                      # Définition des routes de l'application
│   └── web.php
└── tests/                       # Tests unitaires et fonctionnels
```

## Contribuer

Les contributions sont les bienvenues ! Pour contribuer, veuillez suivre ces étapes :
1. Fork le projet.
2. Créez une nouvelle branche (`git checkout -b feature/nouvelle-fonctionnalité`).
3. Commitez vos modifications (`git commit -m 'Ajout d'une nouvelle fonctionnalité'`).
4. Poussez vers la branche (`git push origin feature/nouvelle-fonctionnalité`).
5. Ouvrez une Pull Request.

Merci de votre intérêt pour PharmaMED !
