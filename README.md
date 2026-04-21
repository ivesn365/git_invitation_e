# Event Invitation Web App

Application PHP pour la gestion d'événements, la génération d'invitations et la création de PDF/QR codes.

## Vue d'ensemble

Ce projet combine un back-end PHP avec des vues front-end en HTML/CSS/JS. Il inclut un tableau de bord d'administration, des pages invité, un générateur de QR code et des intégrations à TCPDF pour les PDF.

## Structure principale

- `index.php` : tableau de bord principal / page d'administration.
- `form-new-event.php` : page de gestion de création/modification d'événements.
- `invite.php` : page d'invitation utilisable par un invité connecté.
- `invitation_pdf.php` : génération d'invitations au format PDF.
- `scannerQr.php` : lecture et utilisation de QR codes.
- `login.html` : page de connexion.
- `header.php` : initialisation de session, chargement des modèles et protection HTTPS/HttpOnly.
- `models/` : classes métiers et accès base de données.
  - `Connexion.php` : connexion PDO MySQL.
  - `Events.php`, `Users.php`, `Billet.php`, `Livre_or.php`, etc.
- `pdf/` : bibliothèque TCPDF pour la génération de PDF.
- `qrcode/` : génération de QR codes via `qrlib.php`.
- `js/`, `css/`, `vendors/` : ressources front-end.
- `Sysvues/` : vues par rôle (`admin`, `client`, `invite`).
- `docs/` : fichiers générés, notamment les images QR et les logos d'événements.

## Prérequis

- PHP 7.4+ ou supérieur
- MySQL / MariaDB
- Serveur web Apache ou équivalent
- Extension PHP PDO MySQL activée
- HTTPS recommandé pour la sécurité des cookies

## Installation

1. Copier le projet dans le répertoire public du serveur (`htdocs/event` ou équivalent).
2. Assurer les permissions de lecture/écriture sur les dossiers suivants :
   - `docs/`
   - `pdf/`
   - `qrcode/`
3. Configurer la base de données dans `models/Connexion.php`.
4. Charger les tables nécessaires dans la base de données.
5. Accéder à l'application via `http://localhost/event/` ou le chemin adapté.

## Configuration de la base de données

Ouvrir `models/Connexion.php` et mettre à jour la chaîne de connexion PDO :

```php
$connexion  = new PDO('mysql:host=localhost;dbname=TON_DB;charset=utf8mb4','TON_USER','TON_MDP',$pdo_options);
```

Remplacer `TON_DB`, `TON_USER` et `TON_MDP` par les valeurs de votre environnement.

## Utilisation

- Administrateur : accéder à `index.php` pour consulter le tableau de bord et gérer les événements.
- Création d'événements : utiliser `form-new-event.php` ou les vues d'administration associées.
- Invitations : accéder à `invite.php` après authentification invité.
- PDF / QR : génération gérée via `invitation_pdf.php` et `qrcode/qrlib.php`.

## Fonctionnalités observées

- support des événements type `Mariage`
- génération de QR code dans `docs/qr.png`
- affichage d'un message personnalisé et d'un lien vers l'adresse de l'événement
- gestion d'un livre d'or via `Livre_or.php`
- session protégée via `header.php` avec `secure`, `httponly` et `samesite=Strict`

## Conseils

- Compléter la documentation de la base de données.
- Vérifier les routes et les pages incluses dans `Sysvues/admin/`.
- Tester le flux invité avant mise en production.

## Notes

- `models/Connexion.php` contient actuellement des identifiants MySQL vides.
- Le projet utilise des bibliothèques externes : TCPDF et phpqrcode.
- Le projet semble conçu pour un usage interne avec des rôles `adminSysY`, `client` et `invite`.
