<!DCOTYPE html>
<html>
    <head>
        <title>Liste des articles</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    </head>
    <body>
    <div class="container">
    <h1 class="display-4 text-center">Tableau des articles</h1>
    <div class="text-center m-5">
    <?php if (isset($_SESSION['utilisateur']->role) && $_SESSION['utilisateur']->role == 'admin') { ?>
    <a href="/repertoire_telephonique/router.php/ajouter-contact" class="btn btn-primary">Ajouter un nouveau contact</a> 
    <?php }; ?>
    <a href="/repertoire_telephonique/router.php/accueil" class="btn btn-primary">Retour à l'accueil</a> 
    </div>
        <table class="table table-striped w-75 mx-auto">
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Numéro de téléphone</th>
                <th>Adresse mail</th>

            </tr>
            
            <?php
            foreach ($tableau as $element) {
            ?>

                <tr>
                    <td class="w-25"><?php echo $element->nom ?></td>
                    <td class="w-25"><?php echo $element->prenom ?></td>
                    <td class="w-25"><a href='tel:'.<?php $element->num_tel ?>><?php echo $element->num_tel ?></a></td>
                    <td class="w-25"><a href='mailto:'.<?php $element->email ?>><?php echo $element->email ?></a></td>
                    <?php if (isset($_SESSION['utilisateur']->role) && $_SESSION['utilisateur']->role == 'admin') { ?>
                    <td>
                        <a href="/repertoire_telephonique/router.php/modifier-contact?id=<?php echo $element->id ?>" class="btn btn-secondary">Modifier les coordonnées du contact</a> 
                        <a href="/repertoire_telephonique/router.php/supprimer-contact?id=<?php echo $element->id ?>" class="btn btn-danger">Supprimer le contact</a> 
                    </td>
                    <?php }; ?>
                </tr>

            <?php
            }
            ?>

        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    </body>
</html>