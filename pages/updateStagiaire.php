<?php   
require_once('connexiondb.php');
require_once("session.php");
$ids=isset($_POST['idS'])?$_POST['idS']:0;
$nom=isset($_POST['nom'])?$_POST['nom']:"";
$prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
$civilite=isset($_POST['civilite'])?$_POST['civilite']:"";
$idFiliere=isset($_POST['idFiliere'])?$_POST['idFiliere']:1;
$nomPhoto=isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
$imageTemp=$_FILES['photo']['tmp_name'];
move_uploaded_file($imageTemp,"../images/".$nomPhoto);
if(!empty($nomPhoto)){
    
    $req="update  stagiaire set nom=? ,prenom=?,civilite=?,idFiliere=?,photo=? where idStagiaire=? ";
    $params = array($nom,$prenom,$civilite,$idFiliere,$nomPhoto,$ids);
}
else{
    $req="update  stagiaire set nom=? ,prenom=?,civilite=?,idFiliere=? where idStagiaire=? ";
    $params = array($nom,$prenom,$civilite,$idFiliere,$ids);
}


$resultat=$pdo->prepare($req);
$resultat->execute($params);

header('location:stagiaires.php');

?>  