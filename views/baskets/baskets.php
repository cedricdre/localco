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
            <div class="col-lg-6">
            <?php
            if (isset($_COOKIE['basket'])) {
                foreach ($productID as $products) {

                    foreach ($products as $data) {
                    
            ?>
                <div class="border-bottom border-1 border-success py-3">
                    <div class="row g-0 align-items-center justify-content-between">
                        <div class="col-5">
                            <p class="fw-bold mb-0"><?= $data->product_name ?> </p>
                        </div>
                        <div class="col-2">
                        <select class="form-select rounded-5" id="inputSelectQte">
                            <option value="<?= $quantity ?>"><?= $quantity ?></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        </div>
                        <div class="col-2">
                            <p class="fw-bolder mb-0"><?= $data->product_price ?> €</p>
                        </div>
                        <div class="col-1">
                            <a href="" class="text-danger"><i class="bi bi-trash3-fill"></i></a>
                        </div>
                    </div>
                </div>
            <?php
            }
                }
            } else {
                // Le cookie 'basket' n'est pas défini
            }
            ?>
            </div>
            <div class="col-lg-3">
                <div class="border border-1 border-success t p-4">
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold">TOTAL</h5>
                        <h5 class="fw-bold">0,00 <sup>€</sup></h5>
                    </div>
                        <?php
                        if (!empty($_SESSION['user'])) { ?>
                        <a class="btn btn-success rounded-5 icon-link icon-link-hover my-2 me-2" href="/controllers/baskets-ctrl.php">
                            Commander
                            <i class="bi bi-chevron-right mb-2"></i>
                        </a>
                        <?php
                        } else { ?>
                            <a class="btn btn-success rounded-5 icon-link icon-link-hover my-2 me-2" href="/controllers/login/sign-in-ctrl.php">
                            Connectez-vous
                            <i class="bi bi-chevron-right mb-2"></i>
                        </a>
                        <?php
                        } ?>
                </div>
            </div>
        </div>
    </div>
</section>