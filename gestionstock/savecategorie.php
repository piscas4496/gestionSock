<?php
  include 'config/database.php';

    if(isset($_POST['designation'])){

        $designation=$_POST['designation'];

            $stmt=$db->prepare("INSERT INTO categorie(designation) VALUES (:designation)");
            $stmt->execute([
                'designation'=>$designation                
            ]);
            
        header('location:produit.php'); 
            
    }
?>