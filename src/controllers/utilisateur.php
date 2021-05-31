<?php

include DOSSIER_MODELS.'/Utilisateur.php';


/// CONNEXION -----------------------------------------------------------------------------

function verifierPostConnexion(array $post): array {
    $erreurs = [];    // Je vais renvoyer un tableau d'erreurs (vide par défaut)

    if (empty($post['login'])) {
        $erreurs[] = 'L\'identifiant est manquant.'; // J'ajoute une erreur
    }

    if (empty($post['password'])) {
        $erreurs[] = 'Le mot de passe est manquant.';
    }

    return $erreurs;
}

function verifierPostEnregistrement(array $post = []): array {
	$erreurs = [];	// Je vais renvoyer un tableau d'erreurs (vide par défaut)

	if (empty($post['pseudo'])) {
		$erreurs[] = 'Le pseudo est obligatoire.'; // J'ajoute une erreur
	}

	if (empty($post['password'])) {
		$erreurs[] = 'Le mot de passe est obligatoire.';
	} elseif (strlen($post['password']) < 8) {
		$erreurs[] = 'Le mot de passe doit faire au moins 8 caractères.';
	}

	if (empty($post['password-conf'])) {
		$erreurs[] = 'Le mot de passe de confirmation est obligatoire.';
	} elseif ($post['password'] !== $post['password-conf']) {
		$erreurs[] = 'Les mots de passe doivent correspondre.';
	}

	if (empty($post['avatar'])) {
		$erreurs[] = 'L\'avatar est obligatoire.';
	} elseif (filter_var($post['avatar'], FILTER_VALIDATE_URL) === false) {
		$erreurs[] = 'L\'avatar doit être une URL.';
	}

	if (empty($post['login'])) {
		$erreurs[] = 'L\'identifiant est obligatoire.';
	}

	return $erreurs;
}

function construireUtilisateurAvecPost(array $post): Utilisateur {
	$utilisateur = new Utilisateur;

	$utilisateur->pseudo = $post['pseudo'];
	$utilisateur->avatar = $post['avatar'];
	$utilisateur->identifiant = $post['login'];
	$utilisateur->mot_de_passe = password_hash($post['password'], PASSWORD_BCRYPT); 
    if($post['admin']!==null){
        $utilisateur->role = 'admin';
    }else{
        $utilisateur->role = null;
    }


	return $utilisateur;
}

////Actions
function connexion() {
    if (!empty($_POST)) {

        // On vérifie le $_POST
        $erreurs = verifierPostConnexion($_POST);


        if (empty($erreurs)) {

            $utilisateur = Utilisateur::retrieveByField('identifiant', $_POST['login'], SimpleOrm::FETCH_ONE);

            if ($utilisateur !== null) {

                if (password_verify($_POST['password'], $utilisateur->mot_de_passe)) {


                    session_start();
                    $_SESSION['utilisateur'] = $utilisateur;

                    header("LOCATION: /repertoire_telephonique/router.php/accueil");
                } else {
                    $erreurs[] = 'Mauvais mot de passe.';
                }
            } else {
                $erreurs[] = 'Cet identifiant n\'existe pas.';
            }
        }
    }

    require DOSSIER_VIEWS . '/utilisateur/connexion.html.php';
}

function deconnexion() {

    session_start();
    session_destroy();

    header("LOCATION: /repertoire_telephonique/router.php/accueil");
}

function enregistrerAdmin() {
    if (isset($_POST['btn-valider'])) {

        // On vérifie le $_POST
        $erreurs = verifierPostEnregistrement($_POST);


        if (empty($erreurs)) {
            // S'il n'y a pas d'erreur

            // On crée un nouvel utilisateur
            $utilisateur = construireUtilisateurAvecPost($_POST);
            $utilisateur->save();

            // On redirige
            header("LOCATION: /repertoire_telephonique/router.php/connexion");
        }
    }

    require DOSSIER_VIEWS . '/utilisateur/enregistrement.html.php';
}

?>