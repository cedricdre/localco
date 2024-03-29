<!-- section Fiche produit -->
<section class="py-4 py-lg-6">
    <div class="container">
        <div class="row g-lg-5">
            <div class="col-12 col-lg-5">
                <?php
                if ($product->picture != null) { ?>
                    <img src="<?= '/public/uploads/product-sheet/' . $product->picture ?>" class="img-product-sheet object-fit-cover rounded-3 mb-4" alt="<?=$product->product_name?>">
                <?php
                } else { ?>
                    <img src="/public/assets/img/img-off.jpg" class="img-product-sheet object-fit-cover rounded-3 mb-4" alt="Photo de Localco">
                <?php
                } ?>
            </div>
            <div class="col-12 col-lg-7">
                <div class="d-flex align-items-center">
                    <h1><?=$product->product_name?></h1>
                    <?php
                    if ($product->bio_production === 1) { ?>
                        <h5 class="mb-0"><span class="ms-2 badge rounded-pill text-bg-success">BIO</span></h5>
                    <?php
                    } ?>
                    <?php
                        if (isset($average_rating)) { ?>
                        <h5 class="ms-2 mb-0"><i class="bi bi-star-fill text-warning me-1"></i><?=$ratingProduct?>/5</h5>
                        <?php
                        } ?>
                    <?php
                    $product_price = $product->product_price;
                    $product_tva = $product->product_tva;
                    // Calculer la TVA
                    $tva = $product_price * ($product_tva / 100);
                    // Calculer le prix TTC
                    $prix_ttc = $product_price + $tva;
                    $prix_ttc = number_format($prix_ttc, 2, ',', ' ');
                    ?>
                    <h3 class="ms-auto"><?=$prix_ttc?> <sup>€</sup></h3>
                </div>
                
                <p class="fw-light"><?=$product->weight?> <?=$product->weight_unit?></p>

                <div class="row">
                    <div class="col-lg-7 col-xl-8">

                        <div class="row g-2 mb-4">
                            <div class="col-3">
                            <select class="form-select rounded-5 border-warning" id="inputSelectQte<?=$product->id_product?>">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            </div>
                            <div class="col-9">
                            <button class="btn btn-warning addBasket w-100" type="button" data-productid="<?=$product->id_product?>">Ajouter au panier<i class="ms-1 bi bi-bag-fill"></i></button>
                            </div>
                        </div>

                        <h5>Description</h5>
                        <p><?=$product->description?></p>
                        <h5>Origine</h5>
                        <p>Produit à <span class="fw-bolder"><?=$product->city?></span></p>
                        <?php
                        if ($product->certification) { ?>
                            <h5>Certification</h5>
                            <button class="btn btn-sm btn-outline-success" disabled><?=$product->certification?></button>
                        <?php
                        } ?>
                    </div>
                    <div class="col-lg-5 col-xl-4">
                        <div class="card bg-success-subtle rounded-3 border-0">
                            <div class="row g-0 align-items-center">
                            <div class="col-12 col-md-6 col-lg-12">
                                <?php
                                if ($product->company_picture != null) { ?>
                                    <img src="<?= '/public/uploads/producers/' . $product->company_picture ?>" class="img-fluid rounded-3" alt="<?=$product->company_name?>">
                                <?php
                                } else { ?>
                                    <img src="/public/assets/img/img-off.jpg" class="img-fluid rounded-3" alt="Photo de Localco">
                                <?php
                                } ?>
                                </div>
                                <div class="col-12 col-md-6 col-lg-12">
                                    <div class="card-body p-lg-4">
                                        <h5 class="card-title title-lilita">Le Producteur</h5>
                                        <p class="card-text mb-0"><?=$product->firstname?> <?=$product->lastname?></p>
                                        <p class="card-text"><?=$product->company_name?></p>
                                        <a class="btn btn-sm btn-success icon-link icon-link-hover" href="/controllers/producers/producers-sheet-ctrl.php?id=<?=$product->id_user?>">
                                            En savoir plus
                                            <i class="bi bi-chevron-right mb-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                


            </div>
        </div>

        <div class="py-5">
            <div class="row">
            <h2 class="text-center title-lilita fs-1 mb-4"><span class="bg-warning p-1">Avis</span> Clients</h2>
                <div class="col-lg-5">
                    <?php
                    if (empty($_SESSION['user'])) { ?>
                        <a class="btn btn-outline-success" href="/controllers/login/sign-in-ctrl.php"><i class="bi bi-person-fill me-1"></i>Connectez-vous pour écrire un avis</a>
                    <?php
                    } else if ($noComment) { ?>
                    <div class="card bg-success-subtle rounded-3 border-0">
                    <div class="card-body p-4">
                        <h5 class="fw-bold">Vous avez déjà donné votre <span class="bg-warning p-1">avis</span> sur ce produit !</h5>
                        <p class="mb-0">Le producteur <span class="fw-bold"> <?=$product->company_name?></span> vous remercie !</p>
                    </div>
                    </div>
                    <?php
                    } else { ?>
                    <form method="post">
                        <div class="mb-3">
                            <label for="score" class="form-label">Évaluer ce produit</label>
                            <select class="form-select w-50" id="score" name="score" aria-label="Default select example" required>
                                <option value="">Note</option>
                                <?php
                                foreach (NOTES as $note) { ?>
                                    <option value="<?= $note ?>" <?= (isset($score) && $score == $note) ? 'selected' : '' ?>><?= $note ?></option>
                                <?php }
                                ?>
                            </select>
                            <small class="form-text text-danger"><?= $error['score'] ?? '' ?></small>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Partagez votre opinion avec les autres clients</label>
                            <textarea class="form-control" id="comment" name="comment" rows="4" maxlength="1000" placeholder="Entrez votre texte"><?= $comment ?? '' ?></textarea>
                            <small class="form-text text-danger"><?= $error['comment'] ?? '' ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                    <?php }
                    ?>
                </div>
                <div class="col-lg-7">
                <?php
                if (isset($reviews) && count($reviews) > 0) {
                    foreach ($reviews as $review) { ?>
                        <p class="h5 fw-bold"><?=$review->firstname?></p>
                        <p><i class="bi bi-star-fill me-2"></i><?=$review->rating?>/5</p>
                        <p class="border-bottom border-1 border-warning pb-3"><?=$review->comment?></p>
                <?php
                    }
                }
                else { ?>
                    <p>Aucun avis n'est disponible pour le moment</p>
                <?php
                } ?>
                </div>                            
            </div>                            
        </div>


        <!-- A découvrir également -->
        <div class="py-6 mt-lg-3">
            <div class="row g-3">
                <h2 class="text-center title-lilita fs-1 mb-4">À <span class="bg-warning p-1">découvrir</span> également</h2>
                <?php
                foreach($products as $product){ 
                    $product_price = $product->product_price;
                    $product_tva = $product->product_tva;
                    // Calculer la TVA
                    $tva = $product_price * ($product_tva / 100);
                    // Calculer le prix TTC
                    $prix_ttc = $product_price + $tva;
                    $prix_ttc = number_format($prix_ttc, 2, '.', ' ');
                    ?>
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card rounded-3 h-100 bg-card">
                        <a href="/controllers/product-sheet-ctrl.php?idproduct=<?=$product->id_product?>" class="text-decoration-none">
                        <div class="img-hover-zoom rounded-3">
                            <?php
                            if ($product->picture != null) { ?>
                                <img src="<?= '/public/uploads/product-sheet/' . $product->picture ?>" class="img-cover-card-product object-fit-cover rounded-3" alt="Photo de <?=$product->product_name?>">
                            <?php
                            } else { ?>
                                <img src="/public/assets/img/img-off.jpg" class="img-cover-card-product object-fit-cover rounded-3" alt="photo localco">
                            <?php
                            } ?>
                        </div>
                        <div class="card-body text-success text-center pb-0">
                            <h5 class="fw-bolder mb-1 fs-6"><?=$product->product_name?>
                                <?php
                                if ($product->bio_production == 1) { ?>
                                    <span class="badge rounded-pill text-bg-success">BIO</span>
                                <?php
                                } ?>
                            </h5>
                            <p class="small fw-light opacity-75 mb-0"><?=$product->weight?> <?=$product->weight_unit?></p>
                            <p class="small fw-light opacity-75"><?=$product->company_name?></p>
                            <h6 class="card-title fs-5 fw-bolder mb-0"><?=$prix_ttc?> <sup>€</sup></h6>
                        </div>
                        <div class="card-footer border-0 bg-transparent pb-3">
                            <div>
                                <button class="btn w-100 btn-sm btn-warning " type="button">Voir la fiche produit</button>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <?php
                } ?>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="basketModal" tabindex="-1" aria-labelledby="basketModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header bg-success-subtle">
                    <h5 class="modal-title fw-bold" id="basketModalLabel"><i class="bi bi-bag-fill me-2"></i>Panier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body border-0">
                    <h5>Le produit a été ajouté au panier ! <i class="bi bi-emoji-smile-fill"></i></h5>
                </div>
                </div>
            </div>
        </div>

    </div>
</section><!-- FIN Fiche produit -->