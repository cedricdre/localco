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
    <title>Localco - Inscription Producteur</title>
</head>
<body>
<!-- main -->
<main>
    <!-- Section connexion -->
    <section>
        <div class="row align-items-center">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="bg-warning vh-100 login-page-cover login-page-cover-img3">
                    <div class="text-light text-center p-6">
                        <h1 class="title-lilita display-1">BONJOUR !</h1>
                        <h4>Rejoignez notre communauté en quelques étapes simples et rapides.</h4>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="row justify-content-center">
                    <div class="col-12 p-5">
                        <div class="text-center mb-4">
                            <a class="text-center" href="/index.php"><img src="/public/assets/img/logo-localco.svg" alt="Logo Localco" height="35"></a>
                        </div>
                        <div class="card bg-success-subtle border-0 rounded-0">
                            <div class="card-body text-center text-success px-5 py-4">
                                <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                                <h5 class="title-lilita">Proposer vos Produits</h5>
                                <form class="text-start" method="POST">
                                    <div class="row g-2">
                                        <div class="col-12">
                                            <label for="emailProducer" class="form-label">Votre adresse email*</label>
                                            <input type="email" class="form-control" id="emailProducer" name="emailProducer" placeholder="email@exemple.com" value="<?= $emailProducer ?? '' ?>" required>
                                            <small class="form-text text-danger"><?= $error['emailProducer'] ?? '' ?></small>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="passwordProducer" class="form-label">Votre mot de passe*</label>
                                            <input type="password" class="form-control" id="passwordProducer" name="passwordProducer" placeholder="Entrez un mot de passe" pattern="<?= REGEX_PASSWORD ?>" required>
                                            <small class="form-text text-danger"><?= $error['passwordProducer'] ?? '' ?></small>
                                        </div>
                                        <div class="col-xl-6 text-truncate">
                                            <label for="passwordConfirmProducer" class="form-label">Confirmation du mot de passe*</label>
                                            <input type="password" class="form-control" id="passwordConfirmProducer" name="passwordConfirmProducer" placeholder="Confirmez votre mot de passe" pattern="<?= REGEX_PASSWORD ?>" required>
                                            <small class="form-text text-danger"><?= $error['passwordConfirmProducer'] ?? '' ?></small>
                                        </div>
                                        <small id="pwdSecurity" class="d-none"><span class="badge bg-danger">Mot de passe Faible</span> Doit contenir au moins 8 caractères : une minuscule, une majuscule, un chiffre et un caractère spécial.</small>
                                        <small id="pwdSecurityLow" class="d-none"><span class="badge bg-danger">Mot de passe Faible</span> Ajouter au moins un chiffre.</small>
                                        <small id="pwdSecurityMedium" class="d-none"><span class="badge bg-warning">Mot de passe Moyen</span> ajouter au moins un caractère spécial.</small>
                                        <small id="pwdSecurityStrong" class="d-none"><span class="badge bg-success">Mot de passe Fort</span></small>
                                        <small id="pwdMessageErrorProducer" class="form-text d-none text-danger">Merci de renseigner 2 mots de passe identique</small>

                                        <div class="col-xl-6">
                                            <label for="namebusinessProducer" class="form-label">Nom de l’entreprise*</label>
                                            <input type="text" class="form-control" id="namebusinessProducer" name="namebusinessProducer" placeholder="Entrez le nom de votre entreprise" pattern="<?= REGEX_NAME ?>" value="<?= $namebusinessProducer ?? '' ?>" required>
                                            <small class="form-text text-danger"><?= $error['namebusinessProducer'] ?? '' ?></small>
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="siretProducer" class="form-label">Siret/Siren</label>
                                            <input type="text" inputmode="numeric" class="form-control" id="siretProducer" name="siretProducer" placeholder="ex : 12345678901234" pattern="<?= REGEX_SIRET ?>" value="<?= $siretProducer ?? '' ?>">
                                            <small class="form-text text-danger"><?= $error['siretProducer'] ?? '' ?></small>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="firstnameProducer" class="form-label">Prénom*</label>
                                            <input type="text" class="form-control" id="firstnameProducer" name="firstnameProducer" placeholder="Entrez un prénom" pattern="<?= REGEX_NAME ?>" value="<?= $firstnameProducer ?? '' ?>" required>
                                            <small class="form-text text-danger"><?= $error['firstnameProducer'] ?? '' ?></small>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="lastnameProducer" class="form-label">Nom*</label>
                                            <input type="text" class="form-control" id="lastnameProducer" name="lastnameProducer" placeholder="Entrez un nom" pattern="<?= REGEX_NAME ?>" value="<?= $lastnameProducer ?? '' ?>" required>
                                            <small class="form-text text-danger"><?= $error['lastnameProducer'] ?? '' ?></small>
                                        </div>
                                        <div class="col-xl-4">
                                            <label for="phoneProducer" class="form-label">Numéro de téléphone</label>
                                            <input type="tel" class="form-control" id="phoneProducer" name="phoneProducer" placeholder="Entrez un numéro" pattern="<?= REGEX_PHONE ?>" value="<?= $phoneProducer ?? '' ?>">
                                            <small class="form-text text-danger"><?= $error['phoneProducer'] ?? '' ?></small>
                                        </div>
                                        <div class="col-xl-5">
                                            <label for="adressProducer" class="form-label">Adresse postal*</label>
                                            <input type="text" class="form-control" id="adressProducer" name="adressProducer" placeholder="ex : 1 rue des Champs" pattern="<?= REGEX_ADRESS ?>" value="<?= $adressProducer ?? '' ?>" required>
                                            <small class="form-text text-danger"><?= $error['adressProducer'] ?? '' ?></small>
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="zipProducer" class="form-label">Code postal*</label>
                                            <input type="text" inputmode="numeric" class="form-control" id="zipProducer" name="zipProducer" placeholder="ex : 80000" pattern="<?= REGEX_POSTAL_CODE ?>" value="<?= $zipProducer ?? '' ?>" required>
                                            <small class="form-text text-danger"><?= $error['zipProducer'] ?? '' ?></small>
                                        </div>
                                        <div class="col-xl-4 mb-2">
                                            <label for="cityProducer" class="form-label">Ville*</label>
                                            <input type="text" class="form-control" id="cityProducer" name="cityProducer" placeholder="ex : Amiens" pattern="<?= REGEX_CITY ?>" value="<?= $cityProducer ?? '' ?>" required>
                                            <small class="form-text text-danger"><?= $error['cityProducer'] ?? '' ?></small>
                                        </div>
                                        <div class="col-12 form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="privacyPolicyProducer" name="privacyPolicyProducer" required>
                                            <label for="privacyPolicyProducer">J'accepte la <a href="#" target="_blank">Politique de confidentialité</a>*</label>
                                        </div>
                                        <button type="submit" class="btn btn-success w-100">Inscription</button>
                                        <small class="text-center">*Champs obligatoires</small>
                                    </div>
                                </form>
                                <?php } else { ?>
                                <img src="/public/assets/img/tomato.svg" class="mt-4" height="150" alt="tomate souriante">
                                <h2 class="title-lilita my-3">Inscription confirmée !</h2>
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
    <script src="/public/assets/js/script-mdp-producer.js"></script>
    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>