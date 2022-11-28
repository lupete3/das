<?php 
  require_once ('../model/connex.php'); 

  $dt = date('Y-m-d');

  $req1 = $bd->prepare("SELECT COUNT(*) AS nbBenef FROM beneficiaire ");
  $req1->execute();
  $res1 = $req1->fetch();

  $req2 = $bd->prepare("SELECT COUNT(*) AS nbDemandes FROM demande ");
  $req2->execute();
  $res2 = $req2->fetch();

  $req3 = $bd->prepare("SELECT COUNT(*) AS nbUsers FROM users ");
  $req3->execute();
  $res3 = $req3->fetch();

  $req4 = $bd->prepare("SELECT COUNT(*) AS nbUsers FROM users ");
  $req4->execute();
  $res4 = $req4->fetch();

  $req5 = $bd->prepare("SELECT COUNT(*) AS nbUsers FROM users ");
  $req5->execute();
  $res5 = $req5->fetch();

  $req6 = $bd->prepare("SELECT COUNT(*) AS nbUsers FROM users ");
  $req6->execute();
  $res6 = $req6->fetch();

  $req7 = $bd->prepare("SELECT COUNT(*) AS nbUsers FROM users ");
  $req7->execute();
  $res7 = $req7->fetch();

    $title = 'Espace Secretaire';

    require_once('include/headerSec.php'); 

?>

  <div id="wrapper">

    <!-- Sidebar -->

    <?php include('include/sidebarSec.php'); ?>
    
    <div id="content-wrapper">

      <div class="container-fluid">
        <p style="font-size: 35px">Bonjour <?php echo $username;?> !</hp>
        <!-- Breadcrumbs-->
        
        <hr>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-md-3 spacer" >
            <div class="card border-info o-hidden h-100">
              <div class="card-body text-info" style="margin-bottom: -30px;">
                <div class="float-left">
                  <i class="fa fa-book" style="font-size: 55px;"></i>
                </div>
                <div class="float-right">
                  <h3 style="font-size: 35px;"><?php echo $res2['nbDemandes'] ?></h3>
                <p class="float-right" style="font-weight: bold;"> Demandes </p>
                </div>
              </div>
              <a class="card-footer text-info clearfix small z-10" href="gDemandes">
                <h6 class="float-left">Voir</h6>
                <h6 class="float-right">
                  <i class="fas fa-angle-right"></i>
                </h6>
              </a>
            </div>
          </div><br>
          <div class="col-md-3 spacer" >
            <div class="card border-primary o-hidden h-100">
              <div class="card-body text-primary" style="margin-bottom: -30px;">
                <div class="float-left">
                  <i class="fa fa-users" style="font-size: 55px;"></i>
                </div>
                <div class="float-right">
                  <h3 style="font-size: 35px;"><?php echo $res1['nbBenef'] ?></h3>
                <p class="float-right" style="font-weight: bold;"> Bénéficiaires </p>
                </div>
              </div>
              <a class="card-footer text-primary clearfix small z-10" href="gBeneficiaires">
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
