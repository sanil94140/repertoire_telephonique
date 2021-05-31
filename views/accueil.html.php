<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />
    <title>Page d'accueil</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href='/repertoire_telephonique/router.php/liste-des-contacts'>Liste des Contacts</a>
          </li>

					<?php
					if (isset($_SESSION['utilisateur'])) {
					?>
						<?php if (isset($_SESSION['utilisateur']->role) && $_SESSION['utilisateur']->role == 'admin') { ?>
							<li class="nav-item">
								<a class="nav-link" href='/repertoire_telephonique/router.php/ajouter-contact'>Ajouter un contact</a>
							</li>
						<?php } ?>

						<li class="nav-item">
							<a class="nav-link" href='/repertoire_telephonique/router.php/deconnexion'>Se déconnecter</a>
						</li>
					<?php } else { ?>

						<li class="nav-item">
							<a class="nav-link" href='/repertoire_telephonique/router.php/connexion'>Se connecter</a>
						</li>
            <li>
            <a class="nav-link" href='/repertoire_telephonique/router.php/enregistrer_admin'>Créer un compte</a>
            </li>
					<?php } ?>
				</ul>

				<?php
				if (isset($_SESSION['utilisateur'])) {
				?>

					<p class="avatar my-2 text-light">
						<img src="<?php echo $_SESSION['utilisateur']->avatar; ?>" alt="Avatar de <?php echo $_SESSION['utilisateur']->pseudo; ?>"><?php echo $_SESSION['utilisateur']->pseudo; ?>
					</p>
				<?php } ?>

        </ul>
      </div>

    </nav>
    <p>
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum voluptate
      eos officia harum eveniet enim. Esse harum aperiam asperiores? Fugiat
      cupiditate commodi aliquam corrupti excepturi nemo dicta velit consequatur
      quam.
    </p>
  </body>
</html>
