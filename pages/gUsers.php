<?php 
  $title = 'Gestion Utilisateurs';
  require_once('include/headerAdmin.php'); 

 ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('include/sidebarAdmin.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="admin">Tableau de Bord</a>
          </li>
          <li class="breadcrumb-item active">Ajouter un utlisteur</li>
        </ol>
        <div class="row">
          <div class="col-md-4">
            <form action="" id="form" method="POST" enctype="multipart/form-data">
       
        <!-- DataTables Example -->
            <div class="card ">
              <div class="card-header text-uppercase">Ajouter un utilisateur</div>
                <div class="card-body">
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-12">
                      <!-- Affichage de la notification -->
                      <div id="result">
                        
                      </div>
                      </div>
              
                      <div class="col-md-12">
                        <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom Utilisteur"  autocomplete="off"><br>
                        <select class="form-control" id="type" required>
                          <option value="" selected disabled>---Catégorie---</option>
                          <option value="admin" >ADMINISTRATEUR</option>
                          <option value="secretaire" >SECRETAIRE</option>
                        </select><br>
                        <input type="text" id="login" name="login" class="form-control" placeholder="Login Utilisteur"  autocomplete="off"><br>
                        <input type="text" id="password" name="password" class="form-control" placeholder="Mot de passe utilisteur"  autocomplete="off"><br>
                      </div>
                      <div class="col-md-12">
                        <button type="submit" name="add_user" id="add_user" class="btn btn-sm btn-success "><i class="fa fa-check-circle"></i> Enregistrer </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <!-- Affichage des données de la base de donnée -->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
                Liste des utilisteurs <div class="float-right">     
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Nom Utilisteur</th>
                      <th>Catégorie</th>
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
        <div class="modal fade" id="editForm" tabindex="-1" role="dialog" aria-labelledby="Modregister" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content panel-danger">
              <div class="modal-header">
                <h4 class="modal-title" id="AddSectionLabel">Info utilsateur</h4>
                <button type="button" class="close btn " data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <form action="delete_agent.php" method="post" was-validate>
                  <div class="form-group">
                  </div>
                  <div class="form-group " id="ed_data" >
                    
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
        
        //Fonction pour afficher les catégories
        function getUsers(){

          let showAllUsers = "showAllUsers";

          $.ajax({
            url : "actions_users.php",
            type : "post",
            data:{showAllUsers:showAllUsers},
            success : function(data){
              $("#data_list").html(data);
            }
          });
        }

        //Appel fonction qui affiche les écoles de la base de données 
        getUsers();

        //Enregistrement des données de la table catégorie
        $(document).on("click","#add_user", function(e){
          e.preventDefault();

          let nom = $("#nom").val();
          let type = $("#type").val();
          let login = $("#login").val();
          let password = $("#password").val();

          let add_user = $("#add_user").val();
        
          $.ajax({
            url: 'actions_users.php',
            type: 'post',
            data: {
              nom:nom,
              type:type,
              login:login,
              password:password,
              add_user:add_user,
            },
            success: function(response){
              getUsers();
              $("#result").html(response);
              $("#form")[0].reset();
            },
          });     
        });

        //Affichage fenetre modale de la catégorie
        $(document).on("click","#editBtn", function(e){
          e.preventDefault();

          $("#editForm").modal("show");

          let id = $(this).attr("value");

          $.ajax({
            url : "actions_users.php",
            type : "post",
            data : {
              id : id
            },
            success : function(data){
              $("#ed_data").html(data);
            }

          });

        });

         //Modification de la catégorie
        $(document).on("click","#update", function(e){
          e.preventDefault();

          let idM = $("#idM").val();
          let nomM = $("#nomM").val();
          let loginM = $("#loginM").val();
          let passwordM = $("#passwordM").val();
          let typeM = $("#typeM").val();

          let editUser = "editUser";
           
          $.ajax({
            url:'actions_users.php',
            type : "post",
            data : {idM:idM,nomM:nomM,loginM:loginM,passwordM:passwordM,typeM:typeM,editUser:editUser},
            success : function(data){
              $("#editForm").modal("hide");
                getUsers();
                $("#result").html(data);
            }
          });
        });

         //Suppression de la catégorie
         $(document).on("click","#deleteBtn", function(e){
          e.preventDefault();

          if(window.confirm("Voulez-vous supprimer cet utilisateur ?")){

            let idS = $(this).attr("value");
            let supprimUser = "supprimUser";

            $.ajax({
              url:'actions_users.php',
              type:'post',
              data:{
                idS:idS,
                supprimUser:supprimUser
              },
              success : function(data){
                getUsers();
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
