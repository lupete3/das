<?php 
  $title = 'Gestion Demandes';
  require_once('include/headerBen.php'); 

  $model = new Model;

 ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include('include/sidebarBen.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="benef">Tableau de Bord</a>
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
                        <input type="hidden" id="beneficiaire" value="<?php echo $id?>" name="beneficiaire" class="" placeholder="Motif de la demande"  autocomplete="off">
                      </div>
              
                      <div class="col-md-12">
                        <input type="text" id="motif" name="motif" class="form-control" placeholder="Motif de la demande"  autocomplete="off"><br>
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
                Liste des vos demandes <div class="float-right">     
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

      <!-- Sticky Footer -->
      <?php include('include/footer.php'); ?>

      <script>
        
        //Fonction pour afficher les bénéficiaires
        function getDemandes(){

          let idDem = <?php echo $id ?>

          let showAllDemandesBen = "showAllDemandesBen";

          $.ajax({
            url : "actions_demandes.php",
            type : "post",
            data:{idDem:idDem,showAllDemandesBen:showAllDemandesBen},
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

          let etat = 0;

          let add_demande = $("#add_demande").val();


          fd.append('fichier',fichier[0]);
          fd.append('motif',motif);
          fd.append('beneficiaire',beneficiaire);
          fd.append('categorie',categorie);
          fd.append('add_demande',add_demande);
          fd.append('etat',etat);
        
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

         //Supprimer la demande du bénéficiaire 
         $(document).on("click","#deleteBtn", function(e){
          e.preventDefault();

          if(window.confirm("Voulez-vous supprimer cette demande ?")){

          let idS = $(this).attr("value");

          let deleteDemande = "deleteDemande";
           
          $.ajax({
            url:'actions_demandes.php',
            type : "post",
            data : {idS:idS,deleteDemande:deleteDemande},
            success : function(data){
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
