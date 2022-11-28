<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>New Technology Center</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link href="pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="pages/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="pages/css/sb-admin.css" rel="stylesheet">
<link rel="stylesheet" href="pages/vendor/editor/css/jquery-te-1.4.0.css">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		<div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <!-- Sections -->
        

        

        <!--Home page style-->
        
        <div class="container">
            <div class="row">
                <div class="col-md-3">
            
        </div>
        <div class="col-md-6"  style="margin-top: 100px;">
            <center class="">
                
            <div class="card ">
              <div class="card-header text-uppercase">CONNEXION</div>
              <form action="model/connect_users.php" method="POST" class="">
                <div class="card-body">
                  <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-12 text-center">
                      <!-- Affichage de la notification -->
                          <?php 
                            if(isset($_GET['err'])){ ?>
                                <div class=" text-center">
                                    <p style="font-size: 22px;" class="text-danger"><?php echo $_GET['err'] ?></p>
                                </div>
                            <?php } ?>
                      </div>
                      <div class="col-md-12">
                        
                        <input type="text" id="login" name="login" class="form-control" placeholder="Login"  autocomplete="off"><br>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password"  autocomplete="off"><br>
                      </div>
                      <div class="col-md-12">
                        <button type="submit" name="log_in" id="add_approv" class="btn btn-md btn-info "><i class="fa fa-lock"></i> Connexion </button>
                      </div>
                      <div class="col-md-12">
                          <br>Vous êtes nouveu ?  <a href="beneficiaire" class="badge badge-success">Créez un compte </a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            </center>
        </div>
            </div>
        </div>
        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/modernizr.js"></script>
        <script src="assets/js/main.js"></script>
    </body>

	
</html>
