<!-- Section connexion -->
<section>
    <div class="row align-items-center">
        <div class="col-md-6 d-none d-md-block">
            <div class="bg-success vh-100 login-page-cover login-page-cover-img2">
                <div class="text-light text-center p-5">
                    <h1 class="title-lilita display-1">BONJOUR !</h1>
                    <h4>Accédez à votre espace personnel en toute sécurité et simplicité.</h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 p-5">
                    <div class="text-center mb-4">
                        <a class="text-center" href="/index.php"><img src="/public/assets/img/logo-localco.svg" alt="Logo Localco" height="35"></a>
                    </div>
                    <div class="card bg-success-subtle border-0 rounded-0 mb-4">
                        <div class="card-body text-center text-success p-4">
                            <h5 class="card-title fw-bold mb-2">Nouvel Utilisateur ?</h5>
                            <a href="/controllers/login/sign-up-user-ctrl.php" class="btn btn-success w-100">Devenir Membre</a>
                        </div>
                    </div>
                    <div class="card bg-success-subtle border-0 rounded-0">
                        <div class="card-body text-center text-success p-4">
                            <h5 class="card-title fw-bold mb-4">Connexion</h5>
                            <form class="text-start" method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Votre adresse email</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="email@exemple.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Votre mot de passe</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                                </div>
                                <div id="emailHelp" class="form-text text-danger mb-3"><?= $errors['email'] ?? '' ?></div>
                                <button type="submit" id="submitLogin" class="btn btn-success w-100 mb-2">Connexion</button>
                            </form>
                            <a href="#" class="small link-success">Mot de passe oublié ?</a>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="/" class="btn btn-sm btn-outline-success me-lg-2"><i class="bi bi-arrow-left me-2"></i>Retour site</a>
                        <a href="/controllers/login/sign-up-producer-ctrl.php" class="btn btn-sm btn-outline-success">Devenir revendeur</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section><!-- FIN Section connexion -->