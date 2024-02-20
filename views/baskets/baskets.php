<!-- Section Entête -->
<section class="bg-success">
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <div class="text-center text-light">
                    <h1 class="title-lilita mb-0 display-5">Panier</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-4 py-lg-6">
    <div class="container">
        <div class="row justify-content-center">
        <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
            <div class="col-lg-6 mb-3">
                <?php
                if (isset($_COOKIE['basket'])) {
                    foreach ($productID as $productData) {
                        $product = $productData['product'][0];
                        $quantity = $productData['quantity'];
                        $prix_ttc = CalculatePrice::TVA($product);
                        $priceCalculQty = $quantity * $prix_ttc;

                        $total += $priceCalculQty;
                ?>
                    <div class="border-bottom border-1 border-success py-2">
                        <div class="row g-0 align-items-center justify-content-between">
                            <div class="col-6">
                            <p class="fw-bold mb-0"><?= $quantity ?> x <a href="/controllers/product-sheet-ctrl.php?idproduct=<?= $product->id_product ?>"><?= $product->product_name ?></a></p>
                            <p class="fw-light small mb-0"><?=$product->weight?> <?=$product->weight_unit?></p>
                            </div>
                            <div class="col-2">
                                <p class="fw-bolder mb-0"><?= $priceCalculQty ?> €</p>
                            </div>
                            <div class="col-2 text-center">
                                <a href="" class="text-danger"><i class="bi bi-trash3-fill"></i></a>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                } else { ?>
                    <h5 class="fw-bold">Votre panier est vide</h5>
                    <a class="btn btn-outline-success icon-link icon-link-hover mb-3" href="/controllers/catalog-ctrl.php">
                            Commencer mon marché
                            <i class="bi bi-chevron-right mb-2"></i>
                    </a>
                <?php
                } ?>
            </div>
            <div class="col-lg-3">
                <div class="border border-1 border-success p-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold">TOTAL</h5>
                        <h5 class="fw-bold"><?= number_format($total, 2, '.', ' '); ?> <sup>€</sup></h5>
                    </div>
                    <?php
                    if (!empty($_SESSION['user'])) { ?>
                    <p class="mb-1"><i class="bi bi-geo-alt text-danger me-1"></i>Lieu de retrait : <span class="fw-bold"><?=$pickup->pickup_name?></span></p>
                    <form method="POST">
                        <div class="form-group">
                            <label class="mb-2" for="withdrawDate"><i class="bi bi-clock text-danger me-1"></i>Jour de retrait</label>
                            <input class="form-control mb-1" type="date" id="withdrawDate" name="withdrawDate" required>
                            <small class="form-text text-danger"><?= $error['withdrawDate'] ?? '' ?></small>
                        </div>
                        <button type="submit" class="btn btn-success rounded-5 icon-link icon-link-hover mt-3 me-2">
                            Commander
                            <i class="bi bi-check-lg mb-2"></i>
                        </button>
                    </form>
                    <?php
                    } else { ?>
                        <a class="btn btn-success rounded-5 icon-link icon-link-hover my-2 me-2" href="/controllers/login/sign-in-ctrl.php">
                        Connectez-vous pour commander
                        <i class="bi bi-chevron-right mb-2"></i>
                    </a>
                    <?php
                    } ?>
                </div>
            </div>
            <?php } else { ?>
            <div class="col-lg-6">
                <div class="text-center">
                    <img src="/public/assets/img/tomato.svg" height="150" alt="tomate souriante">
                    <h2 class="title-lilita my-4">Commande confirmée !</h2>
                    <h5>Nous tenons à vous remercier pour votre confiance. Nous vous tiendrons informé de l'avancement de votre commande et vous enverrons une notification dès qu'elle sera prête.</h5>
                    <a href="/controllers/dashboard-users/home-ctrl.php" type="button" class="btn btn-outline-success mb-2">Accéder à mon compte</a>
                </div>
            </div>                
            <?php  } ?>
            
        </div>
    </div>
</section>

<script src="/public/assets/js/withdraw-date.js"></script>