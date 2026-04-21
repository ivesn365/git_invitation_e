<?php
 session_set_cookie_params([
    'lifetime' => 0, // La session expire quand le navigateur est fermé
    'path' => '/',
    'domain' => '', // Laisse vide pour fonctionner sur tous les sous-domaines
    'secure' => true, // Nécessite HTTPS, empêche l'envoi des cookies en HTTP
    'httponly' => true, // Empêche JavaScript d’accéder aux cookies
    'samesite' => 'Strict' // Protège contre les attaques CSRF
]);
session_start();
session_regenerate_id(true);

require ('models/Connexion.php');
require ('models/Query.php');
require ('models/AES.php');
require ('models/Events.php');
require ('models/Emplacement.php');
require ('models/Users.php');
require ('models/Billet.php');
require ('models/Livre_or.php');
require ('models/ConvertA.php');