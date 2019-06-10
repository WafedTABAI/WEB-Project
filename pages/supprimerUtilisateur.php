<?php   
require_once('connexiondb.php');
require_once("session.php");
$idUser=isset($_GET['idUser'])?$_GET['idUser']:0;

$req="delete from utilisateur  where idUser=? ";
$params = array($idUser);
$resultat=$pdo->prepare($req);
$resultat->execute($params);
header('location:utilisateurs.php');


?>  