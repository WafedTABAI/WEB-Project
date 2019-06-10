<?php 

   require_once('connexiondb.php');
require_once("session.php");
   $ids=isset($_GET['idS'])?$_GET['idS']:0;
   $reqS="select * from stagiaire where idStagiaire=$ids";
   $resultatS=$pdo->query($reqS);
   $stagiaire=$resultatS->fetch();
   $nom=$stagiaire['nom'];
   $prenom=$stagiaire['prenom'];
   $civilite=strtoupper($stagiaire['civilite']);
   $idFiliere=$stagiaire['idFiliere'];
   $nomPhoto=$stagiaire['photo'];


   $reqF="select * from filiere";
   $resultatF=$pdo->query($reqF);

?>

<! doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <title> Edition d'un stagiaire</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head> 
    <body>
     <?php include("menu.php"); ?> 
        
        
        <div class="container">
    <div class="panel panel-danger">
      <div class="panel-heading">Edition du stagiaire</div>
      <div class="panel-body">
    
    <form class="form" method="post" action="updateStagiaire.php" enctype="multipart/form-data">
        <div class="form-group">
        <label for="idS">id du stagiaire : <?php echo $ids ?></label>
        <input type="hidden" class="form-control" name="idS" value="<?php echo $ids ?>">
        </div>
        
      <div class="form-group">
        <label for="nom">Nom  : </label>
        <input type="text" class="form-control" name="nom" value="<?php echo $nom ?>">
      </div>
        
        <div class="form-group">
        <label for="prenom">Prenom  : </label>
        <input type="text" class="form-control" name="prenom" value="<?php echo $prenom ?>">
      </div>
        
        <div class="form-group">
        <label for="civilite">Civilité  : </label>
            <div class="radio">
        <label><input type="radio"  name="civilite" value="F"
                      <?php if($civilite==="F") echo "checked"  ?>
                      
                      >F</label>
           
         <label><input type="radio"  name="civilite" value="M"
                        <?php if($civilite==="M") echo "checked"  ?>>M</label>
            
            </div>
      </div>
        
        
        
        
        
        
        <label for="filiere">Filiere : </label>
        <select name="filiere" class="form-control" id="filiere"  onchange="this.form.submit()">
            
            <?php while($filiere=$resultatF->fetch())  {  ?>
            <option value="<?php echo $filiere['idFiliere']  ?>"
                    
                    <?php  if($idFiliere===$filiere['idFiliere']) echo "selected" ?>
                    
                    >
            
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
