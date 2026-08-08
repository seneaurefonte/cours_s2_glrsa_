   <?php use App\Config\DateUtils;?>

   <main class="container py-4">
        <div class="row shadow-sm border-0">
            <div class="col-4">
                  <?php



 $employe=$employe??null ?>
                    <div class="row justify-content-left">
                        <div class="">
                            <div class="card ">
                                <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                                    <h3 class="card-title h5 mb-1 text-dark">Indformation de l'Employe </h3>
                                    
                                </div>
                                <div class="card-body p-4">
                                    <form >
                                    
                                        <div class="mb-3 d-flex gap-2">
                                            <input type="text" disabled  value="<?php echo $employe==null?'':$employe->getNom(); ?>" name="nom" id="nom" class="form-control" placeholder="EX: Wane ">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text"  value="<?php echo $employe==null?'':$employe->getPrenom(); ?>" disabled name="prenom" id="prenom" class="form-control" placeholder="EX: Wane ">
                                            
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" value="<?php echo $employe==null?'':$employe->getTelephone(); ?>" disabled name="telephone" id="telephone" class="form-control" placeholder="EX: Wane ">
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" disabled value="<?php echo $employe==null?'':$employe->getEmail(); ?>" name="email" id="email" class="form-control" placeholder="EX: Wane ">
                                        </div>

                                        <div class="mb-3">
                                               <input type="text" value="<?php echo $employe==null?'':$employe->getDepartement()->getNom(); ?>" disabled name="email" id="email" class="form-control" placeholder="EX: Wane ">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col">
                 <div class="row justify-content-left">
                        <div class="">
                            <div class="card ">
                                <div class="card-header bg-white border-bottom-0 pt-4 pb-0 px-4">
                                    <h3 class="card-title h5 mb-1 text-dark"> Creation des Taches</h3>
                                    
                                </div>
                                <div class="card-body p-4">
                                    <form action="/tache/create" method="POST">
                                        <div class="mb-3 d-flex gap-1">
                                            <div class="col-5">
                                            <label for="code" class="form-label text-dark fw-medium">Nom</label>
                                            <input type="text"  value="" name="nom" id="nom" class="form-control" placeholder="EX: Wane ">

                                           </div>
                                             <div class="col">
                                                  <label for="nom" class="form-label text-dark fw-medium">Date Debut</label>
                                                  <input type="date" name="dateDebut" id="prenom" class="form-control" placeholder="EX: Wane ">
                                             </div>
                                             
                                              <div class="col">
                                                    <label for="nom" class="form-label text-dark fw-medium">Date Fin</label>
                                                    <input type="date" name="dateFin" id="prenom" class="form-control" placeholder="EX: Wane ">
                                             </div>
                                             <div class="col" style="margin-top: 30px;">
                                               <button type="submit" name="btnSubmitCreateTache" value="addTache" class="btn btn-primary">Ajouter </button>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                           <div
                                            class="table-responsive"
                                           >
                                           <?php $taches= $_SESSION['taches']??[] ;?>
                                           <?php if(!empty($taches)):?>
                                            <table
                                                class="table table-light table-bordered"
                                            >
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nom</th>
                                                        <th scope="col">Date Debut</th>
                                                        <th scope="col">Date Fin</th>
                                                        <th scope="col">Duree(jours)</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($taches as $tache):?>
                
                                                    <tr class="">
                                                        <td scope="row"><?php echo $tache->getNom()?></td>
                                                            <td><?php echo DateUtils::formatDateString($tache->getDateDebut())?></td>
                                                            <td><?php echo DateUtils::formatDateString($tache->getDateFin())?></td>
                                                            <td><?php echo DateUtils::difference(DateUtils::toDateTime($tache->getDateFin()), DateUtils::toDateTime($tache->getDateDebut())) ?></td>
                           
                                                         <td>R1C3</td>
                                                    </tr>

                                                    <?php  endforeach ?>
                                                   
                                                </tbody>
                                            </table>
                                            <?php endif ?>
                                               <div class="row gap-4">
                                                     <div class="col d-grid " style="margin-top: 30px;">
                                                      <button type="submit" name="btnSubmitCreateTache" value="saveTache" class="btn btn-primary btn-block">Enregistrement </button>
                                                     </div>
                                                   <div class="col d-flex flex-column align-items-center justify-content-center mt-2 ">
                                                      <div class="row "> Duree Total: 10 Jours</div>
                                                      <div class="row "> Date Fin: 12/06/2026</div>
                                                   </div>
                                                      
                                               </div>

                                               
                                                  
                                                
                                           </div>
                                           
                                      </div>
                                    </form>
                                      
                                </div>
                            </div>
                        </div>
                    </div>
                  


            </div>
        </div>
    </main>