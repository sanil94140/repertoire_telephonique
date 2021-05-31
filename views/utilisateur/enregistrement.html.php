<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="display-4 text-center">Création d'un compte</h1>

        <?php
        if ($erreurs !== []) 
        {
        ?>

            <div class="alert alert-danger" role="alert">
                <?php echo $erreurs; ?>
            </div>

        <?php
        }
        ?>


        <form method="POST" action="" enctype="multipart/form-data" class="p-5">
        <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo" required autofocus>
    </div>

    <div class="form-group">
        <label for="login">Identifiant</label>
        <input type="text" class="form-control" name="login" id="login" placeholder="Identifiant" required>
    </div>

    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" minlength="8" required>
    </div>

    <div class="form-group">
        <label for="password-conf">Confirmation du mot de passe</label>
        <input type="password" class="form-control" name="password-conf" id="password-conf" placeholder="Confirmation du mot de passe" required>
    </div>

    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="url" class="form-control" name="avatar" id="avatar" placeholder="Avatar" required>
    </div>
    <div class="form-group">
        <input type="checkbox" id="admin" name="admin">
        <label for="admin">Rôle Admin</label>
    </div>

            <button name="btn-valider" type="submit" class="btn btn-primary">S'inscrire'</button>
        </form>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>