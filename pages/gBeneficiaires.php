<?php 
  $title = 'Gestion Bénéficiaires';
  require_once('include/headerSec.php'); 

 ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('include/sidebarSec.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="secretaire">Tableau de Bord</a>
          </li>
          <li class="breadcrumb-item active">Ajouter un bénéficiaire</li>
        </ol>
        <div class="row">
          <div class="col-md-12">
            <form action="" id="form" method="POST" enctype="multipart/form-data">
       
        <!-- DataTables Example -->
            <div class="card ">
              <div class="card-header text-uppercase">Ajouter un bénéficiaire</div>
                <div class="card-body">
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-12">
                      <!-- Affichage de la notification -->
                      <div id="result">
                        
                      </div>
                      </div>
              
                      <div class="col-md-4">
                        <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom Bénéficiaire"  autocomplete="off"><br>
                      </div>
                      <div class="col-md-4">
                        <input type="text" id="postnom" name="postnom" class="form-control" placeholder="Postnom Bénéficiaire"  autocomplete="off"><br>
                      </div>
                      <div class="col-md-4">
                        <select class="form-control" id="sexe" required>
                          <option value="" selected disabled>---Sexe---</option>
                          <option value="Masculin" >Masculin</option>
                          <option value="Féminin" >Féminin</option>
                        </select><br>
                      </div>
                      <div class="col-md-4">
                        <input type="text" id="residence" name="residence" class="form-control" placeholder="Résidence"  autocomplete="off"><br>
                      </div>
                      <div class="col-md-4">
                        <input type="phone" id="telephone" name="telephone" class="form-control" placeholder="N° Téléphone"  autocomplete="off"><br>
                      </div>
                      <div class="col-md-4">
                        <input type="number" id="nbEnfants" name="nbEnfants" class="form-control" placeholder="Nombre d'enfants"  autocomplete="off"><br>
                      </div>
                      <div class="col-md-4">
                        <input type="text" id="login" name="login" class="form-control" placeholder="Login Bénéficaire"  autocomplete="off"><br>
                      </div>
                      <div class="col-md-4">
                        <input type="text" id="password" name="password" class="form-control" placeholder="Mot de passe bénéficiaire"  autocomplete="off"><br>
                      </div>
                      <div class="col-md-4">
                        <label for="dateNaissance">Date Naissance</label>
                        <input type="date" id="dateNaissance" name="dateNaissance" class="form-control " placeholder="Date de naissance"  autocomplete="off"><br>                        
                      </div>
                      <div class="col-md-4">
                        <button type="submit" name="add_beneficiaire" id="add_beneficiaire" class="btn btn-sm btn-success "><i class="fa fa-check-circle"></i> Enregistrer </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <hr>
          </div>
          <div class="col-md-12">
            <!-- Affichage des données de la base de donnée -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
                Liste des bénéficiaires <div class="float-right">     
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nom </th>
                      <th>Postnom</th>
                      <th>Sexe</th>
                      <th>Date Naissance</th>
                      <th>Résidence</th>
                      <th>Téléphone</th>
                      <th>Nbre Enfants</th>
                      <th>Login</th>
                      <th>Password</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  
                  <tbody id="data_list">
                    
                  </tbody>
                </table>            
              </div>
            </div>  
            
          </div>
        </div>

        <!-- fenetre modal d'affichage donnée user -->
        <div class="modal fade " id="editForm" tabindex="-1" role="dialog" aria-labelledby="Modregister" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content panel-danger">
              <div class="modal-header">
                <h4 class="modal-title" id="AddSectionLabel">Info Bénéficiaire</h4>
                <button type="button" class="close btn " data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <form action="delete_agent.php" method="post" was-validate>
                  <div class="form-group">
                  </div>
                  <div class="row " id="ed_data" >
                    
                  </div><br>

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-secondary btn-block" data-dismiss="modal" name="btn">Annuler </button>
                  <button type="submit" class="btn btn-primary btn-block" id="update" name="update"> Modifier </button>
                </div>
              </form>
              
            </div>
          </div>
        </div>
        <!-- /.modal-content -->

      <!-- Sticky Footer -->
      <?php include('include/footer.php'); ?>

      <script>
        
        //Fonction pour afficher les bénéficiaires
        function getBeneficiaires(){

          let showAllBeneficaires = "showAllBeneficaires";

          $.ajax({
            url : "actions_beneficiaires.php",
            type : "post",
            data:{showAllBeneficaires:showAllBeneficaires},
            success : function(data){
              $("#data_list").html(data);
            }
          });
        }

        //Appel fonction qui affiche les bénéfiaires de la base de données 
        getBeneficiaires();

        //Enregistrement des données de la table bénéficaire
        $(document).on("click","#add_beneficiaire", function(e){
          e.preventDefault();

          let nom = $("#nom").val();
          let postnom = $("#postnom").val();
          let sexe = $("#sexe").val();
          let residence = $("#residence").val();
          let telephone = $("#telephone").val();
          let nbEnfants = $("#nbEnfants").val();
          let login = $("#login").val();
          let password = $("#password").val();
          let dateNaissance = $("#dateNaissance").val();

          let add_beneficiaire = $("#add_beneficiaire").val();
        
          $.ajax({
            url: 'actions_beneficiaires.php',
            type: 'post',
            data: {
              nom:nom,
              postnom:postnom,
              sexe:sexe,
              residence:residence,
              telephone:telephone,
              nbEnfants:nbEnfants,
              login:login,
              password:password,
              dateNaissance:dateNaissance,
              add_beneficiaire:add_beneficiaire,
            },
            success: function(response){
              getBeneficiaires();
              $("#result").html(response);
              $("#form")[0].reset();
            },
          });     
        });

        //Affichage fenetre modale du bénéficiaire
        $(document).on("click","#editBtn", function(e){
          e.preventDefault();

          $("#editForm").modal("show");

          let id = $(this).attr("value");

          $.ajax({
            url : "actions_beneficiaires.php",
            type : "post",
            data : {
              id : id
            },
            success : function(data){
              $("#ed_data").html(data);
            }

          });

        });

         //Modification du bénéficiaire
        $(document).on("click","#update", function(e){
          e.preventDefault();

          let idM = $("#idM").val();
          let nomM = $("#nomM").val();
          let postnomM = $("#postnomM").val();
          let sexeM = $("#sexeM").val();
          let residenceM = $("#residenceM").val();
          let telephoneM = $("#telephoneM").val();
          let nbEnfantsM = $("#nbEnfantsM").val();
          let loginM = $("#loginM").val();
          let passwordM = $("#passwordM").val();
          let dateNaissanceM = $("#dateNaissanceM").val();

          let editBeneficiaire = "editBeneficiaire";
           
          $.ajax({
            url:'actions_beneficiaires.php',
            type : "post",
            data : {idM:idM,nomM:nomM,postnomM:postnomM,sexeM:sexeM,residenceM:residenceM,telephoneM:telephoneM,nbEnfantsM:nbEnfantsM,loginM:loginM,passwordM:passwordM,dateNaissanceM:dateNaissanceM,editBeneficiaire:editBeneficiaire},
            success : function(data){
              $("#editForm").modal("hide");
                getBeneficiaires();
                $("#result").html(data);
            }
          });
        });

         //Suppression de la catégorie
         $(document).on("click","#deleteBtn", function(e){
          e.preventDefault();

          if(window.confirm("Voulez-vous supprimer cet utilisateur ?")){

            let idS = $(this).attr("value");
            let supprimBeneficiaire = "supprimBeneficiaire";

            $.ajax({
              url:'actions_beneficiaires.php',
              type:'post',
              data:{
                idS:idS,
                supprimBeneficiaire:supprimBeneficiaire
              },
              success : function(data){
                getBeneficiaires();
                $("#result").html(data);
              }
            });

          }
         });
      </script>

<!-- bootstrap-wysiwyg -->
  <script src="js/jquery.hotkeys.js"></script>
  <script src="js/bootstrap-wysiwyg.js"></script>
  <script src="js/bootstrap-wysiwyg-custom.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/daterangepicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>
