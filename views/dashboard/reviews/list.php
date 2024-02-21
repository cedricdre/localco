<h2 class="my-4 fw-bold"><i class="bi bi-shop-window text-primary me-2"></i><?= $title ?></h2>

<section>
    <?php include __DIR__ . '/../templates/message.php' ?>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <?php
        foreach ($reviews as $review) { ?>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$review->id_review?>" aria-expanded="false" aria-controls="flush-collapseOne">
                <?=date('d/m/Y', strtotime($review->created_at))?> - <?=$review->firstname?> <?=$review->lastname?>
                <?php
                if ($review->valid_at == NULL) { ?>
                    <span class="ms-2 badge text-bg-warning"><i class="bi bi-exclamation-triangle-fill me-1"></i>Avis à valider</span>
                <?php
                } else { ?>
                    <i class="ms-2 bi bi-check-circle-fill"></i>
                <?php
                } ?>
                </button>
            </h2>
            <div id="flush-collapse<?=$review->id_review?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <p>Produit : <span class="fw-bold"><?= $review->product_name ?></span> - Note : <i class="bi bi-star-fill me-1 text-warning"></i><?= $review->rating ?></p>
                    <p><?= $review->comment ?></p>
                    <?php
                    if ($review->valid_at == NULL) { ?>
                        <a class="btn btn-sm btn-success me-2" href="/controllers/dashboard/reviews/list-ctrl.php?idreview=<?=$review->id_review?>" role="button">Valider le commentaire</a>
                    <?php
                    } ?>
                    <a class="btn btn-sm btn-outline-danger my-1" href="/controllers/dashboard/reviews/delete-ctrl.php?idreview=<?=$review->id_review?>" role="button"><i class="bi bi-archive-fill me-2"></i>Supprimer</a>
                </div>
            </div>
        </div>
        <?php
        } ?>
    </div>

</section>