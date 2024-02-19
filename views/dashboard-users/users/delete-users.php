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
                <p>Nous sommes navrés de vous voir partir. Après la confirmation de la suppression de votre compte, vous n’aurez plus accès à votre espace et vos commandes.</p>
                <form method="POST">
                    <label for="password" class="form-label mb-2">Entrez votre mot de passe pour supprimer votre compte</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" required>
                    <div class="form-text text-danger"><?= $errors['password'] ?? '' ?></div>
                    <button type="submit" class="btn btn-outline-danger my-3">Je supprime mon compte</button>
                </form>
            </div>
        </div>
    </div>
</section><!-- FIN section Mon tableau de bord -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression du compte</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <a href="/controllers/dashboard-users/users/delete-users-ctrl.php?id=<?= $user->id_user ?>" type="button" class="btn btn-primary">Je supprime mon compte</a>
            </div>
        </div>
    </div>
</div>