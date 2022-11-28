<?php 
  require_once ('../model/connex.php'); 

  $dt = date('Y-m-d');

  $title = 'Espace Bénéficiaire';

  require_once('include/headerBen.php'); 

  $req1 = $bd->prepare("SELECT COUNT(*) AS nbDemandes FROM demande WHERE id_beneficiaire = ? ");
  $req1->execute(array($id));
  $res1 = $req1->fetch();

    

?>

  <div id="wrapper">

    <!-- Sidebar -->

    <?php include('include/sidebarBen.php'); ?>
    
    <div id="content-wrapper">

      <div class="container-fluid">
        <p style="font-size: 35px">Bonjour <?php echo $username;?> !</hp>
        <!-- Breadcrumbs-->
        
        <hr>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-md-6 spacer" >
            <div class="card border-info o-hidden h-100">
              <div class="card-body text-info" style="margin-bottom: -30px;">
                <div class="float-left">
                  <i class="fa fa-book" style="font-size: 55px;"></i>
                </div>
                <div class="float-right">
                  <h3 style="font-size: 35px;"><?php echo $res1['nbDemandes'] ?></h3>
                <p class="float-right" style="font-weight: bold;"> Demandes </p>
                </div>
              </div>
              <a class="card-footer text-info clearfix small z-10" href="gDemandesCli">
                <h6 class="float-left">Voir</h6>
                <h6 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h6>
              </a>
            </div>
          </div><br>
        </div>
        

      </div>
      <br>
      <!-- /.container-fluid -->

            <!-- Sticky Footer -->
      <?php include('include/footer.php'); ?>
