<?php
    require_once("session.php");
    require_once("connexiondb.php");

    $nomf=isset($_GET['nomF'])?$_GET['nomF']:"";
    $niveau=isset($_GET['niveau'])?$_GET['niveau']:"all";
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;

    if($niveau=="all") {
         $req="select * from filiere where nomFiliere like '%$nomf%' limit $size offset $offset";
         $reqCount = "select count(*) countF from filiere where nomFiliere like '%$nomf%' ";
    }
    else{
        $req="select * from filiere where nomFiliere like '%$nomf%' and niveau='$niveau'";
        $reqCount = "select count(*) countF from filiere where nomFiliere like '%$nomf%' and  niveau='$niveau' ";
    }    
    $resultF = $pdo->query($req);
    $resultCount = $pdo->query($reqCount);
    $tabCount = $resultCount->fetch();
    $nbrFiliere= $tabCount['countF'];
    $reste= $nbrFiliere % $size;
    
    if($reste==0)
        $nbrPage= $nbrFiliere/$size;
    else
        $nbrPage = floor($nbrFiliere/$size)+1;

?>

<! doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <title> Gestion des filiéres</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head> 
    <body>
     <?php include("menu.php"); ?> 
        <div class="container">
            <div class="panel panel-danger" style="margin-top:50px;" >
      <div class="panel-heading" >Rechercher des filiéres...</div>
      <div class="panel-body">
                
        <form class="form-inline" method="get" action="filieres.php">
        <input type="text" class="form-control" name="nomF" placeholder="Tapez le nom de la filiére" value="<?php echo $nomf ?>">
        <label for="niveau">Niveau : </label>
        <select name="niveau" class="form-control" id="niveau"  onchange="this.form.submit()">

           <option value="all" <?php if($niveau==="all") echo "selected" ?>>Tous les niveaux</option>
            <option value="Master" <?php if($niveau==="Master") echo "selected" ?>>Master</option>
            <option value="Licence" <?php if($niveau==="Licence") echo "selected" ?>>Licence</option>
            <option value="Doctorat" <?php if($niveau==="Doctorat") echo "selected" ?>>Doctorat</option>
            <option value="Ingenieur" <?php if($niveau==="Ingenieur") echo "selected" ?>>Ingenieur</option>
            <option value="Technicien" <?php if($niveau==="Technicien") echo "selected" ?>>Technicien</option>
        </select>
          
          <button type="submit" class="btn btn-danger">
              <span class="glyphicon glyphicon-search"></span>
              
              Rechercher</button>
           
            <a style="margin-left:300px;" href="nouvelleFiliere.php"><span class="glyphicon glyphicon-plus"></span>Nouvelle Filiere</a>
            
          </form>
                
                </div>
    </div>
        </div>
        <div class="container">
        <div class="panel panel-danger" style="margin-top:50px;" >
      <div class="panel-heading" style="background-color:#8B0000;color:white;">Nos Filiéres (<?php echo $nbrFiliere ?> Filieres)</div>
      <div class="panel-body">
            
            <div class="container">
                <table class="table table-condensed">
    <thead>
      <tr>
        <th>ID Filiere</th>
        <th>Nom Filiere</th>
        <th>Niveau</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        <?php while($filiere = $resultF->fetch()){ ?>
      <tr>
          <td><?php echo $filiere['idFiliere']  ?> </td>
          <td><?php echo $filiere['nomFiliere']  ?> </td>
          <td><?php echo $filiere['niveau']  ?> </td>
          <td>
          <a href="editFiliere.php?idF=<?php echo $filiere['idFiliere']  ?>">
              <span class="glyphicon glyphicon-edit" style="color:#8B0000;"></span>
         </a>
              &nbsp;
          
          <a onclick="return confirm('Etes vous sùr de vouloir supprimer la filiére ?')" href="supprimerFiliere.php?idF=<?php echo $filiere['idFiliere']  ?>">
              <span class="glyphicon glyphicon-trash" style="color:#8B0000;"></span>
         </a>
          </td>
      </tr>
        <?php }  ?>
    </tbody>
  </table>
                <div>
                    <ul class="pagination">
                       <?php for($i=1;$i<=$nbrPage;$i++) { ?>
                        <li class="<?php if($i==$page) echo 'active' ?>"><a  href="filieres.php?page=<?php echo $i; ?>&nomF=<?php echo $nomf; ?>&niveau=<?php echo $niveau; ?>"> <?php echo $i; ?></a></li>
                        <?php } ?>
    
                    
                    
                    </ul>
                
                
                </div>
          
          
          </div>
            </div>
    </div>
        </div>
    </body>
</html>