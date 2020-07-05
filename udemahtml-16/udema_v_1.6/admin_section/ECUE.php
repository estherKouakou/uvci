

<?php
  require_once('@function/database.php');

  
  if(!empty($_GET['id'])) 
  {
      $id = checkInput($_GET['id']);
  }
   
  $db = Database::connect();
  $statement = $db->prepare("SELECT ecue.id_ecue, ecue.nom_ecue, ecue.logo_ecue, ecue.ancien_prix, ecue.code_ecue, ecue.type_cours, ecue.intitule, ecue.duree, ecue.public_cible, ecue.prerequis,ecue.volume_horaire, ecue.objectif_general, ecue.objectif_specifique, ecue.competence_vise, ue.nom_ue AS category FROM ecue LEFT JOIN ue ON ecue.category = ue.id WHERE ecue.id = ?");
  $statement->execute(array($id));

  $item = $statement->fetch();
  Database::disconnect();

  function checkInput($data) 
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  
  <title>UDEMA - Admin dashboard</title>
  <?php include_once('include/head.php') ?>
	
</head>

<body class="fixed-nav sticky-footer" id="page-top">


  <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <?php include_once('include/nav.php') ?>
    <?php include_once('include/sidebar.php') ?>
   
  </nav>

 

  <div class="content-wrapper">
    <div class="container-fluid">
     
	 
		<h2></h2>
		<div class="box_general padding_bottom">
        <div class="container my-5">


<!-- Section: Block Content -->
<section class="dark-grey-text">

  <h3 class="text-center font-weight-bold mb-4 pb-2"><?php echo '  '.$item['nom_ecue'];?></h3>
  <h5 class="text-center font-weight-bold mb-4 pb-2"><?php echo '  '.$item['category'];?></h5>
  
  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-lg-5 mb-lg-0 mb-5">

      <img src="https://mdbootstrap.com/img/Photos/Others/images/83.jpg" class="img-fluid rounded z-depth-1" alt="Sample project image">

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7">

      <ul class="list-unstyled fa-ul mb-0">
        <li class="d-flex justify-content-center pl-4">
          <!-- <div>
            <h6 class="font-weight-bold mb-3">Nom</h6>
            <p class="text-muted"></p>
          </div> -->
        </li>
        <li class="d-flex justify-content-center pl-4">
          
          <div>
            <h6 class="font-weight-bold mb-3">Code</h6>
            <p class="text-muted">
                <?php echo '  '.$item['code_ecue'];?>
            </p>
          </div>
        </li>
        <li class="d-flex justify-content-center pl-4">
          <div>
            <h6 class="font-weight-bold mb-3">Prix</h6>
            <p class="text-muted mb-0">
                <?php echo '  '.$item['ancien_prix'];?>
            </p>
          </div>
        </li>
        <li class="d-flex justify-content-center pl-4">
          <div>
            <h6 class="font-weight-bold mb-3">Type cour</h6>
            <p class="text-muted">
                <?php echo '  '.$item['type_cours'];?>
            </p>
          </div>
        </li>
        <li class="d-flex justify-content-center pl-4">
          
          <div>
            <h6 class="font-weight-bold mb-3">Intitulé</h6>
            <p class="text-muted"><?php echo '  '.$item['intitule'];?></p>
          </div>
        </li>
        <li class="d-flex justify-content-center pl-4">
          <span class="fa-li"><i class="far fa-money-bill-alt fa-2x deep-purple-text"></i></span>
          <div>
            <h6 class="font-weight-bold mb-3">Durée</h6>
            <p class="text-muted mb-0"><?php echo '  '.$item['duree'];?></p>
          </div>
        </li>
        <li class="d-flex justify-content-center pl-4">
          <div>
            <h6 class="font-weight-bold mb-3">Public cible</h6>
            <p class="text-muted"><?php echo '  '.$item['public_cible'];?></p>
          </div>
        </li>
        <li class="d-flex justify-content-center pl-4">
          
          <div>
            <h6 class="font-weight-bold mb-3">Prerequis</h6>
            <p class="text-muted"><?php echo '  '.$item['prerequis'];?></p>
          </div>
        </li>
        <li class="d-flex justify-content-center pl-4">
          <div>
            <h6 class="font-weight-bold mb-3">Volume Horaire</h6>
            <p class="text-muted mb-0"><?php echo '  '.$item['volume_horaire'];?></p>
          </div>
        </li>
        <li class="d-flex justify-content-center pl-4">
          <div>
            <h6 class="font-weight-bold mb-3">Objectif general</h6>
            <p class="text-muted"><?php echo '  '.$item['objectif_general'];?></p>
          </div>
        </li>
        <li class="d-flex justify-content-center pl-4">
          
          <div>
            <h6 class="font-weight-bold mb-3">Objectif spécifique</h6>
            <p class="text-muted"><?php echo '  '.$item['objectif_specifique'];?></p>
          </div>
        </li>
        <li class="d-flex justify-content-center pl-4">
          <div>
            <h6 class="font-weight-bold mb-3">Compétences</h6>
            <p class="text-muted mb-0"><?php echo '  '.$item['competence_vise'];?></p>
          </div>
        </li>
      </ul>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

  <hr class="my-5">

</section>
<!-- Section: Block Content -->


</div>
		</div>
	  </div>
	  <!-- /.container-fluid-->
   	</div>
    <!-- /.container-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © UDEMA 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<script src="vendor/jquery.selectbox-0.2.js"></script>
	<script src="vendor/retina-replace.min.js"></script>
	<script src="vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/admin.js"></script>
	<!-- Custom scripts for this page-->
    <script src="js/admin-charts.js"></script>
	
</body>
</html>
