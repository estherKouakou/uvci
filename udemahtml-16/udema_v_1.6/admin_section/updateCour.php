<?php
 require_once('@function/database.php');


 if(!empty($_GET['id'])) 
 {
     $id = checkInput($_GET['id']);
 }


 $Error = $fileError = $title = $file = $eval = "";

 if(!empty($_POST)){
	 $title = checkInput($_POST['title']);
     $eval = checkInput($_POST['eval']);
	 $file = checkInput($_FILES['file']['name']);
	 $filePath = 'img/' . basename($file);
	 $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
	 
	 $isSuccess = true;

		if (empty($title)){
			$Error = 'Ce champ ne peut pas être vide';
			$isSuccess = false;
		}
		if (empty($file)){
			$isImageUpdated = false;
		}
		if (empty($eval)){
			$Error = 'Ce champ ne peut pas être vide';
			$isSuccess = false;
		}
	 
	 	else{ 

            $isImageUpdated = true;
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

	 if(($isSuccess && $isUploadSuccess) || ($isSuccess && !$isImageUpdated))
	 {
         $db = Database::connect();
         

         if($isImageUpdated)
         {
             $statement = $db->prepare("UPDATE lecon  set name = ?, ressource = ?, eval = ? WHERE id = ?");
             $statement->execute(array($name,$file,$eval));
         }
         else
         {
            $statement = $db->prepare("UPDATE lecon  set name = ?,  eval = ? WHERE id = ?");
            $statement->execute(array($name,$eval));
         }

		//  $statement = $db->prepare("INSERT INTO lecon (name,ressource,eval) values(?, ?, ?)");
		//  $statement->execute(array($title,$file,$eval));
		 Database::disconnect();
		 header("Location: reviews.php");
     }
     
     else if($isImageUpdated && !$isUploadSuccess)
     {
         $db = Database::connect();
         $statement = $db->prepare("SELECT  * FROM lecon where id = ?");
         $statement->execute(array($id));
         $item = $statement->fetch();
         $file = $item['file'];
         Database::disconnect();
        
     }
	  
 }


 else 
    {
        $db = Database::connect();
        $statement = $db->prepare("SELECT * FROM lecon where id = ?");
        $statement->execute(array($id));
        $item = $statement->fetch();
        $name = $item['name'];
        $file = $item['file'];
        $eval = $item['eval'];
       
        Database::disconnect();
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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ansonika">
  <title>UDEMA - Admin dashboard</title>
	
  <!-- Favicons-->
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

  <!-- GOOGLE WEB FONT -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
	
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Main styles -->
  <link href="css/admin.css" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link href="vendor/dropzone.css" rel="stylesheet">
  <link href="css/date_picker.css" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="css/custom.css" rel="stylesheet">
	
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
						<label for="title">Titre Lecon</label>
						<input type="text" class="form-control" placeholder="Course title" name='title' id='title' value="<?php echo $title;?>">
						<span class="help-inline"><?php echo $Error;?></span>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
                        
						<label for="file">Ressource</label>
						<input type="file" class="form-control" name='file' id='file'>
						<span class="help-inline"><?php echo $fileError;?></span>
					</div>
                </div>
                <div class="col-md-2">
					<div class="form-group">
                        <label for="image">Image:</label>
                        <p><?php echo $file;?></p>
						
					</div>
				</div>
				
			</div>

			<div class="row">
			<div class="col-md-12">
					<div class="form-group">
						<label for="eval">Evaluation</label>
                        <textarea rows="5" class="form-control" style="height:100px;" placeholder="Description" name='eval' id='eval' value="<?php echo $eval?>"></textarea>
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
