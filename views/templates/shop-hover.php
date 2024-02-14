    <!-- Offcanvas PANIER -->
    <div class="offcanvas offcanvas-end text-success" tabindex="-1" id="offcanvasBasket" aria-labelledby="offcanvasBasketLabel">
        <div class="offcanvas-header">
            <p class="offcanvas-title" id="offcanvasBasketLabel"><i class="bi bi-bag-fill fs-4 me-2"></i><span class="fs-4 title-lilita me-2">Mon panier</span>2 produit(s)</p>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a class="btn btn-sm btn-outline-danger rounded-5 mb-2" href="#" role="button"><i class="bi bi-trash3-fill me-2"></i>Vider le panier</a>
            <!-- Ligne produit panier Test 1 -->
            <?php
            if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
                foreach ($_SESSION['panier'] as $produit) {
                    // Accédez aux propriétés du produit
                    $productId = $produit['id'];
                    $productName = $produit['nom'];
                    $productPrice = $produit['prix'];
                    $quantity = $produit['quantite']; ?>

                    <div class="border-bottom border-1 py-2">
                        <div class="row g-0 align-items-center justify-content-between">
                            <div class="col-5">
                                <p class="fw-bold mb-0"><?= $productName ?></p>
                            </div>
                            <div class="col-2">
                                <select class="form-select form-select-sm rounded-5">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <p class="fw-bolder mb-0"><?= $productPrice ?> €</p>
                            </div>
                            <div class="col-1">
                                <a href="" class="text-danger"><i class="bi bi-trash3-fill"></i></a>
                            </div>
                        </div>
                    </div>

            <?php    }
            } else {
                echo "Le panier est vide.";
            }
            ?>


            <!-- <div class="border-bottom border-1 py-2">
                <div class="row g-0 align-items-center justify-content-between">
                    <div class="col-5">
                        <p class="fw-bold mb-0">Nom du produit avec du texte sur 2 lignes</p>
                    </div>
                    <div class="col-2">
                        <select class="form-select rounded-5" id="inputSelectQte">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <p class="fw-bolder mb-0">0,00 €</p>
                    </div>
                    <div class="col-1">
                        <a href="" class="text-danger"><i class="bi bi-trash3-fill"></i></a>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="offcanvas-header bg-success-subtle">
            <p class="mb-0">Total : <span class="title-lilita fs-5">0,00 €</span></p>

            <a class="btn btn-success rounded-5 icon-link icon-link-hover my-2 me-2" href="/controllers/baskets/baskets-ctrl.php">
                Passer la commande
                <i class="bi bi-chevron-right mb-2"></i>
            </a>
        </div>
    </div><!-- FIN Offcanvas PANIER -->
