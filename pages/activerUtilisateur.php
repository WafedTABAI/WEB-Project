<?php   
require_once('connexiondb.php');
$idUser=isset($_GET['idUser'])?$_GET['idUser']:0;
$etat=isset($_GET['etat'])?$_GET['etat']:0;

if($etat==1)
    $newEtat=0;
else
    $newEtat=1;

    $req="update  utilisateur set etat=? where idUser=? ";
    $params = array($newEtat,$idUser);

$resultat=$pdo->prepare($req);
$resultat->execute($params);

header('location:utilisateurs.php');

?>  