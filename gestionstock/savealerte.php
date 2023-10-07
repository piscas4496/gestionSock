<?php
  include 'config/database.php';

    if(isset($_POST['quantite'])){

        $quantite=$_POST['quantite'];

            $stmt=$db->prepare("INSERT INTO alerte(quantite) VALUES (:quantite)");
            $stmt->execute([
                'quantite'=>$quantite                
            ]);
            
        header('location:alerte.php'); 
            
    }
?>