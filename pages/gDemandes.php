<?php 
  $title = 'Gestion Bénéficiaires';
  require_once('include/headerSec.php'); 

  $model = new Model;

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
          <li class="breadcrumb-item active">Ajouter une demande</li>
        </ol>
        <div class="row">
          <div class="col-md-12">
            <form action="" id="form" method="POST" enctype="multipart/form-data">
       
        <!-- DataTables Example -->
            <div class="card ">
              <div class="card-header text-uppercase">Ajouter une demande</div>
                <div class="card-body">
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-12">
                      <!-- Affichage de la notification -->
                      <div id="result">
                        
                      </div>
                      </div>
              
                      <div class="col-md-6">
                        <input type="text" id="motif" name="motif" class="form-control" placeholder="Motif de la demande"  autocomplete="off"><br>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control" id="beneficiaire" required>
                          <option value="" selected disabled>---Bénéficiaire---</option>
                          <?php 
                            $list_demandes = $model->getAllBeneficiaires();

                            if (!empty($list_demandes)) {

                              foreach ($list_demandes as $res) { ?>
                          ?>
                          <option value="<?php echo $res['id'] ?>" ><?php echo $res['nom'].' '.$res['postnom'] ?></option>
                          <?php  
                            } 
                          }else{
                            
                          }

                          ?>
                        </select><br>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control" id="categorie" required>
                          <option value="" selected disabled>---Catégorie Bénéficiaire---</option>
                          <option value="Sinistré" >Sinistré</option>
                          <option value="Orphelin" >Orphelin</option>
                          <option value="Veuve" >Veuve</option>
                          <option value="Nauffragé" >Nauffragé</option>
                          <option value="Enfant de rue" >Enfant de rue</option>
                          
                        </select><br>
                      </div>
                      <div class="col-md-6">
                        <input type="file" id="fichier" name="fichier" class="form-control" placeholder="Pièce jointe"  autocomplete="off"><br>
                      </div>
                      <div class="col-md-4">
                        <button type="submit" name="add_demande" id="add_demande" class="btn btn-sm btn-success "><i class="fa fa-check-circle"></i> Enregistrer </button>
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
                      <th>Date Demande </th>
                      <th>Motif de la demande</th>
                      <th>Catégorie Bénéficiaire</th>
                      <th>Nom Bénéficiaire</th>
                      <th>Pièce jointe </th>
                      <th>Reponse donné</th>
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
          <div class="modal-dialog ">
            <div class="modal-content panel-danger">
              <div class="modal-header">
                <h4 class="modal-title" id="AddSectionLabel">Réponse à la demande </h4>
                <button type="button" class="close btn " data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                <form action="" method="post" was-validate>
                  <div class="form-group">
                  </div>
                  <div class="form-group ">
                    <input type="hidden" name="idM" value="" id="idM" class="form-control" placeholder="Id" required="required" >
                  </div>
                  <div class="form-group ">
                    <label for="reponse">Reponse à la demande </label>
                    <textarea required class="form-control" rows="5" id="reponse"></textarea>
                  </div><br>

                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-secondary btn-block" data-dismiss="modal" name="btn">Annuler </button>
                  <button type="submit" class="btn btn-danger btn-block" id="update" name="update"> Reponde </button>
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
        function getDemandes(){

          let showAllDemandes = "showAllDemandes";

          $.ajax({
            url : "actions_demandes.php",
            type : "post",
            data:{showAllDemandes:showAllDemandes},
            success : function(data){
              $("#data_list").html(data);
            }
          });
        }

        //Appel fonction qui affiche les bénéfiaires de la base de données 
        getDemandes();

        //Enregistrement des données de la table bénéficaire
        $(document).on("click","#add_demande", function(e){
          e.preventDefault();

          let motif = $("#motif").val();
          let beneficiaire = $("#beneficiaire").val();
          let categorie = $("#categorie").val();

          let fd = new FormData();
          let fichier = $('#fichier')[0].files;

          let add_demande = $("#add_demande").val();


          fd.append('fichier',fichier[0]);
          fd.append('motif',motif);
          fd.append('beneficiaire',beneficiaire);
          fd.append('categorie',categorie);
          fd.append('add_demande',add_demande);
        
          $.ajax({
            url: 'actions_demandes.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
              $("#result").html(response);
              $("#form")[0].reset();
              getDemandes();
            },
          });   
 
        });

        //Affichage fenetre modale du bénéficiaire
        $(document).on("click","#deleteBtn", function(e){
          e.preventDefault();

          $("#editForm").modal("show");

          let id = $(this).attr("value");

          $("#idM").val(id);

          $.ajax({
            url : "actions_demandes.php",
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
            url:'actions_demandes.php',
            type : "post",
            data : {idM:idM,nomM:nomM,postnomM:postnomM,sexeM:sexeM,residenceM:residenceM,telephoneM:telephoneM,nbEnfantsM:nbEnfantsM,loginM:loginM,passwordM:passwordM,dateNaissanceM:dateNaissanceM,editBeneficiaire:editBeneficiaire},
            success : function(data){
              $("#editForm").modal("hide");
                getDemandes();
                $("#result").html(data);
            }
          });
        });

         //Accepter la demande du bénéficiaire 
         $(document).on("click","#editBtn", function(e){
          e.preventDefault();

          if(window.confirm("Voulez-vous valider cette demande ?")){

          let idM = $(this).attr("value");
          let reponse = $("#reponse").val();

          let reponseBeneficiaire = "reponseBeneficiaire";
          let etat = 1
           
          $.ajax({
            url:'actions_demandes.php',
            type : "post",
            data : {idM:idM,reponse:reponse,reponseBeneficiaire:reponseBeneficiaire,etat:etat},
            success : function(data){
              $("#editForm").modal("hide");
                getDemandes();
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
