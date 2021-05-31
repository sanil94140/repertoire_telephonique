<?php

include DOSSIER_MODELS.'/Contacts.php';



// AFFICHAGE ------------------------------------------------

function index()
{
    $tableau = Contacts::all();
    include DOSSIER_VIEWS.'/contacts/listeContacts.html.php';
}



// ACTIONS ------------------------------------------------

function verifierPayload(array $data)
{
    if (!isset($data['nom']) || $data['nom'] === '')
    {
        return "Vous devez spécifier le nom du contact";
    }

    if (!isset($data['prenom']) || $data['prenom'] === '')
    {
        return "Vous devez spécifier le prénom du contact";
    }
    if (!isset($data['num_tel']) || $data['num_tel'] === '')
    {
        return "Vous n'avez pas inséré le numéro de téléphone du nouveau contact!!!";
    }
    if (!isset($data['email']) || $data['email'] === '')
    {
        return "Vous n'avez pas indiqué l'adresse mail de ce nouveau contact";
    }

    return null;
}

function convertirPayloadEnObjet(array $data)
{
    $contact = new Contacts();
    $contact->nom = $data['nom'];
    $contact->prenom = $data['prenom'];
    $contact->num_tel = $data['num_tel'];
    $contact->email = $data['email'];

    return $contact;
}


function nouveau()
{
    $messageErreur = null;
    if (isset($_POST['btn-valider']))
    {
        var_dump($_POST);
        $messageErreur = verifierPayload($_POST);
        if ($messageErreur === null)
        {
            $contact = convertirPayloadEnObjet($_POST);
            $contact->save();
            header("LOCATION: /repertoire_telephonique/router.php/liste-des-contacts");
        }
    }

    include DOSSIER_VIEWS.'/contacts/ajouter.html.php';
}




function change()
{
    if (!isset($_GET['id']))
    {
        die();
    }

    $contact = Contacts::retrieveByPK($_GET['id']);


    $messageErreur = null;
    if (isset($_POST['btn-valider']))
    {
        // $messageErreur = verifierPayload($_POST);
        if ($messageErreur === null)
        {
            $contact2 = convertirPayloadEnObjet($_POST);
            if($contact2->nom!==''){
                $contact->nom=$contact2->nom;
            }
            if($contact2->prenom!==''){
                $contact->prenom=$contact2->prenom;
            }
            if($contact2->num_tel!==''){
                $contact->num_tel=$contact2->num_tel;
            }
            if($contact2->email!==''){
                $contact->email=$contact2->email;
            }
            $contact->save();
            header("LOCATION: /repertoire_telephonique/router.php/liste-des-contacts");

        }
    }

    include DOSSIER_VIEWS.'/contacts/modifier.html.php';
}


function delete()
{
    if (!isset($_GET['id']))
    {
        die();
    }

    $contact = Contacts::retrieveByPK($_GET['id']);
    $contact->delete();
    header("LOCATION: /repertoire_telephonique/router.php/liste-des-contacts");
}


?>