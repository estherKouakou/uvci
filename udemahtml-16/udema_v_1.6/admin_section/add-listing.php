<?php
 require_once('@function/database.php');


 $Error = $fileError = $title = $file = $eval = $category = $category_ecue = "";

 if(!empty($_POST)){
	 $title = checkInput($_POST['title']);
   $eval = checkInput($_POST['eval']);
   $category = checkInput($_POST['category']);
	 $category_ecue = checkInput($_POST['category_ecue']);
	 $file = checkInput($_FILES['file']['name']);
	 $filePath = 'img/' . basename($file);
	 $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
	 
	 $isSuccess = true;
	 $isUploadSuccess = false;


		if (empty($title)){
			$Error = 'Ce champ ne peut pas être vide';
			$isSuccess = false;
		}
		if (empty($file)){
			$fileError = 'Ce champ ne peut pas être vide';
			$isSuccess = false;
		}
		if (empty($eval)){
			$Error = 'Ce champ ne peut pas être vide';
			$isSuccess = false;
    }
    
		if (empty($category_ecue)){
			$Error = 'Ce champ ne peut pas être vide';
			$isSuccess = false;
		}
	 
	 	else{ 
			$isUploadSuccess = true;

            if($fileExtension != "pdf" && $fileExtension != "mp3" && $fileExtension != "mp4") 
            {
                $fileError = "Les fichiers autorises sont: .pdf, .mp3, .mp4";
                $isUploadSuccess = false;
            }
            if(file_exists($filePath)) 
            {
                $fileError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000) 
            {
                $fileError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["logo"]["tmp_name"], $filePath)) 
                {
                    $fileError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
	 }

	 if($isSuccess && $isUploadSuccess) 
	 {
		 $db = Database::connect();
		 $statement = $db->prepare("INSERT INTO lecon (name,ressource,eval,id_ecue) values(?, ?, ?, ?)");
		 $statement->execute(array($title,$file,$eval,$category_ecue));
		 Database::disconnect();
		 header("Location: reviews.php");
	 }
	  
 }



 function checkInput($data){
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
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <?php include_once('include/nav.php') ?>
    <?php include_once('include/sidebar.php') ?>
   
  </nav>

  <!-- /Navigation-->
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      	<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="#">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Ajouter un cour</li>
		</ol>
		<form role="form" action="add-listing.php" method="POST" enctype="multipart/form-data"> 
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Basic info</h2>
      		</div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="categorie">Choisir L'ECUE</label>
            <select class="browser-default custom-select" id="category_ecue" name="category_ecue">
              <?php
                  $db = Database::connect();
                  foreach ($db->query('SELECT id_ecue,nom_ecue FROM ecue') as $row) 
                  {
                      echo '<option value="'. $row['id_ecue'] .'">'. $row['nom_ecue'] . '</option>';
                  }
                  Database::disconnect();
              ?>
            </select>
            <span class="help-inline"><?php echo $Error;?></span>
          </div>
        </div>

      </div>
 
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="title">Titre Lecon</label>
						<input type="text" class="form-control" placeholder="Course title" name='title' id='title'>
						<span class="help-inline"><?php echo $Error;?></span>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="file">Ressource</label>
						<input type="file" class="form-control" name='file' id='file'>
						<span class="help-inline"><?php echo $fileError;?></span>
					</div>
				</div>
				
			</div>

			<div class="row">
			<div class="col-md-12">
					<div class="form-group">
						<label for="eval">Evaluation</label>
                        <textarea rows="5" class="form-control" style="height:100px;" placeholder="Description" name='eval' id='eval'></textarea>
                        <span class="help-inline"><?php echo $Error;?></span>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Ajouter</button>
		</div>
		
		</div>
			
    </div>
			<!-- /row-->
	</div>

</form> 

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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<script src="vendor/jquery.selectbox-0.2.js"></script>
	<script src="vendor/retina-replace.min.js"></script>
	<script src="vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/admin.js"></script>
	<!-- Custom scripts for this page-->
	<script src="vendor/dropzone.min.js"></script>
	<script src="vendor/bootstrap-datepicker.js"></script>
	<script>$('input.date-pick').datepicker();</script>
	
</body>
</html>
