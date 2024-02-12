<section>
    <div class="row">
        <div class="col-md-7">
            <div class="card border-primary mb-4">
                <div class="card-header text-bg-primary">Commandes</div>
                <div class="card-body text-primary">
                    <h5 class="card-title">Primary card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card text-bg-success mb-4">
                <div class="card-header">Produits</div>
                <div class="card-body">
                    <h5 class="card-title">? Produits à valider</h5>
                    <p class="card-text">Total de produits en ligne : </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="bi bi-people text-primary me-2"></i>? Producteurs</h5>
                    <a class="btn btn-sm btn-outline-secondary" href="/controllers/dashboard/producers/list-ctrl.php" role="button">Consulter la liste</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="bi bi-shop-window text-primary me-2"></i><?= count($pickups) ?> Lieux de retrait</h5>
                    <a class="btn btn-sm btn-outline-secondary" href="/controllers/dashboard/pickups/list-ctrl.php" role="button">Consulter la liste</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="bi bi-list-ul text-primary me-2"></i><?= count($types) ?> Types de produits</h5>
                    <a class="btn btn-sm btn-outline-secondary" href="/controllers/dashboard/types/list-ctrl.php" role="button">Consulter la liste</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3"><i class="bi bi-calendar-range text-primary me-2"></i>? Abonnements</h5>
                    <a class="btn btn-sm btn-outline-secondary" href="/controllers/dashboard/subscriptions/list-ctrl.php" role="button">Consulter la liste</a>
                </div>
            </div>
        </div>
    </div>


</section>