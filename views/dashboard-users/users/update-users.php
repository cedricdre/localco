<?php include __DIR__ . '/../../../views/templates/baner-dashboard-users.php' ?>
<!-- section Mon tableau de bord -->
<section class="py-4 py-lg-5">
    <div class="container">
        <div class="text-center mb-4">
            <nav aria-label="breadcrumb mb-5">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/controllers/dashboard-users/home-ctrl.php">Tableau de bord</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
            <h4 class="title-lilita">Modifier mes informations personnelles</h4>
            <a class="btn btn-sm btn-outline-primary m-1" href="/controllers/dashboard-users/users/update-password-users-ctrl.php" role="button">Modifier mon mot de passe</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php include __DIR__ . '/../../dashboard/templates/message.php' ?>
                <form class="mb-3" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="email" class="form-label">Votre adresse email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email@exemple.com" value="<?= $user->email ?? '' ?>" disabled>
                                <small class="form-text text-danger"><?= $error['email'] ?? '' ?></small>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Prénom*</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Entrez un prénom" pattern="<?= REGEX_NAME ?>" value="<?= $user->firstname ?? '' ?>" required>
                                <small class="form-text text-danger"><?= $error['firstname'] ?? '' ?></small>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Nom*</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Entrez un nom" pattern="<?= REGEX_NAME ?>" value="<?= $user->lastname ?? '' ?>" required>
                                <small class="form-text text-danger"><?= $error['lastname'] ?? '' ?></small>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <label for="pickups" class="form-label">Point de retrait*</label>
                            <select id="pickups" name="pickups" class="form-select mb-lg-2" required>
                                <?php
                                foreach ($listPickups as $key => $pickup) {
                                    $isSelected = ($user->id_pickup == $pickup->id_pickup) ? 'selected ' : '';
                                    echo '<option ' . $isSelected . ' value="' . $pickup->id_pickup . '">' . $pickup->pickup_name . '</option>';
                                }
                                ?>
                            </select>
                            <div class="form-text text-danger"><?= $error['categories'] ?? '' ?></div>
                        </div>
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-lg btn-success mb-3">Je valide</button>
                        </div>
                        <small class="text-center">*Champs obligatoires</small>
                    </div>
                </form>
                <div class="mt-5">
                    <div class="text-center">
                        <a href="/controllers/dashboard-users/users/delete-users-ctrl.php" type="button" class="btn btn-sm btn-outline-danger mb-3">Supprimer mon compte</a>
                        <!-- <p><a class="btn btn-outline-danger" href="/controllers/dashboard-users/users/delete-users-ctrl.php" role="button">Supprimer mon compte</a></p> -->
                    </div>
                </div>
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
                <p class="small">Nous sommes navrés de vous voir partir. Après la confirmation de la suppression de votre compte, vous n’aurez plus accès à votre espace et vos commandes.</p>

                    <label for="password" class="form-label">Entrez votre mot de passe pour supprimer votre compte</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe" required>
                    <div class="form-text text-danger"><?= $errors['password'] ?? '' ?></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <a href="/controllers/dashboard-users/users/delete-users-ctrl.php?id=<?= $user->id_user ?>" type="button" class="btn btn-primary">Je supprime mon compte</a>
            </div>
        </div>
    </div>
</div>