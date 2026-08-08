
    <main class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1 text-dark">Employés</h1>
                <p class="text-muted mb-0">Liste de tous les employés de l'entreprise.</p>
            </div>
         <?php if(isset($_SESSION['user']) && $_SESSION['user']->getTypeUser()->value=="ADMIN"):?>
             <a href="/employe/form" class="btn btn-primary">
                Ajouter un  employé
            </a>
        <?php endif ?>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Fonction</th>
                                <th>Departement</th>
                            <?php if(isset($_SESSION['user']) && $_SESSION['user']->getTypeUser()->value=="CHEF"):?>
                                 <th>Actions</th>
                             <?php endif ?>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                        <?php 
                        $employes=$employes??[];
                        foreach($employes as $employe):?>
                            <tr>
                                <td class="ps-4"><?php echo $employe->getId(); ?></td>
                                <td><?php echo $employe->getNom(); ?></td>
                                <td><?php echo $employe->getPrenom(); ?></td>
                                <td><?php echo $employe->getEmail(); ?></td>
                                <td><?php echo $employe->getTelephone(); ?></td>
                                <td><?php echo $employe->getTypeUser()->value; ?></td>
                                <td><?php echo $employe->getDepartement()->getNom(); ?></td>
                            <?php if(isset($_SESSION['user']) && $_SESSION['user']->getTypeUser()->value=="CHEF"):?>
                                <td class="gap-2"> 
                                    <a
                                     href="/tache/form?id=<?php echo $employe->getId(); ?>"
                                    type="button"
                                    class="btn btn-outline-info"

                                     >
                                    New Tache
                                  </a>
                                <a
                                   href="/tache/list?id=<?php echo $employe->getId(); ?>"
                                    type="button"
                                    class="btn btn-outline-success"
                                     >
                                    Voir Taches
                                 </a>
                                 </td>
                            <?php endif ?>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
