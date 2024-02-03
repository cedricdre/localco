<h2 class="my-4 fw-bold"><?= $title ?></h2>

<section>
    <a class="btn btn-primary mb-3" href="/controllers/dashboard/types/add-ctrl.php" role="button"><i class="bi bi-plus-circle me-2"></i>Créer un type</a>
    <div class="table-responsive">
        <table class="table align-middle table-striped">
            <thead>
                <tr>
                <th scope="col">Nom du type</th>
                <th class="text-end" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($types as $type){ ?>
                <tr>
                    <th scope="row"><?=$type->type_name?></th>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-secondary me-2" href="/controllers/dashboard/types/update-ctrl.php?idtype=<?=$type->id_type?>" role="button"><i class="bi bi-pencil-fill me-2"></i>Modifier</a>
                        <a class="btn btn-sm btn-outline-danger" href="/controllers/dashboard/types/delete-ctrl.php?idtype=<?=$type->id_type?>" onclick="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?');" role="button"><i class="bi bi-trash3-fill me-2"></i>Supprimer</a>
                    </td>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>


</section>