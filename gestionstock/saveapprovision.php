<?php
   include 'config/database.php';
  
    if(isset($_POST['produit']) && isset($_POST['fournisseur']) && isset($_POST['quantite']) && isset($_POST['prix']) && isset($_POST['devise']) && isset($_POST['dateoperation'])){

        $produit=$_POST['produit'];
        $fournisseur=$_POST['fournisseur'];      
        $quantite=$_POST['quantite'];
        $prix=$_POST['prix'];
        $devise=$_POST['devise'];
        $dateoperation=$_POST['dateoperation'];


            $stmt=$db->prepare("CALL saveapprovision(:produit, :fournisseur, :quantite, :prix, :devise, :dateoperation)");
            $stmt->execute([
                'produit'=>$produit,
                'fournisseur'=>$fournisseur,                     
                'quantite'=>$quantite,                
                'prix'=>$prix,                
                'devise'=>$devise,                
                'dateoperation'=>$dateoperation                
            ]);
         
        header('location:approvision.php'); 
          
        
    }
?>