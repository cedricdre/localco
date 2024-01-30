<?php include __DIR__.'/../../../views/templates/baner-dashboard-users.php' ?>
<!-- section Mon tableau de bord -->
<section class="py-4 py-lg-5">
    <div class="container">
        <div class="text-center mb-4">
            <nav aria-label="breadcrumb mb-5">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/controllers/dashboard-users/home-ctrl.php">Tableau de bord</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Informations personnelles</li>
                </ol>
            </nav>
            <h4 class="title-lilita">Informations personnelles</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form class="mb-3" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                            <label for="email" class="form-label">Votre adresse email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@exemple.com" value="<?= $email ?? '' ?>" disabled>
                            <small class="form-text text-danger"><?= $error['email'] ?? '' ?></small>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                            <label for="firstname" class="form-label">Prénom*</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Entrez un prénom" pattern="<?= REGEX_NAME ?>" value="<?= $firstname ?? '' ?>" required>
                            <small class="form-text text-danger"><?= $error['firstname'] ?? '' ?></small>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                            <label for="lastname" class="form-label">Nom*</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Entrez un nom" pattern="<?= REGEX_NAME ?>" value="<?= $lastname ?? '' ?>" required>
                            <small class="form-text text-danger"><?= $error['lastname'] ?? '' ?></small>
                            </div>
                        </div>
                        <h5 class="title-lilita text-center my-3">Changer votre mot de passe</h5>
                        <div class="col-xl-6">
                            <div class="mb-3">
                            <label for="password" class="form-label">Nouveau mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Entrez un mot de passe" pattern="<?= REGEX_PASSWORD ?>">
                            <small class="form-text text-danger"><?= $error['password'] ?? '' ?></small>
                            </div>
                        </div>
                        <div class="col-xl-6 text-truncate">
                            <div class="mb-3">
                            <label for="passwordConfirm" class="form-label">Confirmation du mot de passe</label>
                            <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="Confirmez votre mot de passe" pattern="<?= REGEX_PASSWORD ?>">
                            <small class="form-text text-danger"><?= $error['passwordConfirm'] ?? '' ?></small>
                            </div>
                        </div>
                        <small id="pwdSecurity" class="d-none"><span class="badge bg-danger">Mot de passe Faible</span> Doit contenir au moins 8 caractères : une minuscule, une majuscule, un chiffre et un caractère spécial.</small>
                        <small id="pwdSecurityLow" class="d-none"><span class="badge bg-danger">Mot de passe Faible</span> Ajouter au moins un chiffre.</small>
                        <small id="pwdSecurityMedium" class="d-none"><span class="badge bg-warning">Mot de passe Moyen</span> ajouter au moins un caractère spécial.</small>
                        <small id="pwdSecurityStrong" class="d-none"><span class="badge bg-success">Mot de passe Fort</span></small>
                        <small id="pwdMessageError" class="form-text d-none text-danger">Merci de renseigner 2 mots de passe identique</small>

                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-lg btn-success mb-3">Je valide</button>
                        </div>
                        <small class="text-center">*Champs obligatoires</small>
                    </div>
                </form>
                <div class="mt-5">
                    <div class="text-center">
                        <p><a class="btn btn-outline-danger" href="/controllers/dashboard-users/users/delete-ctrl.php" role="button">Supprimer mon compte</a></p>
                        <p class="small">Nous sommes navrés de vous voir partir. Après la confirmation de la suppression de votre compte, vous n’aurez plus accès à votre espace et vos commandes.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- FIN section Mon tableau de bord -->