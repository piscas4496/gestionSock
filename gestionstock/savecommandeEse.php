<?php
   include 'config/database.php';
  
    if(isset($_POST['fournisseur']) && isset($_POST['produit']) && isset($_POST['quantite']) && isset($_POST['prix']) && isset($_POST['devise']) && isset($_POST['dateoperation'])){

        $fournisseur=$_POST['fournisseur'];
        $produit=$_POST['produit'];
        $quantite=$_POST['quantite'];
        $prix=$_POST['prix'];
        $devise=$_POST['devise'];
        $dateoperation=$_POST['dateoperation'];


            $stmt=$db->prepare("INSERT INTO commandecompany(fournisseur, produit, quantite, prix, devise, dateoperation) VALUES (:fournisseur, :produit, :quantite, :prix, :devise, :dateoperation)");
            $stmt->execute([
                'fournisseur'=>$fournisseur,                
                'produit'=>$produit,                
                'quantite'=>$quantite,                
                'prix'=>$prix,                
                'devise'=>$devise,                
                'dateoperation'=>$dateoperation                
            ]);
         
        header('location:noscommandes.php'); 
          
        
    }
?>