

<?php
	
  require_once('@function/database.php');
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
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index_1.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Messages</li>
      </ol>
		<div class="box_general">
      <div class="header_box">
				<h4 class="d-inline-block">ECUE ajoutées</h4>
				<div class="filter">
          <p><a href="addECUE.php" class="btn_1 medium">Ajouter</a></p>
				</div>
			</div>
			<div class="list_general">
        <table class="table table-striped">
          <thead>
            <tr>
              
              <th scope="col">Nom</th>
              <th scope="col">Code</th>
              <th scope="col">type du cour</th>
              <th scope="col">Durée</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
               $db = Database::connect();
               $statement = $db->query('SELECT ecue.id_ecue, ecue.nom_ecue, ecue.logo_ecue, ecue.ancien_prix, ecue.code_ecue, ecue.type_cours, ecue.intitule, ecue.duree, ecue.public_cible, ecue.prerequis,ecue.volume_horaire, ecue.objectif_general, ecue.objectif_specifique, ecue.competence_vise, ue.nom_ue AS category FROM ecue LEFT JOIN ue ON ecue.category = ue.id ORDER BY ecue.id DESC');

               


               while($item = $statement->fetch()) {
                 echo '<tr>';
                 echo '<td>'. $item['nom_ecue'] . '</td>';
                 echo '<td>'. $item['code_ecue'] . '</td>';
                 echo '<td>'. $item['type_cours'] . '</td>';
                 echo '<td>'. $item['duree'] . '</td>';
                 
                 echo '<td width=300>';
                 echo '<a class="btn btn-secondary" href="ECUE.php?id='.$item['id'].'"><span class="glyphicon glyphicon-eye-open"></span> Voir</a>';
                 echo ' ';
                 echo '<a class="btn btn-info" href="updateECUE.php?id='.$item['id'].'"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                 echo ' ';
                 echo '<a class="btn btn-danger" href="delateECUE.php?id='.$item['id'].'"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                 echo '</td>';
                 echo '</tr>';
               }
               Database::disconnect();
            ?>
          
          </tbody>
        </table>
			</div>
		</div>
		<!-- /box_general-->
		<nav aria-label="...">
			<ul class="pagination pagination-sm add_bottom_30">
				<li class="page-item disabled">
					<a class="page-link" href="#" tabindex="-1">Previous</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
					<a class="page-link" href="#">Next</a>
				</li>
			</ul>
		</nav>
		<!-- /pagination-->
	  </div>
	  <!-- /container-fluid-->
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
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
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
