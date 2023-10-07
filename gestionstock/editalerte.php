<?php
  include 'config/database.php';

    if(isset($_POST['quantite']) && isset($_POST['quantite'])){

        $id=$_POST['id'];
        $quantite=$_POST['quantite'];

            $stmt=$db->prepare("UPDATE alerte SET quantite=:quantite WHERE id=:id");
            $stmt->execute([
                'quantite'=>$quantite,
                'id'=>$id                
            ]);
            
        header('location:alerte.php'); 
            
    }
?>