<?php

       include 'config/database.php';
    if(isset($_POST['id']) && isset($_POST['produit']) && isset($_POST['SI']) && isset($_POST['dateActuel'])){

        $id=$_POST['id'];
        $produit=$_POST['produit'];
        $SI=$_POST['SI'];
        $dateActuel=$_POST['dateActuel']; 


            $stmt=$db->prepare("UPDATE stock SET produit=:produit,SI=:SI,dateActuel=:dateActuel WHERE id=:id");
            $stmt->execute([
                'produit'=>$produit,                
                'SI'=>$SI,                
                'dateActuel'=>$dateActuel,
                'id'=>$id                           
            ]);
        header('location:stock.php'); 
          
    }
?>