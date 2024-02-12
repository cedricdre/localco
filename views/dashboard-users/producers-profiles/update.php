<?php include __DIR__.'/../../../views/templates/baner-dashboard-users.php' ?>
<!-- section Mon tableau de bord -->
<section class="py-4 py-lg-5">
    <div class="container">
        <div class="text-center mb-4">
            <nav aria-label="breadcrumb mb-5">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/controllers/dashboard-users/home-ctrl.php">Tableau de bord</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ma fiche producteur</li>
                </ol>
            </nav>
            <h4 class="title-lilita">Ma fiche producteur</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form class="mb-3" method="POST" enctype='multipart/form-data' novalidate>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Nom de l’entreprise*</label>
                                <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Entrez le nom de votre entreprise" pattern="<?= REGEX_NAME ?>" value="<?= $producer->company_name ?? '' ?>" required>
                                <small class="form-text text-danger"><?= $error['companyName'] ?? '' ?></small>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="siret" class="form-label">Siret/Siren</label>
                                <input type="text" inputmode="numeric" class="form-control" id="siret" name="siret" placeholder="ex : 12345678901234" pattern="<?= REGEX_SIRET ?>" value="<?= $producer->siret ?? '' ?>">
                                <small class="form-text text-danger"><?= $error['siret'] ?? '' ?></small>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Prénom*</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Entrez un prénom" pattern="<?= REGEX_NAME ?>" value="<?= $producer->firstname ?? '' ?>" required>
                                <small class="form-text text-danger"><?= $error['firstname'] ?? '' ?></small>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Nom*</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Entrez un nom" pattern="<?= REGEX_NAME ?>" value="<?= $producer->lastname ?? '' ?>" required>
                                <small class="form-text text-danger"><?= $error['lastname'] ?? '' ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description de l'entreprise</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Entrez du texte"><?= $producer->description ?? '' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="picture" class="form-label">Ajouter une photo</label>
                        <input class="form-control" type="file" id="picture" name="picture" accept="image/png, image/jpeg">
                        <small class="form-text text-danger"><?= $error['picture'] ?? '' ?></small>
                        <p class="my-1 fw-bold">Nom du fichier<a class="btn btn-outline-danger btn-sm ms-2" href="#" role="button">Supprimer</a></p>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Numéro de téléphone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Entrez un numéro" pattern="<?= REGEX_PHONE ?>" value="<?= $producer->phone ?? '' ?>">
                                <small class="form-text text-danger"><?= $error['phone'] ?? '' ?></small>
                            </div>
                        </div>
                        <div class="col-xl-12">    
                            <div class="mb-3">
                                <label for="adress" class="form-label">Adresse postal*</label>
                                <input type="text" class="form-control" id="adress" name="adress" placeholder="ex : 1 rue des Champs" pattern="<?= REGEX_ADRESS ?>" value="<?= $producer->address ?? '' ?>" required>
                                <small class="form-text text-danger"><?= $error['adress'] ?? '' ?></small>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="mb-3">
                                <label for="zip" class="form-label">Code postal*</label>
                                <input type="text" inputmode="numeric" class="form-control" id="zip" name="zip" placeholder="ex : 80000" pattern="<?= REGEX_POSTAL_CODE ?>" value="<?= $producer->zip ?? '' ?>" required>
                                <small class="form-text text-danger"><?= $error['zip'] ?? '' ?></small>
                            </div>
                        </div>
                        <div class="col-xl-8"> 
                            <div class="mb-3">
                                <label for="city" class="form-label">Ville*</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="ex : Amiens" pattern="<?= REGEX_CITY ?>" value="<?= $producer->city ?? '' ?>" required>
                                <small class="form-text text-danger"><?= $error['city'] ?? '' ?></small>
                            </div>
                        </div>
                    </div>        
                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-lg btn-success mb-3">Je valide ma fiche</button>
                    </div>
                    <small class="text-center">*Champs obligatoires</small>
                </form>
            </div>
        </div>
    </div>
</section><!-- FIN section Mon tableau de bord -->