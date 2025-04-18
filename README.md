# Laravel Invoice Generator from iCal

## 📝 Description

Application Laravel permettant aux professeurs de générer automatiquement leurs factures à partir d'un calendrier iCal fourni par une école.  
Chaque facture est générée selon les événements du calendrier et le taux horaire défini pour chaque client (école).

## ✨ Fonctionnalités

-   Gestion des utilisateurs (professeurs)
-   Gestion des clients (écoles)
-   Import et traitement de liens iCal
-   Génération automatique de factures
-   Exportation des factures en PDF
-   Attribution d'un taux horaire différent par client

## ⚙️ Installation

### Prérequis

-   PHP >= 8.1
-   Composer
-   Node.js & npm
-   SQLite

### Étapes

1. Cloner le dépôt

    ```bash
    git clone https://github.com/EnzoDiGiovanni/Hora-Facture.git
    cd <nom-du-dossier>
    ```

2. Installer les dépendances PHP

    ```bash
    composer install
    ```

3. Installer les dépendances front-end

    ```bash
    npm install
    npm run build
    ```

4. Copier et configurer l'environnement

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    - Configurer `.env` : choisir `DB_CONNECTION=sqlite` et définir le chemin de ta base de données (ex: `DB_DATABASE=/chemin/vers/database.sqlite`).

5. Lancer les migrations

    ```bash
    php artisan migrate
    ```

6. (Optionnel) Seeder des données de test

    ```bash
    php artisan db:seed
    ```

7. Démarrer le serveur
    ```bash
    php artisan serve
    ```

## 🚀 Utilisation

-   Créer un compte professeur
-   Ajouter un ou plusieurs clients (écoles) avec leur taux horaire
-   Importer un lien iCal pour récupérer les événements de cours
-   Générer une facture liée à un client à partir de ces événements
-   Imprimer ou envoyer la facture

## 🛠️ Stack Technique

-   Laravel 11
-   SQLite
-   Blade
-   TailwindCSS
-   API iCal Parser : [ical.mathieutu.dev](https://ical.mathieutu.dev)

## 🔥 Fonctionnalités à venir

-   Gestion multi-professeurs
-   Envoi automatique des factures par email
-   Gestion de l'état des paiements (payé, en attente)
-   Dashboard de suivi

## 👨‍💻 Auteur

-   **Nom :** Enzo Di Giovanni
-   **Contact :** [LinkedIn](https://www.linkedin.com/in/enzodigiovanni/) | [Github](https://github.com/EnzoDiGiovanni/Hora-Facture)
