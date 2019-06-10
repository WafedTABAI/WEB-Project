<?php   
require_once('connexiondb.php');
$idf=isset($_POST['idF'])?$_POST['idF']:0;
$nomf=isset($_POST['nomF'])?$_POST['nomF']:"";
$niveau=($_POST['niveau'])?strtoupper($_POST['niveau']):"";

$req="update  filiere set nomFiliere=? , niveau=? where idFiliere=? ";
$params = array($nomf,$niveau,$idf);
$resultat=$pdo->prepare($req);
$resultat->execute($params);

header('location:filieres.php');

?>  