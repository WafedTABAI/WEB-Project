<?php 
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=gestion_stag","root","");  
        
    }catch(Exception $e)
    {
         die(print_r($pdo->errorInfo()));
    }
  
 ?>