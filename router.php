<?php

// Définitions des constantes
const DOSSIER_VIEWS = __DIR__.'/views';
const DOSSIER_CONTROLLERS = __DIR__.'/src/controllers';
const DOSSIER_MODELS = __DIR__.'/src/models';


// Connexion à la base de données
include __DIR__.'/SimpleOrm.class.php';
$conn = new mysqli('localhost', 'root', '');
SimpleOrm::useConnection($conn, 'repertoire_telephonique');


// Déclaration des routes
if ($_SERVER['PATH_INFO'] == '/liste-des-contacts') 
{
    require DOSSIER_CONTROLLERS.'/contacts.php';
    index();
}
else if ($_SERVER['PATH_INFO'] == '/accueil')
{
    header("LOCATION: /repertoire_telephonique/views/accueil.html.php");
}
else if ($_SERVER['PATH_INFO'] == '/ajouter-contact')
{
    require DOSSIER_CONTROLLERS.'/contacts.php';
    nouveau();
}
else if ($_SERVER['PATH_INFO'] == '/supprimer-contact')
{
    require DOSSIER_CONTROLLERS.'/contacts.php';
    delete();
} 
else if($_SERVER['PATH_INFO'] == '/modifier-contact'){
    require DOSSIER_CONTROLLERS.'/contacts.php';
    change();
}
else if($_SERVER['PATH_INFO'] == '/connexion'){
    require DOSSIER_CONTROLLERS.'/utilisateur.php';
    connexion();
}
else if($_SERVER['PATH_INFO'] == '/deconnexion'){
    require DOSSIER_CONTROLLERS.'/utilisateur.php';
    deconnexion();
}
else if($_SERVER['PATH_INFO'] == '/enregistrer_admin'){
    require DOSSIER_CONTROLLERS.'/utilisateur.php';
    enregistrerAdmin();
}


?>