

    <main class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                        <h3 class="card-title h5 mb-1 text-dark">Nouveau Département</h3>
                        <p class="text-muted small mb-0">Veuillez saisir les informations pour le nouveau département.</p>
                    </div>
                    <div class="card-body p-4">
                        <form action="/departement/create" method="POST">
                           
                            <div class="mb-3">
                                <label for="code" class="form-label text-dark fw-medium">Code du département</label>
                                <input type="text" name="code" id="code" class="form-control <?php isset($errors['code']) ? 'is-invalid' : '' ;?> " placeholder="Ex: IT">
                                 <div  class="invalid-feedback">
                                    <?php echo htmlspecialchars($errors['code']);?>
                                 </div>
                            </div>

                            <div class="mb-4">
                                <label for="nom" class="form-label text-dark fw-medium">Nom du département</label>
                                <input type="text" name="nom" id="nom" class="form-control <?php isset($errors['nom']) ? 'is-invalid' : '' ;?> " placeholder="Ex: Informatique">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                       <?php echo htmlspecialchars($errors['nom']);?>
                                 </div>
                            </div>
                            
                            <div class="d-flex justify-content-end gap-2 bg-light p-3 mx-n4 mb-n4 border-top">
                                <a href="departements_index.html" class="btn btn-light border">Annuler</a>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

