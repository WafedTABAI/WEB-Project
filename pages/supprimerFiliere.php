<?php   
require_once('connexiondb.php');
require_once("session.php");
$idf=isset($_GET['idF'])?$_GET['idF']:0;
$reqStage="select count(*) countStg from stagiaire where idFiliere=$idf";
$resultatStage=$pdo->query($reqStage);
$tabCountStage=$resultatStage->fetch();
$nbrStage=$tabCountStage['countStg'];

if($nbrStage==0)
{
    $req="delete from filiere  where idFiliere=? ";
$params = array($idf);
$resultat=$pdo->prepare($req);
$resultat->execute($params);

header('location:filieres.php');
}else{
    
    
    $msg="Suppression impossible: vous devez supprimer tous les stagiaires inscris dans cette filiere";
    header("location:alerte.php?message=$msg");
}



?>  