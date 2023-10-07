<?php
    include 'config/database.php';
  
    if(isset($_POST['produit']) && isset($_POST['SI']) && isset($_POST['dateActuel'])){

        $produit=$_POST['produit'];
        $SI=$_POST['SI'];
        $dateActuel=$_POST['dateActuel']; 


            $stmt=$db->prepare("INSERT INTO stock(produit, SI, dateActuel) VALUES (:produit, :SI, :dateActuel)");
            $stmt->execute([
                'produit'=>$produit,                
                'SI'=>$SI,                
                'dateActuel'=>$dateActuel                           
            ]);
        
        header('location:stock.php'); 
         
    }
?>