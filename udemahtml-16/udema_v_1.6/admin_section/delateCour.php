<?php
require_once('@function/database.php');
 
    if(!empty($_GET['id'])) 
    {
        $id = checkInput($_GET['id']);
    }

    if(!empty($_POST)) 
    {
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM lecon WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: reviews.php"); 
    }

    function checkInput($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        
        <title>UDEMA - Admin dashboard</title>
        <?php include_once('include/head.php') ?>

    </head>
    
    <body>
         <div class="container admin">
            <div class="row">
                <h1>Supprimer un item</h1>
                <br>
                <form class="form" action="deleteCour.php" role="form" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>"/>
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-warning">Oui</button>
                      <a class="btn btn-default" href="index.php">Non</a>
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>

