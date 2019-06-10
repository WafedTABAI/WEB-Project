<?php
    require_once("connexiondb.php");
    require_once("session.php");
    $login=isset($_GET['login'])?$_GET['login']:"";
    
    $size=isset($_GET['size'])?$_GET['size']:6;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size;

    $requeteUser = "select * from utilisateur where login like '%$login%'";
    
    $reqCount = "select count(*) countU from utilisateur";
    
    $resultU=$pdo->query($requeteUser); 
    $resultCount=$pdo->query($reqCount);

    $tabCount=$resultCount->fetch();
    $nbrUser=$tabCount['countU'];
    $reste=$nbrUser % $size;
    
    if($reste==0)
        $nbrPage= $nbrUser/$size;
    else
        $nbrPage = floor($nbrUser/$size)+1;

?>

<! doctype html>
<html>
    <head>
    <meta charset="utf-8">
        <title> Gestion des utilisateurs</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head> 
    <body>
     <?php include("menu.php"); ?> 
        <div class="container">
            <div class="panel panel-danger" style="margin-top:50px;" >
      <div class="panel-heading" >Rechercher des utilisateurs...</div>
      <div class="panel-body">
                
        <form class="form-inline" method="get" action="utilisateurs.php">
        <input type="text" class="form-control" name="login" placeholder="Login" value="<?php echo $login ?>">
        
          <button type="submit" class="btn btn-danger">
              <span class="glyphicon glyphicon-search"></span>
              
              Rechercher</button>
           
            
          </form>
                
                </div>
    </div>
        </div>
        <div class="container">
        <div class="panel panel-danger" style="margin-top:50px;" >
      <div class="panel-heading" style="background-color:#8B0000;color:white;">Nos utilisateurs (<?php echo $nbrUser ?> utilisateurs)</div>
      <div class="panel-body">
            
            
                <table class="table table-stripped table-bordered ">
    <thead>
      <tr>
        <th>Login</th>
        <th>Email </th>
        <th>Role</th>
          
        <th>Actions</th>
        
      </tr>
    </thead>
    <tbody>
        <?php while($user = $resultU->fetch()){ ?>
      <tr class="<?php echo $user['etat']==1?'success':'danger' ?>">
          <td><?php echo $user['login']  ?> </td>
          <td><?php echo $user['email']  ?> </td>
          <td><?php echo $user['role']  ?> </td>

          <td>
          <a href="editUtilisateur.php?idUser=<?php echo $user['idUser']  ?>">
              <span class="glyphicon glyphicon-edit" style="color:#8B0000;"></span>
         </a>
              &nbsp;
          
          <a onclick="return confirm('Etes vous sùr de vouloir supprimer cet utilisateur ?')" href="supprimerUtilisateur.php?idUser=<?php echo $user['idUser']  ?>">
              <span class="glyphicon glyphicon-trash" style="color:#8B0000;"></span>
         </a>
               &nbsp;&nbsp;
              
              <a  href="activerUtilisateur.php?idUser=<?php echo $user['idUser']  ?>
                        &etat=<?php echo $user['etat']  ?>
                        ">
              
              <?php  
    
                  if($user['etat']==1)
                      echo '<span class="glyphicon glyphicon-remove" style="color:#8B0000;"></span>';
                  else
                       echo '<span class="glyphicon glyphicon-ok" style="color:#8B0000;"> </span>';
                                        
    
                 ?>
              </a>
              
              
          </td>
          <?php } ?>
      </tr>
       
    </tbody>
  </table>
                <div>
                    <ul class="pagination">
                       <?php for($i=1;$i<=$nbrPage;$i++) { ?>
                        <li class="<?php if($i==$page) echo 'active' ?>"><a  href="utilisateurs.php?page=<?php echo $i; ?>&login=<?php echo $login; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>
    
                    
                    
                    </ul>
                
                
            
                            
          
          </div>
            </div>
    </div>
        </div>
    </body>
</html>