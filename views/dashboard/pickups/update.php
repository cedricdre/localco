<span><a class="btn btn-sm btn-outline-primary" href="/controllers/dashboard/pickups/list-ctrl.php" role="button"><i class="bi bi-arrow-left me-2"></i>Retour liste des lieux de retrait</a></span>
<h2 class="my-4 fw-bold"><i class="bi bi-shop-window text-primary me-2"></i><?= $title ?></h2>

<section>
    <?php include __DIR__ .'/../templates/message.php'?>

    <form method="POST">
        <div class="mb-4">
            <label for="pickup_name" class="form-label">Nom du lieu de retrait*</label>
            <input type="text" value="<?= $pickup->pickup_name ?? '' ?>" name="pickup_name" class="form-control" id="pickup_name" aria-describedby="pickup_nameHelp" required pattern="<?= REGEX_NAME ?>" placeholder="Ex : Localco Amiens Centre">
            <div id="pickup_nameHelp" class="form-text text-danger"><?= $error['pickup_name'] ?? '' ?></div>
        </div>
        <div class="mb-4">
            <label for="address" class="form-label">Adresse*</label>
            <input type="text" value="<?= $pickup->address ?? '' ?>" name="address" class="form-control" id="address" aria-describedby="addressHelp" required pattern="<?= REGEX_ADRESS ?>" placeholder="Ex : 1 rue des Champs">
            <div id="addressHelp" class="form-text text-danger"><?= $error['address'] ?? '' ?></div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="zip" class="form-label">Code postal*</label>
                <input type="text" value="<?= $pickup->zip ?? '' ?>" inputmode="numeric" name="zip" class="form-control" id="zip" aria-describedby="zipHelp" required pattern="<?= REGEX_POSTAL_CODE ?>" placeholder="Ex : 80000">
                <div id="zipHelp" class="form-text text-danger"><?= $error['zip'] ?? '' ?></div>
            </div>
            <div class="col-md-6 mb-4">
                <label for="city" class="form-label">Ville*</label>
                <input type="text" value="<?= $pickup->city ?? '' ?>" name="city" class="form-control" id="city" aria-describedby="cityHelp" required pattern="<?= REGEX_CITY ?>" placeholder="Ex : Amiens">
                <div id="cityHelp" class="form-text text-danger"><?= $error['city'] ?? '' ?></div>
            </div>
        </div>
        <div class="mb-4">
            <label for="opening_hours" class="form-label">Heures d'ouverture*</label>
            <input type="text" value="<?= $pickup->opening_hours ?? '' ?>" name="opening_hours" class="form-control" id="opening_hours" aria-describedby="opening_hoursHelp" required placeholder="Ex : 9h00 - 17h00">
            <div id="opening_hoursHelp" class="form-text text-danger"><?= $error['opening_hours'] ?? '' ?></div>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
    <p class="my-4 small">*Champs obligatoires</p>

</section>