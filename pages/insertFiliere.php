<?php   
require_once('connexiondb.php');
require_once("session.php");
$nomf=isset($_POST['nomF'])?$_POST['nomF']:"";
$niveau=($_POST['niveau'])?strtoupper($_POST['niveau']):"";

$req="insert into filiere(nomFiliere,niveau) values (?,?)";
$params = array($nomf,$niveau);
$resultat=$pdo->prepare($req);
$resultat->execute($params);

header('location:filieres.php');

?>  