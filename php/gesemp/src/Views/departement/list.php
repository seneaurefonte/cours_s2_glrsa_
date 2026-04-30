
    <main class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1 text-dark">Départements</h1>
                <p class="text-muted mb-0">Liste de tous les départements de l'entreprise.</p>
            </div>
            <a href="/departement/form" class="btn btn-primary">
                Ajouter un département
            </a>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Code</th>
                                <th>Nom</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                        <?php foreach($departements as $departement):?>
                            <tr>
                                <td class="ps-4 fw-medium text-dark"><?php echo $departement->getId();?> </td>
                                <td class="text-muted"><?php echo $departement->getCode();?></td>
                                <td class="text-muted"><?php echo $departement->getNom();?></td>
                            </tr>
                           <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
