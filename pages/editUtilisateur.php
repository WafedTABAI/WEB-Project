<?php 

   require_once('connexiondb.php');
require_once("session.php");
   $idUser=isset($_GET['idUser'])?$_GET['idUser']:0;
   $reqUser="select * from utilisateur where idUser=$idUser";
   $resultatU=$pdo->query($reqUser);
   $user=$resultatU->fetch();


   $login=$user['login'];
   $email=$user['email'];
   $role=strtoupper($user['role']);

?>

<! doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <title> Edition d'un utilisateur</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head> 
    <body>
     <?php include("menu.php"); ?> 
        
        
        <div class="container">
    <div class="panel panel-danger">
      <div class="panel-heading">Edition de l'utilisateur : </div>
      <div class="panel-body">
    
    <form class="form" method="post" action="updateUtilisateur.php" enctype="multipart/form-data">
        <div class="form-group">
        <label for="idUser">id : <?php echo $idUser ?></label>
        <input type="hidden" class="form-control" name="idUser" value="<?php echo $idUser ?>">
        </div>
        
      <div class="form-group">
        <label for="login">Login  : </label>
        <input type="text" class="form-control" name="login" value="<?php echo $login ?>">
      </div>
        
        <div class="form-group">
        <label for="email">Email  : </label>
        <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
      </div>
        
        <div class="form-group" >
            <select class="form-control" name="role">
              <option value="ADMIN" <?php if($role =="ADMIN") echo"selected"?>>Administrateur</option>
               <option value="VISITEUR" <?php if($role =="VISITEUR") echo "selected"?>>Visiteur</option>
            
            </select>
        
        </div>
          
        <div style="margin-top:20px;">
        
        <button type="submit" class="btn btn-danger " >
              <span class="glyphicon glyphicon-save"></span>
              
              Enregistrer</button>
        
        &nbsp;&nbsp;
        
        <a href="modifierPwd.php?idUser=<?php echo $idUser ?>">Changer le mot de passe</a>
            
        </div>
        
          
          </form>
                
    
    </div>
    </div>
        </div>
        
        
    </body>
</html>
