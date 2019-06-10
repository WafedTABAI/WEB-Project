<?php 

   require_once('connexiondb.php');
   require_once("session.php");
   $reqF="select * from filiere";
   $resultatF=$pdo->query($reqF);

?>

<! doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <title> Nouveau stagiaire</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head> 
    <body>
     <?php include("menu.php"); ?> 
        
        
        <div class="container">
    <div class="panel panel-danger">
      <div class="panel-heading">Les infos du nouveau stagiaire</div>
      <div class="panel-body">
    
    <form class="form" method="post" action="insertStagiaire.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nom">Nom  : </label>
        <input type="text" class="form-control" name="nom" placeholder="Nom">
      </div>
        
        <div class="form-group">
        <label for="prenom">Prenom  : </label>
        <input type="text" class="form-control" name="prenom" placeholder="Prenom">
      </div>
        
        <div class="form-group">
        <label for="civilite">Civilité  : </label>
            <div class="radio">
        <label><input type="radio"  name="civilite" value="F" checked >F</label>
           
        <label><input type="radio"  name="civilite" value="M" >M</label>
            
            </div>
      </div>
        
        
        
        
        
        
        <label for="filiere">Filiere : </label>
        <select name="filiere" class="form-control" id="filiere"  onchange="this.form.submit()">
            
            <?php while($filiere=$resultatF->fetch())  {  ?>
            <option value="<?php echo $filiere['idFiliere']  ?>">
            
            <?php echo $filiere['nomFiliere']  ?>
            </option> 
    
                       <?php }  ?>
            
        </select>
          <div class="form-group">
        <label for="photo">Photo : </label>
        <input type="file" class="form-control" name="photo" >
        </div>
    
        
          <button type="submit" class="btn btn-danger " style="margin-top:20px;margin-left:480px;" >
              <span class="glyphicon glyphicon-save"></span>
              
              Enregistrer</button>
            
          </form>
                
    
    </div>
    </div>
        </div>
        
        
    </body>
</html>
