<?php
    include 'config/database.php';
  
    if(isset($_POST['produit']) && isset($_POST['dateperte']) && isset($_POST['quantite']) && isset($_POST['typegaspillage'])){

        $produit=$_POST['produit'];
        $dateperte=$_POST['dateperte'];
        $quantite=$_POST['quantite']; 
        $typegaspillage=$_POST['typegaspillage']; 


            $stmt=$db->prepare("INSERT INTO perteproduit(produit, dateperte, quantite, typegaspillage) VALUES (:produit, :dateperte, :quantite, :typegaspillage)");
            $stmt->execute([
                'produit'=>$produit,                
                'dateperte'=>$dateperte,                
                'quantite'=>$quantite,                           
                'typegaspillage'=>$typegaspillage                           
            ]);
        
        header('location:perte.php'); 
         
    }
?>