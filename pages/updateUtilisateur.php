<?php   
require_once('connexiondb.php');
require_once("session.php");
$idUser=isset($_POST['idUser'])?$_POST['idUser']:0;
$login=isset($_POST['login'])?$_POST['login']:"";
$email=isset($_POST['email'])?$_POST['email']:"";
$role=isset($_POST['role'])?$_POST['role']:"";

    $req="update  utilisateur set login=? ,email=?,role=? where idUser=? ";
    $params = array($login,$email,$role,$idUser);

$resultat=$pdo->prepare($req);
$resultat->execute($params);

header('location:utilisateurs.php');

?>  