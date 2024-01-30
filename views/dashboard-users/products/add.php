<?php include __DIR__.'/../../../views/templates/baner-dashboard-users.php' ?>
<!-- section Mon tableau de bord -->
<section class="py-4 py-lg-5">
    <div class="container">
        <div class="text-center mb-4">
            <nav aria-label="breadcrumb mb-5">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/controllers/dashboard-users/home-ctrl.php">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="/controllers/dashboard-users/products/list-ctrl.php">Mes produits</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ajouter ou modifier un produit</li>
                </ol>
            </nav>
            <h4 class="title-lilita">Ajouter ou Modifier un produit</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form class="mb-3" method="POST" enctype='multipart/form-data'>
                    <div class="mb-3">
                        <label for="productName" class="form-label">Nom du produit*</label>
                        <input type="text" class="form-control" id="productName" name="productName" placeholder="Entrez un nom de produit" pattern="<?= REGEX_NAME ?>" value="<?= $productName ?? '' ?>" required>
                        <small class="form-text text-danger"><?= $error['productName'] ?? '' ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="productType" class="form-label">Type de produit*</label>
                        <select id="productType" name="productType" class="form-select mb-lg-2" required>
                            <option value="">Sélectionner un type de produit</option>
                            <?php
                            foreach (PRODUCT_TYPES as $type) { ?>
                                <option value="<?= $type ?>" <?= (isset($productType) && $productType == $type) ? 'selected' : '' ?>><?= $type ?></option>
                            <?php }
                            ?>
                        </select>
                        <small class="form-text text-danger"><?= $error['productType'] ?? '' ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Description du produit</label>
                        <textarea class="form-control" id="productDescription" name="productDescription" rows="4" maxlength="1000" placeholder="Entrez votre description"><?= $productDescription ?? '' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check-inline">
                            <label class="form-label">Production Bio</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="noBio" name="productBio" value="0" <?= (isset($productBio) && $productBio == 0) ? 'checked' : '' ?> >
                            <label class="form-check-label" for="noBio">Non</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="yesBio" name="productBio" value="1" <?= (isset($productBio) && $productBio == 1) ? 'checked' : '' ?> >
                            <label class="form-check-label" for="yesBio">Oui</label>
                        </div>
                        <small class="form-text text-danger"><?= $error['productBio'] ?? '' ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="productCertification" class="form-label">Certification</label>
                        <select id="productCertification" name="productCertification" class="form-select mb-lg-2" required>
                            <option value="">Sélectionner une certification</option>
                            <?php
                            foreach (CERTIFICATIONS as $certif) { ?>
                                <option value="<?= $certif ?>" <?= (isset($productCertification) && $productCertification == $certif) ? 'selected' : '' ?>><?= $certif ?></option>
                            <?php }
                            ?>
                        </select>
                        <small class="form-text text-danger"><?= $error['productCertification'] ?? '' ?></small>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="productWeight" class="form-label">Poids du produit*</label>
                                <input type="text" inputmode="numeric" class="form-control" id="productWeight" name="productWeight" placeholder="ex : 100" pattern="<?= REGEX_WEIGHT ?>" value="<?= $productWeight ?? '' ?>" required>
                                <small class="form-text text-danger"><?= $error['productWeight'] ?? '' ?></small>
                            </div>
                            <div class="col-md-6">
                                <label for="productUnit" class="form-label">Unités de mesure*</label>
                                <select id="productUnit" name="productUnit" class="form-select" required>
                                    <option value="">Sélectionner une unité</option>
                                    <?php
                                    foreach (UNITS_MEASURE as $unit) { ?>
                                        <option value="<?= $unit ?>" <?= (isset($productUnit) && $productUnit == $unit) ? 'selected' : '' ?>><?= $unit ?></option>
                                    <?php }
                                    ?>
                                </select>
                                <small class="form-text text-danger"><?= $error['productUnit'] ?? '' ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                    <div class="row">
                            <div class="col-md-6">
                                <label for="productPrice" class="form-label">Prix unitaire en € HT*</label>
                                <input type="text" inputmode="numeric" class="form-control" id="productPrice" name="productPrice" placeholder="ex : 3,95" pattern="<?= REGEX_PRICE ?>" value="<?= $productPrice ?? '' ?>" required>
                                <small class="form-text text-danger"><?= $error['productPrice'] ?? '' ?></small>
                            </div>
                            <div class="col-md-6">
                                <label for="tva" class="form-label">TVA à appliquer en %*</label>
                                <select id="tva" name="tva" class="form-select" required>
                                    <option value="">Sélectionner une unité</option>
                                    <?php
                                    foreach (TVA as $unit) { ?>
                                        <option value="<?= $unit ?>" <?= (isset($tva) && $tva == $unit) ? 'selected' : '' ?>><?= $unit ?></option>
                                    <?php }
                                    ?>
                                </select>
                                <small class="form-text text-danger"><?= $error['tva'] ?? '' ?></small>
                            </div>
                        </div>        
                    </div>

                    <div class="mb-3">
                        <label for="productFile" class="form-label">Ajouter une photo</label>
                        <input class="form-control" type="file" id="productFile" name="productFile" accept="image/png, image/jpeg" value="<?= $productFile ?? '' ?>" required>
                        <small class="form-text text-danger"><?= $error['productFile'] ?? '' ?></small>
                    </div>
                    <div class="mb-3">
                        <div class="form-check-inline">
                            <label class="form-label">Mettre en ligne</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="yes" name="productLine" value="0" <?= (isset($productLine) && $productLine == 'yes') ? 'checked' : '' ?> required>
                            <label class="form-check-label" for="yes">Oui</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="no" name="productLine" value="1" <?= (isset($productLine) && $productLine == 'no') ? 'checked' : '' ?> required>
                            <label class="form-check-label" for="no">Non</label>
                        </div>
                        <small class="form-text text-danger"><?= $error['productLine'] ?? '' ?></small>
                    </div>
                    <div class="alert alert-warning my-3" role="alert">
                        <b><i class="bi bi-info-circle-fill"></i> Info :</b> La plateforme Localco vérifiera votre fiche produit avant de la publier en ligne.
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-lg btn-success">Valider le produit</button>
                    </div>
                </form>
                <div class="text-center mt-4">
                <small>*Champs obligatoires</small>
                </div>
                
            </div>
        </div>
    </div>
</section><!-- FIN section Mon tableau de bord -->