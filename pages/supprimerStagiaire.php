<?php   
require_once('connexiondb.php');
require_once("session.php");
$idS=isset($_GET['idS'])?$_GET['idS']:0;

$req="delete from stagiaire  where idStagiaire=? ";
$params = array($idS);
$resultat=$pdo->prepare($req);
$resultat->execute($params);
header('location:stagiaires.php');


?>  