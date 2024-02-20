<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 p-5">
                <div class="text-center mb-4">
                    <a class="text-center" href="/index.php"><img src="/public/assets/img/logo-localco.svg" alt="Logo Localco" height="35"></a>
                </div>
                <div class="card bg-success-subtle border-0 rounded-0">
                    <div class="card-body text-center text-success px-5 py-4">
                        <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                        <h5 class="title-lilita">Proposer vos Produits</h5>
                        <form class="text-start" method="POST" >
                            <div class="row g-2">
                                <div class="col-12">
                                    <label for="email" class="form-label">Votre adresse email*</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email@exemple.com" value="<?= $email ?? '' ?>" required>
                                    <small class="form-text text-danger"><?= $error['email'] ?? '' ?></small>
                                </div>
                                <div class="col-xl-6">
                                    <label for="password" class="form-label">Votre mot de passe*</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez un mot de passe" pattern="<?= REGEX_PASSWORD ?>" required>
                                    <small class="form-text text-danger"><?= $error['password'] ?? '' ?></small>
                                </div>
                                <div class="col-xl-6 text-truncate">
                                    <label for="passwordConfirm" class="form-label">Confirmation du mot de passe*</label>
                                    <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="Confirmez votre mot de passe" pattern="<?= REGEX_PASSWORD ?>" required>
                                    <small class="form-text text-danger"><?= $error['passwordConfirm'] ?? '' ?></small>
                                </div>
                                <small id="pwdSecurity" class="d-none"><span class="badge bg-danger">Mot de passe Faible</span> Doit contenir au moins 8 caractères : une minuscule, une majuscule, un chiffre et un caractère spécial.</small>
                                <small id="pwdSecurityLow" class="d-none"><span class="badge bg-danger">Mot de passe Faible</span> Ajouter au moins un chiffre.</small>
                                <small id="pwdSecurityMedium" class="d-none"><span class="badge bg-warning">Mot de passe Moyen</span> ajouter au moins un caractère spécial.</small>
                                <small id="pwdSecurityStrong" class="d-none"><span class="badge bg-success">Mot de passe Fort</span></small>
                                <small id="pwdMessageError" class="form-text d-none text-danger">Merci de renseigner 2 mots de passe identique</small>

                                <div class="col-xl-6">
                                    <label for="companyName" class="form-label">Nom de l’entreprise*</label>
                                    <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Entrez le nom de votre entreprise" pattern="<?= REGEX_NAME ?>" value="<?= $companyName ?? '' ?>" required>
                                    <small class="form-text text-danger"><?= $error['companyName'] ?? '' ?></small>
                                </div>
                                <div class="col-xl-6">
                                    <label for="siret" class="form-label">Siret/Siren</label>
                                    <input type="text" inputmode="numeric" class="form-control" id="siret" name="siret" placeholder="ex : 12345678901234" pattern="<?= REGEX_SIRET ?>" value="<?= $siret ?? '' ?>">
                                    <small class="form-text text-danger"><?= $error['siret'] ?? '' ?></small>
                                </div>
                                <div class="col-xl-4">
                                    <label for="firstname" class="form-label">Prénom*</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Entrez un prénom" pattern="<?= REGEX_NAME ?>" value="<?= $firstname ?? '' ?>" required>
                                    <small class="form-text text-danger"><?= $error['firstname'] ?? '' ?></small>
                                </div>
                                <div class="col-xl-4">
                                    <label for="lastname" class="form-label">Nom*</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Entrez un nom" pattern="<?= REGEX_NAME ?>" value="<?= $lastname ?? '' ?>" required>
                                    <small class="form-text text-danger"><?= $error['lastname'] ?? '' ?></small>
                                </div>
                                <div class="col-xl-4">
                                    <label for="phone" class="form-label">Numéro de téléphone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Entrez un numéro" pattern="<?= REGEX_PHONE ?>" value="<?= $phone ?? '' ?>">
                                    <small class="form-text text-danger"><?= $error['phone'] ?? '' ?></small>
                                </div>
                                <div class="col-xl-5">
                                    <label for="adress" class="form-label">Adresse postal*</label>
                                    <input type="text" class="form-control" id="adress" name="adress" placeholder="ex : 1 rue des Champs" pattern="<?= REGEX_ADRESS ?>" value="<?= $adress ?? '' ?>" required>
                                    <small class="form-text text-danger"><?= $error['adress'] ?? '' ?></small>
                                </div>
                                <div class="col-xl-3">
                                    <label for="zip" class="form-label">Code postal*</label>
                                    <input type="text" inputmode="numeric" class="form-control" id="zip" name="zip" placeholder="ex : 80000" pattern="<?= REGEX_POSTAL_CODE ?>" value="<?= $zip ?? '' ?>" required>
                                    <small class="form-text text-danger"><?= $error['zip'] ?? '' ?></small>
                                </div>
                                <div class="col-xl-4">
                                    <label for="city" class="form-label">Ville*</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="ex : Amiens" pattern="<?= REGEX_CITY ?>" value="<?= $city ?? '' ?>" required>
                                    <small class="form-text text-danger"><?= $error['city'] ?? '' ?></small>
                                </div>
                                <div class="col-xl-12">
                                        <label for="pickups" class="form-label">Point de retrait*</label>
                                        <select id="pickups" name="pickups" class="form-select mb-lg-2" required>
                                            <option value="">Sélectionnez un point de retrait</option>
                                            <?php
                                            foreach ($listPickups as $pickup) { ?>
                                                <option value="<?= $pickup->id_pickup ?>" <?= (isset($pickups) && $pickups == $pickup->pickup_name) ? 'selected' : '' ?>><?= $pickup->pickup_name ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                        <div class="form-text text-danger"><?= $error['categories'] ?? '' ?></div>
                                    </div>
                                <!-- <div class="col-12 form-check">
                                    <input type="checkbox" class="form-check-input" id="producer" name="comfirmProducer" required>
                                    <label for="producer">Je confirme être producteur*</label>
                                    <small class="form-text text-danger"><?= $error['producer'] ?? '' ?></small>
                                </div> -->
                                <div class="col-12 form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="privacyPolicy" name="privacyPolicy" required>
                                    <label for="privacyPolicy">J'accepte la <a href="/controllers/privacy-policy-ctrl.php" target="_blank">Politique de confidentialité</a>*</label>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Inscription</button>
                                <small class="text-center">*Champs obligatoires</small>
                            </div>
                        </form>
                        <?php } else { ?>
                        <img src="/public/assets/img/tomato.svg" class="mt-4" height="150" alt="tomate souriante">
                        <h2 class="title-lilita my-3">Inscription confirmée !</h2>
                        <a href="/controllers/home-ctrl.php" type="button" id="submitLogin" class="btn btn-outline-success mb-2">J'accède à mon compte.</a>
                        <?php  } ?>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="/controllers/login/sign-in-ctrl.php" class="btn btn-sm btn-outline-success me-lg-2"><i class="bi bi-arrow-left me-1"></i>Retour</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section><!-- FIN Section connexion -->
