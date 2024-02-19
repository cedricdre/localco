<?php include __DIR__ . '/../../../views/templates/baner-dashboard-users.php' ?>
<!-- section Mon tableau de bord -->
<section class="py-4 py-lg-5">
    <div class="container">
        <div class="text-center mb-4">
            <nav aria-label="breadcrumb mb-5">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/controllers/dashboard-users/home-ctrl.php">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="/controllers/dashboard-users/users/update-users-ctrl.php">Informations personnelles</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
            <h4 class="title-lilita"><?= $title ?></h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 text-center">
                <form method="POST">
                    <div class="mb-3">
                        <label for="password" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Entrez un mot de passe" pattern="<?= REGEX_PASSWORD ?>" value="<?= $passwordHash ?? '' ?>">
                        <small class="form-text text-danger"><?= $error['password'] ?? '' ?></small>
                    </div>

                    <div class="mb-3">
                        <label for="passwordConfirm" class="form-label">Confirmation du mot de passe</label>
                        <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="Confirmez votre mot de passe" pattern="<?= REGEX_PASSWORD ?>" value="<?= $passwordHash ?? '' ?>">
                        <small class="form-text text-danger"><?= $error['passwordConfirm'] ?? '' ?></small>
                    </div>
                    <p>
                    <!-- <small id="pwdSecurity" class="d-none"><span class="badge bg-danger">Mot de passe Faible</span> Doit contenir au moins 8 caractères : une minuscule, une majuscule, un chiffre et un caractère spécial.</small>
                    <small id="pwdSecurityLow" class="d-none"><span class="badge bg-danger">Mot de passe Faible</span> Ajouter au moins un chiffre.</small>
                    <small id="pwdSecurityMedium" class="d-none"><span class="badge bg-warning">Mot de passe Moyen</span> ajouter au moins un caractère spécial.</small>
                    <small id="pwdSecurityStrong" class="d-none"><span class="badge bg-success">Mot de passe Fort</span></small> -->
                    <small id="pwdMessageError" class="form-text d-none text-danger">Merci de renseigner 2 mots de passe identique</small>
                    </p>
                    <button type="submit" class="btn btn-outline-success my-3">Je confirme</button>
                </form>
            </div>
        </div>
    </div>
</section><!-- FIN section Mon tableau de bord -->

<!-- script mot de passe -->
<script src="/public/assets/js/script-mdp.js"></script>