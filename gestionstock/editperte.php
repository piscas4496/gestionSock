<?php
    include 'config/database.php';
  
    if(isset($_POST['id']) && isset($_POST['produit']) && isset($_POST['dateperte']) && isset($_POST['quantite']) && isset($_POST['typegaspillage'])){

        $id=$_POST['id'];
        $produit=$_POST['produit'];
        $dateperte=$_POST['dateperte'];
        $quantite=$_POST['quantite']; 
        $typegaspillage=$_POST['typegaspillage']; 


            $stmt=$db->prepare("UPDATE perteproduit SET produit`=:produit,dateperte=:dateperte,quantite=:quantite,typegaspillage=:typegaspillage WHERE id=:id");
            $stmt->execute([
                'produit'=>$produit,                
                'dateperte'=>$dateperte,                
                'quantite'=>$quantite,                           
                'typegaspillage'=>$typegaspillage,
                'id'=>$id                           
            ]);
        
        header('location:perte.php'); 
         
    }
?>