<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="display-4 text-center">Ajout d'un nouveau contact</h1>

        <?php
        if ($messageErreur !== null) 
        {
        ?>

            <div class="alert alert-danger" role="alert">
                <?php echo $messageErreur; ?>
            </div>

        <?php
        }
        ?>

        <form method="POST" action="" enctype="multipart/form-data" class="p-5">
            <div class="form-group">
                <label>Nom du contact</label>
                <input type="text" name="nom" class="form-control">
            </div>
            <div class="form-group">
                <label>Prenom du contact</label>
                <input type="text" name="prenom" class="form-control">
            </div>
            <div class="form-group">
                <label>Numéro de téléphone du contact</label>
                <input type="text" name="num_tel" class="form-control">
            </div>
            <div class="form-group">
                <label>Adresse mail du contact</label>
                <input type="text" name="email" class="form-control">
            </div>
            <button name="btn-valider" type="submit" class="btn btn-primary">Ajouter l'article'</button>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>