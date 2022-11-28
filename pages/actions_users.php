<?php 
  
  require_once '../model/Model.php';

  //Appel de la classe Model
  $model = new Model;

  //Bloc d'enregstrement d'un utilisteur 
  if (isset($_POST['add_user']) ){

      if (!empty($_POST['nom'])) {

        $nom = $_POST['nom'];
        $type = $_POST['type'];
        $login = $_POST['login'];
        $password = $_POST['password'];

        $user_exist = $model->userExists($nom);

        if (!empty($user_exist)) {
          echo '
            <div class="alert alert-info alert-dismissible" id="msg" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6>Cet utilisateur existe déjà dans le système</h6>
            </div> ';
        }else{

          if ($add_data = $model->insertUser($nom,$type,$login,$password)) {
                
            echo '
              <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h6>Utilisateur ajouté avec succès</h6>
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
    
  //Bloc d'affichage du détail d'une seule école séléctionnée  
  }elseif(isset($_POST['id']) && !empty($_POST['id'])){
    
    $id = $_POST['id'];

    $row = $model->getUserSingle($id);

    if (!empty($row)) { 
      foreach($row as $data):
      ?>

      <form action="" method="post" was-validate>
        <div class="form-group">
          <input type="hidden" name="idM" value="<?php echo $data['id']; ?>" id="idM" class="form-control" placeholder="Id" required="required" >
        </div>
        <div class="form-group">
          <label for="nomM">Nom Utilisateur</label>
          <input type="text" name="nomM" value="<?php echo $data['nom']; ?>" id="nomM" class="form-control" placeholder="Nom Utilisteur" required="required" >
        </div>
        <div class="form-group">
          <label for="typeM">Catégorie</label>
          <select class="form-control" id="typeM" required>
            <option value="<?php echo $data['type']; ?>" ><?php echo $data['type']; ?></option>
            <option value="admin">ADMINISTRATEUR</option>
            <option value="secretaire">SECRETAIRE</option>
          </select>
        </div>
        <div class="form-group">
          <label for="loginM">Login</label>
          <input type="text" name="loginM" value="<?php echo $data['login']; ?>" id="loginM" class="form-control" placeholder="Login ecole" required="required" >
        </div>
        <div class="form-group">
          <label for="passwordM">Mot de passe</label>
          <input type="text" name="passwordM" value="<?php echo $data['password']; ?>" id="passwordM" class="form-control" placeholder="Mot de passe" required="required" >
        </div>

        </div>

    <?php endforeach; 
    }

    //Bloc d'affichage des toutes les écoles de la base de données 
  
  //Bloc affichage de tous les utilisateurs 
  }elseif (isset($_POST['showAllUsers']) && $_POST['showAllUsers'] === "showAllUsers") {
    $list_users = $model->getAllUsers();

    if (!empty($list_users)) {

      foreach ($list_users as $res) { ?>
                                 
        <tr style="font-size: 13px;">
          <td><?php echo $res['id'] ?></td>
          <td><?php echo $res['nom'] ?></td>
          <td><?php echo $res['type'] ?></td>
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

  
  //Bloc modification d'une école
  }elseif (isset($_POST['editUser']) && $_POST['editUser'] === "editUser" && isset($_POST['idM'])){

    if (!empty(isset($_POST['idM'])) && !empty($_POST['nomM']) && !empty($_POST['loginM'])&& !empty($_POST['passwordM'])&& !empty($_POST['typeM'])) {

        $idM = $_POST['idM'];
        $nomM = $_POST['nomM'];
        $loginM = $_POST['loginM'];
        $passwordM = $_POST['passwordM'];
        $typeM = $_POST['typeM'];

        if ($edit_data = $model->editUser($nomM,$typeM,$loginM,$passwordM,$idM)) {
                
            echo '
              <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h6>Utilisateur modifié avec succès</h6>
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
  }elseif (isset($_POST['supprimUser']) && $_POST['supprimUser'] === "supprimUser" && isset($_POST['idS'])){

      if (!empty($_POST['idS']) ) {

        $id = $_POST['idS'];

        if ($delete_data = $model->deleteUser($id)) {
                
          echo '
            <div class="alert alert-success alert-dismissible" id="msg" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6>Utilisteur supprimé avec succès</h6>
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