<span><a class="btn btn-sm btn-outline-primary" href="/controllers/dashboard/types/list-ctrl.php" role="button"><i class="bi bi-arrow-left me-2"></i>Retour liste des types</a></span>
<h2 class="my-4 fw-bold"><i class="bi bi-list-ul text-primary me-2"></i><?= $title ?></h2>

<section>
    <?php include __DIR__ .'/../templates/message.php'?>

    <form method="POST">
        <div class="mb-4">
            <label for="type_name" class="form-label">Nom du type*</label>
            <input type="text" value="<?= $type->type_name ?? '' ?>" name="type_name" class="form-control" id="type_name" aria-describedby="type_nameHelp" required  pattern="<?= REGEX_NAME ?>" placeholder="">
            <div id="type_nameHelp" class="form-text text-danger"><?= $error['type_name'] ?? '' ?></div>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
    <p class="my-4 small">*Champs obligatoire</p>

</section>