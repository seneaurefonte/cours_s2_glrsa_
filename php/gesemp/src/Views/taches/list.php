<?php 
use App\Config\DateUtils;
?>
    <main class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-1 text-dark">Employés</h1>
                <p class="text-muted mb-0">Liste des taches de <?php echo isset($_SESSION['user']) ? $_SESSION['user'] : 'Utilisateur'; ?></p>
            </div>
       
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Code</th>
                                <th>Nom</th>
                                <th>Date debut</th>
                                <th>Date Fin</th>
                                <th>Statut</th>
                               
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                        <?php 
                        $taches=$taches??[];
                        foreach($taches as $tache):?>
                            <tr>
                                <td class="ps-4"><?php echo $tache->getCode(); ?></td>
                                <td><?php echo $tache->getNom(); ?></td>
                                <td><?php echo DateUtils::formatDateString($tache->getDateDebut())?></td>
                                <td><?php echo DateUtils::formatDateString($tache->getDateFin())?></td>
                                <td><?php echo DateUtils::difference(DateUtils::toDateTime($tache->getDateFin()), DateUtils::toDateTime($tache->getDateDebut()))>0?"Encours":"Terminer"; ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
