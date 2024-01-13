    <!-- Section Entête -->
    <section class="bg-success">
        <div class="container py-4 py-lg-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-7">
                    <div class="text-center text-light">
                        <h1 class="title-lilita">Mon tableau de bord</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section Mon tableau de bord -->
    <section class="py-4 py-lg-5">
        <div class="container">
            <div class="text-center mb-4">
                <nav aria-label="breadcrumb mb-5">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/controllers/dashboard-users/home-ctrl.php">Tableau de bord</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ma fiche producteur</li>
                    </ol>
                </nav>
                <h4 class="title-lilita">Ma fiche producteur</h4>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form class="mb-3" method="POST" enctype='multipart/form-data' novalidate>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="namebusinessProducer" class="form-label">Nom de l’entreprise*</label>
                                    <input type="text" class="form-control" id="namebusinessProducer" name="namebusinessProducer" placeholder="Entrez le nom de votre entreprise" pattern="<?= REGEX_NAME ?>" value="<?= $namebusinessProducer ?? '' ?>" required>
                                    <small class="form-text text-danger"><?= $error['namebusinessProducer'] ?? '' ?></small>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="siretProducer" class="form-label">Siret/Siren</label>
                                    <input type="text" inputmode="numeric" class="form-control" id="siretProducer" name="siretProducer" placeholder="ex : 12345678901234" pattern="<?= REGEX_SIRET ?>" value="<?= $siretProducer ?? '' ?>">
                                    <small class="form-text text-danger"><?= $error['siretProducer'] ?? '' ?></small>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="firstnameProducer" class="form-label">Prénom*</label>
                                    <input type="text" class="form-control" id="firstnameProducer" name="firstnameProducer" placeholder="Entrez un prénom" pattern="<?= REGEX_NAME ?>" value="<?= $firstnameProducer ?? '' ?>" required>
                                    <small class="form-text text-danger"><?= $error['firstnameProducer'] ?? '' ?></small>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="lastnameProducer" class="form-label">Nom*</label>
                                    <input type="text" class="form-control" id="lastnameProducer" name="lastnameProducer" placeholder="Entrez un nom" pattern="<?= REGEX_NAME ?>" value="<?= $lastnameProducer ?? '' ?>" required>
                                    <small class="form-text text-danger"><?= $error['lastnameProducer'] ?? '' ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description de l'entreprise</label>
                            <textarea class="form-control" id="" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Ajouter un logo</label>
                            <input class="form-control mb-2" type="file" id="formFile">
                            <p class="mb-0 fw-bold">Nom du fichier<a class="btn btn-outline-danger btn-sm ms-2" href="#" role="button">Supprimer</a></p>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Ajouter une photo de couverture</label>
                            <input class="form-control mb-2" type="file" id="formFile">
                            <p class="mb-0 fw-bold">Nom du fichier<a class="btn btn-outline-danger btn-sm ms-2" href="#" role="button">Supprimer</a></p>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-3">
                                    <label for="phoneProducer" class="form-label">Numéro de téléphone</label>
                                    <input type="tel" class="form-control" id="phoneProducer" name="phoneProducer" placeholder="Entrez un numéro" pattern="<?= REGEX_PHONE ?>" value="<?= $phoneProducer ?? '' ?>">
                                    <small class="form-text text-danger"><?= $error['phoneProducer'] ?? '' ?></small>
                                </div>
                            </div>
                            <div class="col-xl-12">    
                                <div class="mb-3">
                                    <label for="adressProducer" class="form-label">Adresse postal*</label>
                                    <input type="text" class="form-control" id="adressProducer" name="adressProducer" placeholder="ex : 1 rue des Champs" pattern="<?= REGEX_ADRESS ?>" value="<?= $adressProducer ?? '' ?>" required>
                                    <small class="form-text text-danger"><?= $error['adressProducer'] ?? '' ?></small>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="mb-3">
                                    <label for="zipProducer" class="form-label">Code postal*</label>
                                    <input type="text" inputmode="numeric" class="form-control" id="zipProducer" name="zipProducer" placeholder="ex : 80000" pattern="<?= REGEX_POSTAL_CODE ?>" value="<?= $zipProducer ?? '' ?>" required>
                                    <small class="form-text text-danger"><?= $error['zipProducer'] ?? '' ?></small>
                                </div>
                            </div>
                            <div class="col-xl-8"> 
                                <div class="mb-3">
                                    <label for="cityProducer" class="form-label">Ville*</label>
                                    <input type="text" class="form-control" id="cityProducer" name="cityProducer" placeholder="ex : Amiens" pattern="<?= REGEX_CITY ?>" value="<?= $cityProducer ?? '' ?>" required>
                                    <small class="form-text text-danger"><?= $error['cityProducer'] ?? '' ?></small>
                                </div>
                            </div>
                        </div>        

                        <!-- <div class="mb-3">
                            <p class="mb-1">Mettre en ligne*</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" value="">
                                <label class="form-check-label" for="">Oui</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="" value="">
                                <label class="form-check-label" for="">Non</label>
                            </div>
                        </div> -->

                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-lg btn-success mb-3">Je valide ma fiche</button>
                        </div>
                        <small class="text-center">*Champs obligatoires</small>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- FIN section Mon tableau de bord -->