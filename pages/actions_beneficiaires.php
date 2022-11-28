<?php 
  
  require_once '../model/Model.php';

  //Appel de la classe Model
  $model = new Model;

  //Bloc d'enregstrement d'un utilisteur 
  if (isset($_POST['add_beneficiaire']) ){

      if (!empty($_POST['nom']) && !empty($_POST['postnom'])&& !empty($_POST['sexe'])&& !empty($_POST['dateNaissance'])) {

        $nom = $_POST['nom'];
        $postnom = $_POST['postnom'];
        $sexe = $_POST['sexe'];
        $residence = $_POST['residence'];
        $telephone = $_POST['telephone'];
        $nbEnfants = $_POST['nbEnfants'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $dateNaiss = $_POST['dateNaissance'];

        $beneficiaire_exist = $model->beneficiaireExists($nom,$postnom);

        if (!empty($beneficiaire_exist)) {
          echo '
            <div class="alert alert-info alert-dismissible" id="msg" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6>Ce bénéficiaire existe déjà dans le système</h6>
            </div> ';
        }else{

          if ($add_data = $model->insertBeneficiaire($nom,$postnom,$sexe,$dateNaiss,$residence,$telephone,$nbEnfants,$login,$password)) {
                
            echo '
              <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h6>Enregistrement effectué avec succès</h6>
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
  
  //Bloc affichage de tous les bénéficires 
  }elseif (isset($_POST['showAllBeneficaires']) && $_POST['showAllBeneficaires'] === "showAllBeneficaires") {
    $list_users = $model->getAllBeneficiaires();

    if (!empty($list_users)) {

      foreach ($list_users as $res) { ?>
                                 
        <tr style="font-size: 13px;">
          <td><?php echo $res['id'] ?></td>
          <td><?php echo $res['nom'] ?></td>
          <td><?php echo $res['postnom'] ?></td>
          <td><?php echo $res['sexe'] ?></td>
          <td><?php echo $res['dateNaissance'] ?></td>
          <td><?php echo $res['residence'] ?></td>
          <td><?php echo $res['telephone'] ?></td>
          <td><?php echo $res['nb_enfants'] ?></td>
          <td><?php echo $res['login'] ?></td>
          <td><?php echo $res['password'] ?></td>
          <td>
            <a href="" id="editBtn" value="<?php echo $res['id'] ?>" class="btn btn-primary btn-sm " title=""><i class="fa fa-edit"></i></a> 
            <a href="" id="deleteBtn" value="<?php echo $res['id'] ?>" class="btn btn-danger btn-sm " title=""><i class="fa fa-trash"></i></a> 
          </td>
        </tr>
      <?php  
      } 
    }else{
      echo'
        <tr>
          <td colspan="6" class="text-center" headers="">
            <h3>Aucune donné trouvée !</h3>
          </td>
        </tr>
      ';
    }

    //Bloc de modification des informations d'une école

  
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


    //Blog de suppression d'une écokle dans la base de données 
  
  //Bloc suppression d'une école
  }elseif (isset($_POST['supprimBeneficiaire']) && $_POST['supprimBeneficiaire'] === "supprimBeneficiaire" && isset($_POST['idS'])){

      if (!empty($_POST['idS']) ) {

        $id = $_POST['idS'];

        if ($delete_data = $model->deleteBeneficiaire($id)) {
                
          echo '
            <div class="alert alert-success alert-dismissible" id="msg" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6>Bénéficiaire supprimé avec succès</h6>
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