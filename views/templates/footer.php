</main><!-- FIN main -->
<!-- footer -->
<footer class="bg-success py-5">
    <div class="container">
        <!-- accordion MENU-FOOTER Mobil -->
        <div class="accordion accordion-flush d-lg-none" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-success text-light" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        À propos
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse bg-success" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Titre</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-success text-light" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Le concept
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse bg-success" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Titre</div>
                </div>
            </div>
            <div class="accordion-item bg-success">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-success text-light" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Contact
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse bg-success" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Titre</div>
                </div>
            </div>
        </div><!-- FIN accordion MENU-FOOTER Mobil -->
        <!-- MENU-FOOTER Desktop -->
        <div class="d-none d-lg-block">
            <div class="row">
                <div class="col text-light">
                    <h5 class="fw-bold mb-3">À propos</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Le Projet</a></li>
                        <!-- <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Le Blog</a></li> -->
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Support client</a></li>
                    </ul>
                </div>
                <div class="col text-light">
                    <h5 class="fw-bold mb-3">Le concept</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="/controllers/catalog-ctrl.php" class="nav-link p-0 text-light">Catalogue</a></li>
                        <li class="nav-item mb-2"><a href="/controllers/subscription-ctrl.php" class="nav-link p-0 text-light">Abonnement</a></li>
                        <li class="nav-item mb-2"><a href="/controllers/producers/producers-ctrl.php" class="nav-link p-0 text-light">Les Producteurs</a></li>
                        <li class="nav-item mb-2"><a href="/controllers/pickups-ctrl.php" class="nav-link p-0 text-light">Lieu de retrait</a></li>
                    </ul>
                </div>
                <div class="col text-light">
                    <h5 class="fw-bold mb-3">Compte</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="/controllers/login/sign-in-ctrl.php" class="nav-link p-0 text-light">Gérer mon compte</a></li>
                        <li class="nav-item mb-2"><a href="/controllers/dashboard-users/home-ctrl.php" class="nav-link p-0 text-light">Gérer mon abonnement</a></li>
                    </ul>
                </div>
                <div class="col text-light">
                    <h5 class="fw-bold mb-3">Contact</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Nous contacter</a></li>
                        <li class="nav-item mb-2"><a href="/controllers/login/sign-up-producer-ctrl.php" class="nav-link p-0 text-light">Devenir revendeur</a></li>
                    </ul>
                </div>
                <div class="col text-light">
                    <h5 class="fw-bold mb-3">Réseaux sociaux</h5>
                    <ul class="nav">
                        <li class="nav-item"><a class="link-light mx-2 fs-4" href="#"><i class="bi bi-facebook"></i></a></li>
                        <li class="nav-item"><a class="link-light mx-2 fs-4" href="#"><i class="bi bi-twitter-x"></i></a></li>
                        <li class="nav-item"><a class="link-light mx-2 fs-4" href="#"><i class="bi bi-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div><!-- FIN MENU-FOOTER Desktop -->
        <!-- Logo footer + Sociaux + mentions légales -->
        <div class="text-center">
            <img src="/public/assets/img/logo-localco-white.svg" class="my-5" height="50" alt="Logo Localco blanc">
            <!-- Sociaux pour affichage mobil -->
            <div class="nav justify-content-center mb-5 fs-2 d-lg-none">
                <a class="link-light mx-2" href="#"><i class="bi bi-facebook"></i></a>
                <a class="link-light mx-2" href="#"><i class="bi bi-twitter-x"></i></a>
                <a class="link-light mx-2" href="#"><i class="bi bi-instagram"></i></a>
            </div>
            <ul class="nav justify-content-center legal-foot">
                <li class="nav-item">
                    <a class="nav-link link-light active">© 2023 Localco</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="/controllers/mentions-legales-ctrl.php">Mentions Légales</a>
                </li>
            </ul>
        </div>
    </div>
</footer><!-- FIN footer -->

    <!-- script mot de passe -->
    <script src="/public/assets/js/script-mdp.js"></script>
    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Annimation AOS -->
    <script src="/public/assets/js/aos.js"></script>
    <script src="/public/assets/js/script.js"></script>
    <script src="/public/assets/js/basket.js"></script>

</body>
</html>