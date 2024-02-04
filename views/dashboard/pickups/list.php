<h2 class="my-4 fw-bold"><i class="bi bi-shop-window text-primary me-2"></i><?= $title ?></h2>

<section>
    <a class="btn btn-primary mb-3" href="/controllers/dashboard/pickups/add-ctrl.php" role="button"><i class="bi bi-plus-circle me-2"></i>Créer un lieu de retrait</a>
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
                        <a class="btn btn-sm btn-outline-secondary me-2" href="/controllers/dashboard/pickups/update-ctrl.php?idpickup=<?=$pickup->id_pickup?>" role="button"><i class="bi bi-pencil-fill me-2"></i>Modifier</a>
                        <a class="btn btn-sm btn-outline-danger" href="/controllers/dashboard/pickups/delete-ctrl.php?idpickup=<?=$pickup->id_pickup?>" onclick="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?');" role="button"><i class="bi bi-trash3-fill me-2"></i>Supprimer</a>
                    </td>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>


</section>