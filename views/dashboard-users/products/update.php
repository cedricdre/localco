<?php include __DIR__.'/../../../views/templates/baner-dashboard-users.php' ?>
<!-- section Mon tableau de bord -->
<section class="py-4 py-lg-5">
    <div class="container">
        <div class="text-center mb-4">
            <nav aria-label="breadcrumb mb-5">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/controllers/dashboard-users/home-ctrl.php">Tableau de bord</a></li>
                    <li class="breadcrumb-item"><a href="/controllers/dashboard-users/products/list-ctrl.php">Mes produits</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
                </ol>
            </nav>
            <h4 class="title-lilita"><?=$title?></h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form class="mb-3" method="POST" enctype='multipart/form-data'>
                    <div class="mb-3">
                        <label for="productName" class="form-label">Nom du produit*</label>
                        <input type="text" class="form-control" id="productName" name="productName" placeholder="Entrez un nom de produit" pattern="<?= REGEX_NAME ?>" value="<?= $product->product_name ?? '' ?>" required>
                        <small class="form-text text-danger"><?= $error['productName'] ?? '' ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type de produit*</label>
                        <select name="type" id="type" class="form-select">
                            <?php
                            foreach ($types as $key => $type) {
                                $isSelected = ($product->id_type == $type->id_type) ? 'selected ' : '';
                                echo '<option ' . $isSelected . ' value="' . $type->id_type . '">' . $type->type_name . '</option>';
                            }
                            ?>
                        </select>
                        <small class="form-text text-danger"><?= $error['productType'] ?? '' ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description du produit</label>
                        <textarea class="form-control" id="description" name="description" rows="4" maxlength="1000"><?= $product->description ?? '' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check-inline">
                            <label class="form-label">Production Bio</label>
                        </div>
                        <?php $selectedBio = isset($product->bio_production) ? $product->bio_production : ''; ?>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="noBio" name="bioProduction" value="0" <?= ($selectedBio == 0) ? 'checked' : '' ?> >
                            <label class="form-check-label" for="noBio">Non</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="yesBio" name="bioProduction" value="1" <?= ($selectedBio == 1) ? 'checked' : '' ?> >
                            <label class="form-check-label" for="yesBio">Oui</label>
                        </div>
                        <small class="form-text text-danger"><?= $error['bioProduction'] ?? '' ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="certification" class="form-label">Certification</label>
                        <select id="certification" name="certification" class="form-select mb-lg-2">
                            <option value="">Sélectionner une certification</option>
                            <?php
                            $selectedCertif = isset($product->certification) ? $product->certification : '';
                            foreach (CERTIFICATIONS as $certif) { ?>
                                <option value="<?= $certif ?>" <?= ($selectedCertif == $certif) ? 'selected' : '' ?>><?= $certif ?></option>
                            <?php }
                            ?>
                        </select>
                        <small class="form-text text-danger"><?= $error['certification'] ?? '' ?></small>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="weight" class="form-label">Poids du produit*</label>
                                <input type="text" inputmode="numeric" class="form-control" id="weight" name="weight" placeholder="ex : 100" pattern="<?= REGEX_WEIGHT ?>" value="<?= $product->weight ?? '' ?>" required>
                                <small class="form-text text-danger"><?= $error['weight'] ?? '' ?></small>
                            </div>
                            <div class="col-md-6">
                                <label for="weightUnit" class="form-label">Unités de mesure*</label>
                                <select id="weightUnit" name="weightUnit" class="form-select" required>
                                    <option value="">Sélectionner une unité</option>
                                    <?php
                                    $selectedUnit = isset($product->weight_unit) ? $product->weight_unit : '';
                                    foreach (UNITS_MEASURE as $unit) { ?>
                                        <option value="<?= $unit ?>" <?= ($selectedUnit == $unit) ? 'selected' : '' ?>><?= $unit ?></option>
                                    <?php }
                                    ?>
                                </select>
                                <small class="form-text text-danger"><?= $error['weightUnit'] ?? '' ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                    <div class="row">
                            <div class="col-md-6">
                                <?php
                                $productPrice = str_replace('.', ',', $product->product_price);
                                ?>
                                <label for="productPrice" class="form-label">Prix unitaire en € HT*</label>
                                <input type="text" class="form-control" id="productPrice" name="productPrice" placeholder="ex : 3,95" pattern="<?= REGEX_PRICE ?>" value="<?= $productPrice ?? '' ?>" required>
                                <small class="form-text text-danger"><?= $error['productPrice'] ?? '' ?></small>
                            </div>
                            <div class="col-md-6">
                                <label for="productTva" class="form-label">TVA à appliquer en %*</label>
                                <select id="productTva" name="productTva" class="form-select" required>
                                    <option value="">Sélectionner une unité</option>
                                    <?php
                                    $selectedTva = isset($product->product_tva) ? $product->product_tva : '';
                                    foreach (TVA as $unit) { ?>
                                        <option value="<?= $unit ?>" <?= ($selectedTva == $unit) ? 'selected' : '' ?>><?= $unit ?></option>
                                    <?php }
                                    ?>
                                </select>
                                <small class="form-text text-danger"><?= $error['productTva'] ?? '' ?></small>
                            </div>
                        </div>        
                    </div>

                    <div class="mb-3">
                        <label for="picture" class="form-label">Ajouter une photo</label>
                        <input class="form-control" type="file" id="picture" name="picture" accept="image/png, image/jpeg" value="<?= $picture ?? '' ?>">
                        <small class="form-text text-danger"><?= $error['picture'] ?? '' ?></small>
                    </div>
                    <div class="mb-3">
                        <div class="form-check-inline">
                            <label class="form-label">Mettre en ligne</label>
                        </div>
                        <?php $selectedOnline = isset($product->online) ? $product->online : ''; ?>
                        <div class="form-check form-check-inline"> 
                            <input class="form-check-input" type="radio" id="yes" name="online" value="1" <?= ($selectedOnline == 1) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="yes">Oui</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="no" name="online" value="0" <?= ($selectedOnline == 0) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="no">Non</label>
                        </div>
                        <small class="form-text text-danger"><?= $error['online'] ?? '' ?></small>
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