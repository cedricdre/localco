<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Typo -->
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <!-- Styles css -->
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <title>Localco - Inscription Membre</title>
</head>
<body>
<!-- main -->
<main>
    <!-- Section connexion -->
    <section>
        <div class="row align-items-center">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="bg-success vh-100 login-page-cover login-page-cover-img1">
                    <div class="text-light text-center p-6">
                        <h1 class="title-lilita display-1">BONJOUR !</h1>
                        <h4>Inscrivez-vous dès maintenant et faites partie de notre communauté engagée.</h4>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-12 px-0 pt-4 p-sm-5 p-lg-5">
                        <div class="text-center mb-4">
                            <a class="text-center" href="/index.php"><img src="/public/assets/img/logo-localco.svg" alt="Logo Localco" height="35"></a>
                        </div>
                        <div class="card bg-success-subtle border-0 rounded-0">
                            <div class="card-body text-center text-success px-5 py-4">
                                <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                                <h5 class="title-lilita">Devenir Membre</h5>
                                <form class="text-start" method="POST">
                                    <div class="row g-2">
                                        <div class="col-12">
                                            <label for="emailGuest" class="form-label">Votre adresse email*</label>
                                            <input type="email" class="form-control" id="emailGuest" name="emailGuest" placeholder="email@exemple.com" value="<?= $emailGuest ?? '' ?>" required>
                                            <small class="form-text text-danger"><?= $error['emailGuest'] ?? '' ?></small>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="passwordNewAccountGuest" class="form-label">Votre mot de passe*</label>
                                            <input type="password" class="form-control" id="passwordNewAccountGuest" name="passwordNewAccountGuest" placeholder="Entrez un mot de passe" pattern="<?= REGEX_PASSWORD ?>" required>
                                            <small class="form-text text-danger"><?= $error['passwordNewAccountGuest'] ?? '' ?></small>
                                        </div>
                                        <div class="col-xl-6 text-truncate">
                                            <label for="passwordConfirmNewAccountGuest" class="form-label">Confirmation du mot de passe*</label>
                                            <input type="password" class="form-control" id="passwordConfirmNewAccountGuest" name="passwordConfirmNewAccountGuest" placeholder="Confirmez votre mot de passe" pattern="<?= REGEX_PASSWORD ?>" required>
                                            <small class="form-text text-danger"><?= $error['passwordConfirmNewAccountGuest'] ?? '' ?></small>
                                        </div>
                                        <small id="pwdSecurity" class="d-none"><span class="badge bg-danger">Mot de passe Faible</span> Doit contenir au moins 8 caractères : une minuscule, une majuscule, un chiffre et un caractère spécial.</small>
                                        <small id="pwdSecurityLow" class="d-none"><span class="badge bg-danger">Mot de passe Faible</span> Ajouter au moins un chiffre.</small>
                                        <small id="pwdSecurityMedium" class="d-none"><span class="badge bg-warning">Mot de passe Moyen</span> ajouter au moins un caractère spécial.</small>
                                        <small id="pwdSecurityStrong" class="d-none"><span class="badge bg-success">Mot de passe Fort</span></small>
                                        <small id="pwdMessageError" class="form-text d-none text-danger">Merci de renseigner 2 mots de passe identique</small>
                                        <div class="col-xl-6">
                                            <label for="firstnameNewAccountGuest" class="form-label">Prénom*</label>
                                            <input type="text" class="form-control" id="firstnameNewAccountGuest" name="firstnameNewAccountGuest" placeholder="Entrez un prénom" pattern="<?= REGEX_NAME ?>" value="<?= $firstnameNewAccountGuest ?? '' ?>" required>
                                            <small class="form-text text-danger"><?= $error['firstnameNewAccountGuest'] ?? '' ?></small>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="lastnameNewAccountGuest" class="form-label">Nom*</label>
                                            <input type="text" class="form-control" id="lastnameNewAccountGuest" name="lastnameNewAccountGuest" placeholder="Entrez un nom" pattern="<?= REGEX_NAME ?>" value="<?= $lastnameNewAccountGuest ?? '' ?>" required>
                                            <small class="form-text text-danger"><?= $error['lastnameNewAccountGuest'] ?? '' ?></small>
                                        </div>
                                        <div class="col-12">
                                            <label for="dietNewAccountGuest" class="form-label">Régime alimentaires <small>(Option)</small></label>
                                            <select id="dietNewAccountGuest" name="dietNewAccountGuest" class="form-select mb-lg-2">
                                                <option value="">Sélectionnez votre régime alimentaire</option>
                                                <?php
                                                foreach (DIETS as $diet) { ?>
                                                    <option value="<?= $diet ?>" <?= (isset($dietNewAccountGuest) && $dietNewAccountGuest == $diet) ? 'selected' : '' ?>><?= $diet ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                            <small class="form-text text-danger"><?= $error['dietNewAccountGuest'] ?? '' ?></small>
                                        </div>
                                        <div class="col-12 mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="privacyPolicy" name="privacyPolicy" required>
                                            <label for="privacyPolicy">J'accepte la <a href="#" target="_blank">Politique de confidentialité</a>*</label>
                                            <small class="form-text text-danger"><?= $error['privacyPolicy'] ?? '' ?></small>
                                        </div>
                                        <button type="submit" class="btn btn-success w-100">Inscription</button>
                                        <small class="text-center">*Champs obligatoires</small>
                                    </div>
                                </form>
                                <?php } else { ?>
                                <img src="/public/assets/img/tomato.svg" height="150" alt="tomate souriante">
                                <h2 class="title-lilita my-4">Inscription confirmée !</h2>
                                <a href="/controllers/login/login-ctrl.php" type="button" id="submitLogin" class="btn btn-outline-success mb-2">J'accède à mon compte.</a>
                                <?php  } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- FIN Section connexion -->
</main><!-- FIN main -->

    <!-- script mot de passe -->
    <script src="/public/assets/js/script-mdp-user.js"></script>
    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>