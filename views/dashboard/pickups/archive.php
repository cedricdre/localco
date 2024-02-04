<span><a class="btn btn-sm btn-outline-primary" href="/controllers/dashboard/pickups/list-ctrl.php" role="button"><i class="bi bi-arrow-left me-2"></i>Retour liste des lieux de retrait</a></span>
<h2 class="my-4 fw-bold"><i class="bi bi-archive text-primary me-2"></i><?= $title ?></h2>

<section>
    <?php include __DIR__ .'/../templates/message.php'?>

    <div class="table-responsive">
        <table class="table align-middle table-striped">
            <thead>
                <tr>
                    <th scope="col">Ville</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Heures d'ouverture</th>
                    <th class="text-end" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($pickups as $pickup){ ?>
                <tr>
                    <th scope="row"><?=$pickup->city?></th>
                    <th scope="row"><?=$pickup->pickup_name?></th>
                    <th scope="row"><?=$pickup->address?></th>
                    <th scope="row"><?=$pickup->opening_hours?></th>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-danger" href="/controllers/dashboard/pickups/archive-ctrl.php?idpickup=<?=$pickup->id_pickup?>" role="button"><i class="bi bi-trash3-fill me-2"></i>Désarchiver</a>
                    </td>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>


</section>