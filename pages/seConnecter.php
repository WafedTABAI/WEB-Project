<?php 
   session_start();
   require_once('connexiondb.php');
   $login=isset($_POST['login'])?$_POST['login']:"";
   $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";

   $reqS="select * from utilisateur where login='$login' and pwd = MD5('$pwd')";
   $resultatS=$pdo->query($reqS);
   
   if($user=$resultatS->fetch()) {
       if($user['etat']==1) {
           $_SESSION['user']=$user;
           header('location:../index.php');
       }else{
           $_SESSION['erreurLogin']="<strong>ERREUR!!</strong> Votre compte est désactivé.
           <br> Veuillez contacter l'administrateur";
       
       header('location:login.php');
           
           
       }
       
       
       
   }else{
           $_SESSION['erreurLogin']="<strong>ERREUR!!</strong> Login ou mot de passe incorrect !!! ";
       
       header('location:login.php');
           
           
       }

  

?>