<?php 
  
  require_once '../model/Model.php';

  //Appel de la classe Model
  $model = new Model;

  //Bloc d'enregstrement une demande dans la base de données  
  if (isset($_POST['add_demande']) ){

      if (!empty($_POST['motif']) && !empty($_POST['beneficiaire'])&& !empty($_POST['categorie'])) {

        $motif = $_POST['motif'];
        $id_beneficiaire = $_POST['beneficiaire'];
        $categorie = $_POST['categorie'];

        $etat = (isset($_POST['etat'])?$_POST['etat']:1);

        $dat = date('Y-m-d');

          $filename = $_FILES['fichier']['name'];

          /* Location */
           $location = "../archives/".$filename;
           $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
           $imageFileType = strtolower($imageFileType);

           /* Valid extensions */
           $valid_extensions = array("pdf","docx","doc");

           /* Check file extension */
        if(in_array(strtolower($imageFileType), $valid_extensions)) {
          $newname = rand() . "." . $imageFileType;
          $location = "../archives/". $newname;
          /* Upload file */
          if(move_uploaded_file($_FILES['fichier']['tmp_name'],$location)){
            $demande_exist = $model->demandeExists($motif,$categorie,$id_beneficiaire,$dat);

            if (!empty($demande_exist)) {
                echo '
                  <div class="alert alert-info alert-dismissible" id="msg" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h6>Cette demande existe déjà dans le système</h6>
                  </div> ';
            }else{


              if ($add_data = $model->insertDemande($motif,$categorie,$newname,$id_beneficiaire,$etat)) {
                  
                echo '
                  <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h6>Démande ajoutée avec succès</h6>
                  </div> ';

              }else{

                echo '
                  <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h6>Une erreur est survenue</h6>
                  </div> ';
              }
            }
          }else{
              echo '
                <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h6>Une erreur est survenu lors de l\'importation de la photo</h6>
                </div> ';  
          }
        }else{
          echo '
            <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h6>Choisissez un bon format de la photo</h6>
            </div> ';
        }
      }else{

        echo '
          <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h6>Completer tous les champs</h6>
          </div> ';
      }

    
  //Bloc d'affichage du détail d'un seu séléctionnée  
  }elseif(isset($_POST['id']) && !empty($_POST['id'])){
    
    $id = $_POST['id'];

    $row = $model->getBeneficiaireSingle($id);

    if (!empty($row)) { 
      foreach($row as $data):
      ?>

      <form action="" method="post" was-validate>
        <div class="form-group ">
          <input type="hidden" name="idM" value="<?php echo $data['id']; ?>" id="idM" class="form-control" placeholder="Id" required="required" >
        </div>
        <div class="form-group col-md-6">
          <label for="nomM">Nom Bénéficiaire</label>
          <input type="text" name="nomM" value="<?php echo $data['nom']; ?>" id="nomM" class="form-control" placeholder="Nom Utilisteur" required="required" >
        </div>
        <div class="form-group col-md-6">
          <label for="postnomM">Postnom Bénéficiaire</label>
          <input type="text" name="postnomM" value="<?php echo $data['postnom']; ?>" id="postnomM" class="form-control" placeholder="Nom Utilisteur" required="required" >
        </div>
        <div class="form-group col-md-6">
          <label for="sexeM">Sexe</label>
          <select class="form-control" id="sexeM" required>
            <option value="<?php echo $data['sexe']; ?>" ><?php echo $data['sexe']; ?></option>
            <option value="Masculin">Masculin</option>
            <option value="Féminin">Féminin</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="residenceM">Résidence</label>
          <input type="text" name="residenceM" value="<?php echo $data['residence']; ?>" id="residenceM" class="form-control" placeholder="Login ecole" required="required" >
        </div>
        <div class="form-group col-md-6">
          <label for="telephoneM">N° Téléphone</label>
          <input type="text" name="telephoneM" value="<?php echo $data['telephone']; ?>" id="telephoneM" class="form-control" placeholder="Login ecole" required="required" >
        </div>
        <div class="form-group col-md-6">
          <label for="nbEnfantsM">Nombre Enfants</label>
          <input type="text" name="nbEnfantsM" value="<?php echo $data['nb_enfants']; ?>" id="nbEnfantsM" class="form-control" placeholder="Login ecole" required="required" >
        </div>
        <div class="form-group col-md-6">
          <label for="loginM">Login</label>
          <input type="text" name="loginM" value="<?php echo $data['login']; ?>" id="loginM" class="form-control" placeholder="Login ecole" required="required" >
        </div>
        <div class="form-group col-md-6">
          <label for="passwordM">Mot de passe</label>
          <input type="text" name="passwordM" value="<?php echo $data['password']; ?>" id="passwordM" class="form-control" placeholder="Mot de passe" required="required" >
        </div>
        <div class="form-group col-md-6">
          <label for="dateNaissanceM">Date Naissance</label>
          <input type="date" name="dateNaissanceM" value="<?php echo $data['dateNaissance']; ?>" id="dateNaissanceM" class="form-control" placeholder="Mot de passe" required="required" >
        </div>

        </div>

    <?php endforeach; 
    }
  
  //Bloc affichage de toutes les demandes de la base de données côté admin 
  }elseif (isset($_POST['showAllDemandesAdmin']) && $_POST['showAllDemandesAdmin'] === "showAllDemandesAdmin") {
    $list_demandes = $model->getAllDemandesAdmin();

    if (!empty($list_demandes)) {

      foreach ($list_demandes as $res) { ?>
                                 
        <tr style="font-size: 13px;">
          <td><?php echo $res['id'] ?></td>
          <td><?php echo date('d-m-Y',strtotime($res['date_demande'])) ?></td>
          <td><?php echo $res['motif'] ?></td>
          <td><?php echo $res['categorie'] ?></td>
          <td><?php echo $res['nom'].' '.$res['postnom'] ?></td>
          <td><a class="btn btn-primary btn-sm" target="__blank" href="../archives/<?php echo $res['fichier'] ?>"><i class="fa fa-eye"></i>Visualiser </a></td>
          <td><?php echo (($res['reponse'] == "")?'En cours de traitement':$res['reponse']) ?></td>
          <td>
            <?php 
              if($res['etat_demande'] == 1 ){
              ?>
                <a href="" id="editBtn" value="<?php echo $res['id'] ?>" class="btn btn-success btn-sm " title=""><i class="fa fa-check-circle"></i> Approuver</a> 
                <a href="" id="deleteBtn" value="<?php echo $res['id'] ?>" class="btn btn-danger btn-sm " title=""><i class="fa fa-trash"></i> Annuler</a> 
              <?php
            }else{
              if($res['etat_demande'] == 2 ){
                echo '<span class="text-success"><i class="fa fa-check"></i> Approuvé</span>'; 
              }elseif($res['etat_demande'] == 3 ){
                echo '<span class="text-danger"><i class="fa fa-trash"></i> Annulé</span>';
              }elseif($res['etat_demande'] == 1 ){
                echo '<span class="text-info"><i class="fa fa-edit"></i> Encours</span>';
              }
            }

              
            ?>
            
          </td>
        </tr>
      <?php  
      } 
    }else{
      echo'
        <tr>
          <td colspan="8" class="text-center" headers="">
            <h3>Aucune donné trouvée !</h3>
          </td>
        </tr>
      ';
    }

  //Bloc affichage de toutes les demandes de la base de données côté secretaire 
  }elseif (isset($_POST['showAllDemandes']) && $_POST['showAllDemandes'] === "showAllDemandes") {
    $list_demandes = $model->getAllDemandes();

    if (!empty($list_demandes)) {

      foreach ($list_demandes as $res) { ?>
                                 
        <tr style="font-size: 13px;">
          <td><?php echo $res['id'] ?></td>
          <td><?php echo date('d-m-Y',strtotime($res['date_demande'])) ?></td>
          <td><?php echo $res['motif'] ?></td>
          <td><?php echo $res['categorie'] ?></td>
          <td><?php echo $res['nom'].' '.$res['postnom'] ?></td>
          <td><a class="btn btn-primary btn-sm" target="__blank" href="../archives/<?php echo $res['fichier'] ?>"><i class="fa fa-eye"></i>Visualiser </a></td>
          <td><?php echo (($res['reponse'] == "")?'En cours de traitement':$res['reponse']) ?></td>
          <td>
            <?php 
              if($res['etat_demande'] == 0 ){
              ?>
                <a href="" id="editBtn" value="<?php echo $res['id'] ?>" class="btn btn-primary btn-sm " title=""><i class="fa fa-edit"></i> Valider</a> 
                <a href="" id="deleteBtn" value="<?php echo $res['id'] ?>" class="btn btn-danger btn-sm " title=""><i class="fa fa-trash"></i> Annuler</a> 
              <?php
            }else{
              if($res['etat_demande'] == 2 ){
                echo '<span class="text-success"><i class="fa fa-check"></i> Approuvé</span>'; 
              }elseif($res['etat_demande'] == 3 ){
                echo '<span class="text-danger"><i class="fa fa-trash"></i> Annulé</span>';
              }elseif($res['etat_demande'] == 1 ){
                echo '<span class="text-info"><i class="fa fa-edit"></i> Encours</span>';
              }
            }

              
            ?>
            
          </td>
        </tr>
      <?php  
      } 
    }else{
      echo'
        <tr>
          <td colspan="8" class="text-center" headers="">
            <h3>Aucune donné trouvée !</h3>
          </td>
        </tr>
      ';
    }

  
  //Bloc modification d'un bénéficiaire 
  }elseif (isset($_POST['showAllDemandesBen']) && $_POST['showAllDemandesBen'] === "showAllDemandesBen" && isset($_POST['idDem'])) {

    if (empty($_POST['idDem'])) {

      header('Location:benf');

    }else

    $idDem = $_POST['idDem'];
    $list_demandes = $model->getAllDemandesBen($idDem);

    if (!empty($list_demandes)) {

      foreach ($list_demandes as $res) { ?>
                                 
        <tr style="font-size: 13px;">
          <td><?php echo $res['id'] ?></td>
          <td><?php echo date('d-m-Y',strtotime($res['date_demande'])) ?></td>
          <td><?php echo $res['motif'] ?></td>
          <td><?php echo $res['categorie'] ?></td>
          <td><a class="btn btn-primary btn-sm" target="__blank" href="../archives/<?php echo $res['fichier'] ?>"><i class="fa fa-eye"></i>Visualiser </a></td>
          <td><?php echo (($res['reponse'] == "")?'En cours de traitement':$res['reponse']) ?></td>
          <td>
            <?php 
              if($res['etat_demande'] == 0 ){
              ?>
                <a href="" id="deleteBtn" value="<?php echo $res['id'] ?>" class="btn btn-danger btn-sm " title=""><i class="fa fa-trash"></i> Annuler</a> 
              <?php
            }else{
              if($res['etat_demande'] == 2 ){
                echo '<span class="text-success"><i class="fa fa-check"></i> Approuvé</span>'; 
              }elseif($res['etat_demande'] == 3 ){
                echo '<span class="text-danger"><i class="fa fa-trash"></i> Annulé</span>';
              }elseif($res['etat_demande'] == 1 ){
                echo '<span class="text-info"><i class="fa fa-edit"></i> Encours</span>';
              }
            }

              
            ?>
            
          </td>
        </tr>
      <?php  
      } 
    }else{
      echo'
        <tr>
          <td colspan="8" class="text-center" headers="">
            <h3>Aucune donné trouvée !</h3>
          </td>
        </tr>
      ';
    }

  
  //Bloc modification d'un bénéficiaire 
  }elseif (isset($_POST['editBeneficiaire']) && $_POST['editBeneficiaire'] === "editBeneficiaire" && isset($_POST['idM'])){

    if (!empty(isset($_POST['idM'])) && !empty($_POST['nomM']) && !empty($_POST['postnomM'])&& !empty($_POST['sexeM'])&& !empty($_POST['telephoneM'])) {

        $idM = $_POST['idM'];
        $nomM = $_POST['nomM'];
        $postnomM = $_POST['postnomM'];
        $sexeM = $_POST['sexeM'];
        $residenceM = $_POST['residenceM'];
        $telephoneM = $_POST['telephoneM'];
        $nbEnfantsM = $_POST['nbEnfantsM'];
        $loginM = $_POST['loginM'];
        $passwordM = $_POST['passwordM'];
        $dateNaissanceM = $_POST['dateNaissanceM'];

        if ($edit_data = $model->editBeneficiaire($nomM,$postnomM,$sexeM,$dateNaissanceM,$residenceM,$telephoneM,$nbEnfantsM,$loginM,$passwordM,$idM)) {
                
            echo '
              <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h6>Bénéficiaire modifié avec succès</h6>
              </div> ';

        }else{

          echo '
            <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6>Une erreur est survenue</h6>
            </div> ';
        }
    }else{

      echo '
        <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h6>Completer tous les champs</h6>
        </div> ';
    }

  
  //Bloc validation demande dans la base de données 
  }elseif (isset($_POST['reponseBeneficiaire']) && $_POST['reponseBeneficiaire'] === "reponseBeneficiaire" && isset($_POST['idM'])){

    if (!empty(isset($_POST['idM']))) {

        $idM = $_POST['idM'];
        $reponse = $_POST['reponse'];
        $etat = $_POST['etat'];

        if ($edit_data = $model->validDemande($reponse,$etat,$idM)) {
                
            echo '
              <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h6>Mise à jour effectuée avec succès</h6>
              </div> ';

        }else{

          echo '
            <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6>Une erreur est survenue</h6>
            </div> ';
        }
    }else{

      echo '
        <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h6>Completer tous les champs</h6>
        </div> ';
    }

  
  //Bloc suppression d'une demande dans la base de données 
  }elseif (isset($_POST['deleteDemande']) && $_POST['deleteDemande'] === "deleteDemande" && isset($_POST['idS'])){

      if (!empty($_POST['idS']) ) {

        $id = $_POST['idS'];

        if ($delete_data = $model->deleteDemande($id)) {
                
          echo '
            <div class="alert alert-success alert-dismissible" id="msg" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6>Demande supprimée avec succès</h6>
            </div> ';

        }else{

          echo '
            <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h6>Une erreur est survenue</h6>
            </div> ';

        }
      }else{

        echo '
          <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h6>Séléctionner un utilisateur valide</h6>
          </div> ';
      }
      
  }
    

?>