<?php 
  session_start();
  if(isset($_SESSION['erreurLogin']))
      $erreurLogin=$_SESSION['erreurLogin'];
  else  {
       $erreurLogin="";
  }
   


session_destroy();

?>
<! doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <title > Se Connecter</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head> 
    <body style="background-image:url(../images/ok1.jpeg);background-size: cover;background-repeat: no-repeat;">        
<div class="container col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3" style="margin-top:150px;margin-left:150px;">
    <div class="panel  " style="background-color:#AC7358;" >
      <div class="panel-heading" style="color:white;"><strong>Se connecter :</strong> </div>
      <div class="panel-body" style="background-color:#EAE9E6;">
    
    <form class="form" method="post" action="seConnecter.php" enctype="multipart/form-data">
        <?php if(!empty($erreurLogin)) { ?>
        <div class="alert alert-danger">
            <?php  echo $erreurLogin ?>

        </div>
        
        <?php   } ?>
      <div class="form-group">
        <label for="nom">Login  : </label>
        <input type="text" class="form-control" name="login" placeholder="Login">
      </div>
        
        <div class="form-group">
        <label for="pwd">Mot de passe : </label>
        <input type="password" class="form-control" name="pwd" placeholder="Mot de passe">
      </div>
        
    <div style="margin-top:30px;margin-left:95px;">
        <button type="submit" class="btn " style="background-color:#AC7358;color:white;" >
              <span class="glyphicon glyphicon-log-in" style="color:white;"></span>
              
              Se connecter</button>&nbsp &nbsp	&nbsp
						<a  style="margin-top:25px;" href="nouvelUtilisateur.php">Créer un compte</a>	
        </div>
        
          
            
          </form>
                
    
    </div>
    </div>
        </div>
        
        
    </body>
</html>
