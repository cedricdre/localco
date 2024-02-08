<span><a class="btn btn-sm btn-outline-primary" href="/controllers/dashboard/producers/list-ctrl.php" role="button"><i class="bi bi-arrow-left me-2"></i>Retour liste des producteurs</a></span>

<h2 class="fw-bold my-4"><i class="bi bi-people text-primary me-2"></i><?= $title ?></h2>
<section>
    <div class="table-responsive">
        <table class="table align-middle table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom de l'entreprise</th>
                    <th scope="col">Nom Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Ville</th>
                    <th class="text-end" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($producers as $producer){ ?>
                <tr>
                    <th scope="row"><?=$producer->company_name?></th>
                    <th scope="row"><?=$producer->lastname?> <?=$producer->firstname?></th>
                    <th scope="row"><a href="mailto:<?=$producer->email?>"><?=$producer->email?></a></th>
                    <th scope="row"><a href="tel:+33<?=$producer->phone?>"><?=$producer->phone?></a></th>
                    <th scope="row"><?=$producer->address?></th>
                    <th scope="row"><?=$producer->city?></th>
                    <td class="text-end">
                        <a class="btn btn-sm btn-outline-secondary me-1" href="/controllers/dashboard/producers/archive-ctrl.php?iduser=<?=$producer->id_user?>" role="button"><i class="bi bi-archive-fill me-2"></i>Désarchiver</a>
                        <a class="btn btn-sm btn-outline-danger" href="/controllers/dashboard/producers/delete-ctrl.php?iduser=<?=$producer->id_user?>" onclick="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?');" role="button"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>


</section>