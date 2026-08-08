    <main class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                        <h3 class="card-title h5 mb-1 text-dark">Nouveau Employe</h3>
                        <p class="text-muted small mb-0">Veuillez saisir les informations pour le nouveau employe.</p>
                    </div>
                    <div class="card-body p-4">
                        <form action="/employe/create" method="POST">
                           
                            <div class="mb-3">
                                <label for="code" class="form-label text-dark fw-medium">Nom</label>
                                <input type="text"  value="" name="nom" id="nom" class="form-control" placeholder="EX: Wane ">

                            </div>
                              <div class="mb-3">
                                <label for="nom" class="form-label text-dark fw-medium">Prenom</label>
                                <input type="text" name="prenom" id="prenom" class="form-control" placeholder="EX: Wane ">
                                
                            </div>

                             <div class="mb-3">
                                <label for="nom" class="form-label text-dark fw-medium">Telephone</label>
                                <input type="text" name="telephone" id="telephone" class="form-control" placeholder="EX: Wane ">
                            </div>

                             <div class="mb-3">
                                <label for="email" class="form-label text-dark fw-medium">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="EX: Wane ">
                             </div>

                             <div class="mb-3">
                                <label for="departement_id" class="form-label">Departement</label>
                                <select
                                    class="form-select form-select-md"
                                    name="departement_id"
                                    id="departement_id"
                                >
                                    <option selected value="0">Sélectionnez un département</option>
                                    <?php
                                    $departements=$departements??[];
                                    foreach($departements as $departement):?>
                                        <option value="<?php echo $departement->getId();?>"><?php echo $departement->getNom();?></option>
                                    <?php endforeach; ?>
                                
                                 
                                   
                                </select>
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
