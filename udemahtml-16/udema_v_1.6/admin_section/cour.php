

<?php
  require_once('@function/database.php');

  
  if(!empty($_GET['id'])) 
  {
      $id = checkInput($_GET['id']);
  }
   
  $db = Database::connect();
  $statement = $db->prepare("SELECT lecon.id_lecon, lecon.name, ecue.nom_ecue AS categorie_ecue FROM lecon LEFT JOIN ecue ON lecon.categorie_ecue = ecue.id WHERE lecon.id = ?");
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
          
        </li>
        <li class="d-flex justify-content-center pl-4">
          <div>
            <h6 class="font-weight-bold mb-3">Catégorie ECUE</h6>
            <p class="text-muted mb-0">
                <?php echo '  '.$item['ancien_prix'];?>
            </p>
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

<a href="reviews.php"><button type="button" class="btn btn-danger">Retour</button></a>
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
