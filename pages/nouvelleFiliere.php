<?php 

   
   require_once("session.php");
   
?>
<! doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <title> Nouvelle Filiere</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head> 
    <body>
     <?php include("menu.php"); ?> 
        
        
        <div class="container">
<div class="panel panel-danger">
      <div class="panel-heading">Veuillez saisir les données de la nouvelle filiére</div>
      <div class="panel-body">
    
    <form class="form" method="post" action="insertFiliere.php">
         <label for="nomF">Nom de la filiére : </label>
        <input type="text" class="form-control" name="nomF" placeholder="Tapez le nom de la filiére">
        <label for="niveau">Niveau : </label>
        <select name="niveau" class="form-control" id="niveau"  onchange="this.form.submit()">
            <option value="all" >Tous les niveaux</option>
            <option value="Master">Master</option>
            <option value="Licence" >Licence</option>
            <option value="Doctorat" >Doctorat</option>
            <option value="Ingenieur" >Ingenieur</option>
            <option value="Technicien" selected>Technicien</option>
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
