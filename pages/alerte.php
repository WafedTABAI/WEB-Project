<?php 


$message=isset($_GET['message'])?($_GET['message']):"Erreur";
?>


<! doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <title> Alerte</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head> 
    <body>
     <?php include("menu.php"); ?> 
        <div class="container">
        <div class="panel panel-danger">
      <div class="panel-heading">Erreur : </div>
      <div class="panel-body">
            <h3><?php echo $message   ?></h3>
            <a href="<?php echo $_SERVER['HTTP_REFERER']  ?>">Retour >>></a>     
            </div>
    </div>
        </div>
        
    </body>
</html>