    <!-- Offcanvas PANIER -->
    <div class="offcanvas offcanvas-end text-success" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <p class="offcanvas-title" id="offcanvasExampleLabel"><i class="bi bi-bag-fill fs-4 me-2"></i><span class="fs-4 title-lilita me-2">Mon panier</span>2 produit(s)</p>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a class="btn btn-sm btn-outline-danger rounded-5 mb-2" href="#" role="button"><i class="bi bi-trash3-fill me-2"></i>Vider le panier</a>
            <!-- Ligne produit panier Test 1 -->
            <div class="border-bottom border-1 py-2">
                <div class="row g-0 align-items-center justify-content-between">
                    <div class="col-5">
                        <p class="fw-bold mb-0">Nom du produit</p>
                        <small class="small fw-light opacity-75 mb-0">500g</small>
                    </div>
                    <div class="col-2">
                        <input type="number" value="1" min="1" max="10" id="inputQte" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                    <div class="col-2">
                        <p class="fw-bolder mb-0">0,00 €</p>
                    </div>
                    <div class="col-1">
                        <a href="" class="text-danger"><i class="bi bi-trash3-fill"></i></a>
                    </div>
                </div>
            </div>   
            <!-- Ligne produit panier Test 2 -->
            <div class="border-bottom border-1 py-2">
                <div class="row g-0 align-items-center justify-content-between">
                    <div class="col-5">
                        <p class="fw-bold mb-0">Nom du produit avec du texte sur 2 lignes</p>
                        <small class="small fw-light opacity-75 mb-0">500g</small>
                    </div>
                    <div class="col-2">
                        <input type="number" value="1" min="1" max="10" id="inputQte" class="form-control" aria-describedby="passwordHelpInline">
                    </div>
                    <div class="col-2">
                        <p class="fw-bolder mb-0">0,00 €</p>
                    </div>
                    <div class="col-1">
                        <a href="" class="text-danger"><i class="bi bi-trash3-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-header bg-success-subtle">
            <p class="mb-0">Total : <span class="title-lilita fs-5">0,00 €</span></p>

            <a class="btn btn-success rounded-5 icon-link icon-link-hover my-2 me-2" href="#">
                Passer la commande
                <i class="bi bi-chevron-right mb-2"></i>
            </a>
        </div>
    </div><!-- FIN Offcanvas PANIER -->
