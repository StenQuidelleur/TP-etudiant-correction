<?php START_LAYOUT; ?>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Homepage</a>
        </div>
    </nav>
    <div class="container">
        <div class="row my-5">
            <h1 class="text-center">User : <?= $user->getNom(). ' ' . $user->getPrenom(); ?></h1>
        </div>
        <div class="container-fluid mt-5 d-flex justify-content-center">
            <div class="row col-6">
                <h1 class="text-center">Connexion</h1>
                <?php if ($info === 'success') { ?>
                    <h3 class="my-5 text-center text-success">Vous êtes connecté !</h3>
                <?php } else { ?>
                    <form method="POST" class="mt-5">
                        <em class="text-danger"><?= $info; ?></em>
                        <div class="my-3">
                            <label for="identification" class="form-label">Identifiant</label>
                            <input type="text" class="form-control" name="identification" id="identification">
                            <label for="password" class="form-label mt-3">Mot de passe</label>
                            <input type="text" class="form-control" name="password" id="password">
                        </div>
                        <div class="d-flex flex-row">
                            <button type="submit" class="btn btn-success">Valider</button>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
<?php END_LAYOUT; ?>