<?php
 require_once('@function/database.php');
 $logoError = $Error = $name = $category = $code = $price = $type = $intitule = $time = $logo = $cible = $prerequis = $volume = $general = $specific = $competence = "";

 if(!empty($_POST)){
    $name = checkInput($_POST['name']);
    $category = checkInput($_POST['category']); 
    $code = checkInput($_POST['code']);
    $price = checkInput($_POST['price']);
    $type = checkInput($_POST['type']);
    $intitule = checkInput($_POST['intitule']);
    $time = checkInput($_POST['time']);
    $cible = checkInput($_POST['cible']);
    $prerequis = checkInput($_POST['prerequis']);
    $volume = checkInput($_POST['volume']);
    $general = checkInput($_POST['general']);
    $specific = checkInput($_POST['specific']);
    $competence = checkInput($_POST['competence']);

    $logo = checkInput($_FILES["logo"]["name"]);
    $logoPath = 'images/'. basename($logo);
    $logoExtension = pathinfo($logoPath,PATHINFO_EXTENSION);

    $isSuccess          = true;
    $isUploadSuccess    = false;
        
        if(empty($name)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(empty($category)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(empty($code)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 

        if(empty($price)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($type)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 


        if(empty($intitule)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($time)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($cible)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($prerequis)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($volume)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($general)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($specific)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 

        if(empty($competence)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 

        if(empty($logo)) 
        {
            $Error = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 



        else 
        {
            $isUploadSuccess = true;

            if($logoExtension != "jpg" && $logoExtension != "png" && $logoExtension != "jpeg") 
            {
                $logoError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($logoPath)) 
            {
                $logoError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000) 
            {
                $logoError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["logo"]["tmp_name"], $logoPath)) 
                {
                    $logoError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }

         
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO ecue (nom_ecue,id_ue,logo_ecue,ancien_prix,code_ecue,type_cours,intitule,duree,public_cible,prerequis,volume_horaire,objectif_general,objectif_specifique,competence_vise) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $statement->execute(array($name,$category,$logo,$price,$code,$type,$intitule,$time,$cible,$prerequis,$volume,$general,$specific,$competence));
            Database::disconnect();
            header("Location: viewECUE.php");
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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Ansonika">
  <title>UDEMA - Ajouter UE</title>
	
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
		<form role="form" action="addECUE.php" enctype="multipart/form-data" method="POST"> 
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
                <h2><i class="fa fa-plus"></i>Ajouter</h2>
               
                </div>
              <!-- </div> -->
              
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                      <label for="categorie">Choisir L'UE</label>
                        <select class="browser-default custom-select" id="category" name="category">
                        <?php
                           $db = Database::connect();
                           foreach ($db->query('SELECT id_ue,nom_ue FROM ue') as $row) 
                           {
                                echo '<option value="'. $row['id_ue'] .'">'. $row['nom_ue'] . '</option>';
                           }
                           Database::disconnect();
                        ?>
                        </select>
                      </div>
                  </div>
              </div>
  
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Nom</label>
                        <input type="text" class="form-control" placeholder="Course title" name='name' id='name'>
                        <span class="help-inline"><?php echo $Error;?></span>
					</div>
                </div>
                
				<div class="col-md-4">
					<div class="form-group">
						<label for="code">Code</label>
                        <input type="text" class="form-control" placeholder="Code UE" name="code" id="code">
                        <span class="help-inline"><?php echo $Error;?></span>
					</div>
                </div>
                <div class="col-md-4">
					<div class="form-group">
						<label for="price">Prix</label>
                        <input type="text" class="form-control" placeholder="Course title" name='price' id='price'>
                        <span class="help-inline"><?php echo $Error;?></span>
					</div>
                </div>
                
            </div>
           

            <div class="row">
            <div class="col-md-4">
					<div class="form-group">
						<label for="type">Type cour</label>
                        <input type="text" class="form-control" placeholder="Course title" name='type' id='type'>
                        <span class="help-inline"><?php echo $Error;?></span>
					</div>
                </div>
                <div class="col-md-4">
					<div class="form-group">
						<label for="intitule">Intitulé</label>
                        <input type="text" placeholder="Course title" class="form-control" name='intitule' id='intitule'>
                        <span class="help-inline"><?php echo $Error;?></span>
					</div>
                </div>
                <div class="col-md-4">
					<div class="form-group">
						<label for="time">Durée</label>
                        <input type="text" class="form-control" placeholder="Course title" name='time' id='time'>
                        <span class="help-inline"><?php echo $Error;?></span>
					</div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-12">
					<div class="form-group">
						<label for="logo">Logo</label>
                        <input type="file" class="form-control" name="logo" id="logo">
                        <span class="help-inline"><?php echo $logoError;?></span>
					</div>
                </div>
            </div>
            <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="cible">Public cible</label>
                        <textarea rows="5" class="form-control" style="height:100px;" placeholder="Description" name='cible' id='cible'></textarea>
                        <span class="help-inline"><?php echo $Error;?></span>
					</div>
                </div>
                
                <div class="col-md-6">
					<div class="form-group">
						<label for="prerequis">Prerequis</label>
                        <textarea rows="5" class="form-control" style="height:100px;" placeholder="Description" name='prerequis' id='prerequis'></textarea>
                        <span class="help-inline"><?php echo $Error;?></span>
					</div>
				</div>
            </div>
           
            <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="volume">Volume horaire</label>
                        <textarea rows="5" class="form-control" style="height:100px;" placeholder="volume" name='volume' id='volume'></textarea>
                        <span class="help-inline"><?php echo $Error;?></span>
					</div>
                </div>
                
                <div class="col-md-6">
					<div class="form-group">
						<label for="general">Objectifs générale</label>
                        <textarea rows="5" class="form-control" style="height:100px;" placeholder="general" name='general' id='general'></textarea>
                        <span class="help-inline"><?php echo $Error;?></span>
					</div>
				</div>
            </div>
            
            <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="specific">Objectifs spécifiques</label>
                        <textarea rows="5" class="form-control" style="height:100px;" placeholder="Description" name='specific' id='specific'></textarea>
                        <span class="help-inline"><?php echo $Error;?></span>
					</div>
                </div>
                
                <div class="col-md-6">
					<div class="form-group">
						<label for="competence">Compétences</label>
                        <textarea rows="5" class="form-control" style="height:100px;" placeholder="Description" name='competence' id='competence'></textarea>
                        <span class="help-inline"><?php echo $Error;?></span>
					</div>
				</div>
            </div>
		<button type="submit" class="btn btn-primary">Ajouter</button>
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
