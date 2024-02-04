
    <h2 class="fw-bold my-4"><i class="bi bi-people text-primary me-2"></i><?= $title ?></h2>
    <a class="btn btn-outline-secondary mb-3" href="/controllers/dashboard/pickups/add-ctrl.php" role="button">Producteurs archivés</a>


<section>
    <div class="table-responsive">
        <table class="table align-middle table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom de l'entreprise</th>
                    <th scope="col">Siret</th>
                    <th scope="col">Nom Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Ville CP</th>
                    <!-- <th class="text-end" scope="col">Actions</th> -->
                </tr>
            </thead>
            <tbody>

                <tr>
                    <th scope="row">Test</th>
                    <th scope="row">Test</th>
                    <th scope="row">Test</th>
                    <th scope="row"><a href="mailto:email@example.com">email@example.com</a></th>
                    <th scope="row"><a href="tel:+330650549647">0650549647</a></th>
                    <th scope="row">Test</th>
                    <th scope="row">Test</th>
                    <!-- <td class="text-end">
                        <a class="btn btn-sm btn-outline-danger" href="" onclick="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?');" role="button"><i class="bi bi-trash3-fill me-2"></i>Supprimer</a>
                    </td> -->
                </tr>

            </tbody>
        </table>
    </div>


</section>