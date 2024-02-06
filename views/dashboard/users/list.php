<h2 class="my-4 fw-bold"><i class="bi bi-people text-primary me-2"></i><?= $title ?></h2>

<section>
    <?php include __DIR__ .'/../templates/message.php'?>

    <div class="table-responsive">
        <table class="table align-middle table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">email</th>
                    <th class="text-end" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($clients as $client){ ?>
                <tr>
                    <th scope="row"><?=$client->id_user?></th>
                    <th scope="row"><?=$client->lastname?></th>
                    <th scope="row"><?=$client->firstname?></th>
                    <th scope="row"><?=$client->email?></th>
                    <td class="text-end">
                        <!-- <a class="btn btn-sm btn-outline-secondary me-2" href="/controllers/dashboard/pickups/update-ctrl.php?idpickup=<?=$client->id_user?>" role="button"><i class="bi bi-pencil-fill me-2"></i>Modifier</a> -->
                        <a class="btn btn-sm btn-outline-danger" href="/controllers/dashboard/users/list-ctrl.php?iduser=<?=$client->id_user?>" role="button"><i class="bi bi-archive-fill me-2"></i>Supprimer</a>
                    </td>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>


</section>