<?php
    require_once("connexiondb.php");
    require_once("session.php");
    $nomPrenom=isset($_GET['nomPrenom'])?$_GET['nomPrenom']:"";
    $idfiliere=isset($_GET['idfiliere'])?$_GET['idfiliere']:0;
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;

    $requeteFiliere = "select * from filiere";
    if($idfiliere==0) {
         $reqStagiaire="select idStagiaire,nom,prenom,nomFiliere,photo,civilite
         from filiere as f,stagiaire as s 
         where f.idFiliere = s.idFiliere 
         and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%') 
         order by idStagiaire
         limit $size 
         offset $offset";
         $reqCount = "select count(*) countS from stagiaire where  nom like '%$nomPrenom%' or prenom like '%$nomPrenom%' ";
    }
    else{
        $reqStagiaire="select idStagiaire,nom,prenom,nomFiliere,photo,civilite
         from filiere as f,stagiaire as s 
         where f.idFiliere = s.idFiliere 
         and (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%' )
         and f.idFiliere = $idfiliere
         order by idStagiaire
         limit $size 
         offset $offset";
         $reqCount = "select count(*) countS from stagiaire where (nom like '%$nomPrenom%' or prenom like '%$nomPrenom%') and idFiliere=$idfiliere";
    }    
    $resultF=$pdo->query($requeteFiliere); 
    $resultS=$pdo->query($reqStagiaire);
    $resultCount=$pdo->query($reqCount);

    $tabCount=$resultCount->fetch();
    $nbrStagiaire=$tabCount['countS'];
    $reste=$nbrStagiaire % $size;
    
    if($reste==0)
        $nbrPage= $nbrStagiaire/$size;
    else
        $nbrPage = floor($nbrStagiaire/$size)+1;

?>

<! doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <title> Gestion des stagiaires</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head> 
    <body>
     <?php include("menu.php"); ?> 
        <div class="container">
            <div class="panel panel-danger" style="margin-top:50px;" >
      <div class="panel-heading" >Rechercher des stagiaires...</div>
      <div class="panel-body">
                
        <form class="form-inline" method="get" action="stagiaires.php">
        <input type="text" class="form-control" name="nomPrenom" placeholder="Nom et Prenom" value="<?php echo $nomPrenom ?>">
        <label for="idfiliere">Filiere : </label>
        <select name="idfiliere" class="form-control" id="idfiliere"  onchange="this.form.submit()">
            <option value=0>Toutes les filiéres</option>
            <?php while($filiere= $resultF->fetch()){   ?>
              <option value="<?php echo $filiere['idFiliere'] ?>"
                  <?php if ($filiere['idFiliere'] === $idfiliere) echo "selected" ?>
                      
                      > <?php echo $filiere['nomFiliere'] ?> </option>
    
<?php    }   ?>
        </select>
          
          <button type="submit" class="btn btn-danger">
              <span class="glyphicon glyphicon-search"></span>
              
              Rechercher</button>
           
            <a style="margin-left:300px;" href="nouveauStagiaire.php"><span class="glyphicon glyphicon-plus"></span>Nouveau Stagiaire</a>
            
          </form>
                
                </div>
    </div>
        </div>
        <div class="container">
        <div class="panel panel-danger" style="margin-top:50px;" >
      <div class="panel-heading" style="background-color:#8B0000;color:white;">Nos Stagiaires (<?php echo $nbrStagiaire ?> Stagiaires)</div>
      <div class="panel-body">
            
            <div class="container">
                <table class="table table-condensed">
    <thead>
      <tr>
        <th>ID Stagiaire</th>
        <th>Nom </th>
        <th>Prenom</th>
        <th>Filiere</th>
        <th>Photo</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        <?php while($stagiaire = $resultS->fetch()){ ?>
      <tr>
          <td><?php echo $stagiaire['idStagiaire']  ?> </td>
          <td><?php echo $stagiaire['nom']  ?> </td>
          <td><?php echo $stagiaire['prenom']  ?> </td>
          <td><?php echo $stagiaire['nomFiliere']  ?> </td>
          <td><img src="../images/<?php echo $stagiaire['photo']  ?>" width="50" height="50" class="img-circle"> </td>
          <td>
          <a href="editStagiaire.php?idS=<?php echo $stagiaire['idStagiaire']  ?>">
              <span class="glyphicon glyphicon-edit" style="color:#8B0000;"></span>
         </a>
              &nbsp;
          
          <a onclick="return confirm('Etes vous sùr de vouloir supprimer ce stagiaire ?')" href="supprimerStagiaire.php?idS=<?php echo $stagiaire['idStagiaire']  ?>">
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
                        <li class="<?php if($i==$page) echo 'active' ?>"><a  href="stagiaires.php?page=<?php echo $i; ?>&nomPrenom=<?php echo $nomPrenom; ?>&idfiliere=<?php echo $idfiliere; ?>"> <?php echo $i; ?></a></li>
                        <?php } ?>
    
                    
                    
                    </ul>
                
                
                </div>
          
          
          </div>
            </div>
    </div>
        </div>
    </body>
</html>