<?php 

   require_once('connexiondb.php');
   require_once("session.php");
   $idf=isset($_GET['idF'])?$_GET['idF']:0;
   $req="select * from filiere where idFiliere=$idf";
   $resultat=$pdo->query($req);
   $filiere=$resultat->fetch();
   $nomf=$filiere['nomFiliere'];
   $niveau=strtolower($filiere['niveau']);

?>

<! doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <title> Edition d'une filiére</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head> 
    <body>
     <?php include("menu.php"); ?> 
        
        
        <div class="container">
    <div class="panel panel-danger">
      <div class="panel-heading">Edition de la filiére :</div>
      <div class="panel-body">
    
    <form class="form" method="post" action="updateFiliere.php">
        <div class="form-group">
        <label for="idF">id de la filiére : <?php echo $idf ?></label>
        <input type="hidden" class="form-control" name="idF" value="<?php echo $idf ?>">
        </div>
        
      <div class="form-group">
        <label for="nomF">Nom de la filiére : </label>
        <input type="text" class="form-control" name="nomF" value="<?php echo $nomf ?>">
      
        </div>
        
        
        
        
        <label for="niveau">Niveau : </label>
        <select name="niveau" class="form-control" id="niveau"  onchange="this.form.submit()">
            <option value="Master" <?php if($niveau=="Master") echo "selected"  ?> >Master</option>
            <option value="Licence" <?php if($niveau=="Licence") echo "selected"  ?> >Licence</option>
            <option value="Doctorat" <?php if($niveau=="Doctorat") echo "selected"  ?> >Doctorat</option>
            <option value="Ingenieur"  <?php if($niveau=="Ingenieur") echo "selected"  ?> >Ingenieur</option>
            <option value="Technicien" <?php if($niveau=="Technicien") echo "selected"  ?> >Technicien</option>
        </select>
          
    
        
          <button type="submit" class="btn btn-danger " style="margin-top:20px;margin-left:480px;" >
              <span class="glyphicon glyphicon-save"></span>
              
              Enregistrer</button>
            
          </form>
                
    
    </div>
    </div>
        </div>
        
        
    </body>
</html>
