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
  <link href="vendor/animate.min.css" rel="stylesheet">
  <link href="vendor/magnific-popup.css" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="css/custom.css" rel="stylesheet">
	
</head>

<body class="fixed-nav sticky-footer" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="index_1.php">
    <img src="img/logo.png" data-retina="true" alt="" width="163" height="36"/>
</a>
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
<a class="nav-link" href="index_1.php">
<i class="fa fa-fw fa-dashboard"></i>
<span class="nav-link-text">Dashboard</span>
</a>
</li>


<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
  <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
  <i class="fa fa-fw fa-plus-circle"></i>
    <span class="nav-link-text">Ajouter</span>
  </a>
  <ul class="sidenav-second-level collapse" id="collapseComponents">

      <li>
      <a href="messages.html">Ajouter UE</a>
    </li>
    <li>
      <a href="viewECUE.php">Ajouter ECUE</a>
    </li>
    <li>
      <a href="reviews.html">Ajouter Cour</a>
    </li>
  </ul>
</li>


<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookmarks">
  <a class="nav-link" href="tables.html">
    <i class="fa fa-fw fa-heart"></i>
    <span class="nav-link-text">Voir Classe</span>
  </a>
</li>


</ul>
<ul class="navbar-nav sidenav-toggler">
<li class="nav-item">
<a class="nav-link text-center" id="sidenavToggler">
<i class="fa fa-fw fa-angle-left"></i>
</a>
</li>
</ul>
<ul class="navbar-nav ml-auto">
<li class="nav-item dropdown">

<li class="nav-item">
<form class="form-inline my-2 my-lg-0 mr-lg-2">
<div class="input-group">
  <input class="form-control search-top" type="text" placeholder="Search for...">
  <span class="input-group-btn">
    <button class="btn btn-primary" type="button">
      <i class="fa fa-search"></i>
    </button>
  </span>
</div>
</form>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="modal" data-target="#exampleModal">
<i class="fa fa-fw fa-sign-out"></i>Logout</a>
</li>
</ul>
</div>
   </div>
</nav>

 

  <!-- /Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Reviews</li>
      </ol>
		<div class="box_general">
			<div class="header_box">
				<h2 class="d-inline-block">Cours ajoutés</h2>
				<div class="filter">
          <p><a href="add-listing.php" class="btn_1 medium">Ajouter</a></p>
				</div>
			</div>
			<div class="list_general reviews">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">UE</th>
              <th scope="col">ECUE</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>Mark</td>
             
              <td>
                <row>
                  
                  <button type="button" class="btn btn-secondary">Voir</button>
                  <button type="button" class="btn btn-info">Moddifier</button>
                  <button type="button" class="btn btn-danger">Suprimmer</button>
                
                </row>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>Mark</td>
              
              <td>
                <row>
                  <button type="button" class="btn btn-secondary">Voir</button>
                  <button type="button" class="btn btn-info">Moddifier</button>
                  <button type="button" class="btn btn-danger">Suprimmer</button>
                
                </row>
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>Mark</td>
              
              <td>
                <row>
                <button type="button" class="btn btn-secondary">Voir</button>
                  <button type="button" class="btn btn-info">Moddifier</button>
                  <button type="button" class="btn btn-danger">Suprimmer</button>
                
                </row>
              </td>
            </tr>
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
    <!-- /container-wrapper-->
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
	
	<!-- Reply to review popup -->
	<div id="modal-reply" class="white-popup mfp-with-anim mfp-hide">
		<div class="small-dialog-header">
			<h3>Reply to review</h3>
		</div>
		<div class="message-reply margin-top-0">
			<div class="form-group">
				<textarea cols="40" rows="3" class="form-control"></textarea>
			</div>
			<button class="btn_1">Reply</button>
		</div>
	</div>

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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<script src="vendor/jquery.selectbox-0.2.js"></script>
	<script src="vendor/retina-replace.min.js"></script>
	<script src="vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/admin.js"></script>
	
</body>
</html>