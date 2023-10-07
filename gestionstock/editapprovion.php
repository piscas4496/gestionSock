<?php
   include 'config/database.php';
  if(isset($_POST['id']) && isset($_POST['produit']) && isset($_POST['fournisseur']) && isset($_POST['quantite']) && isset($_POST['prix']) && isset($_POST['devise']) && isset($_POST['dateoperation'])){
   
        $id=$_POST['id'];
        $produit=$_POST['produit'];
        $fournisseur=$_POST['fournisseur'];      
        $quantite=$_POST['quantite'];
        $prix=$_POST['prix'];
        $devise=$_POST['devise'];
        $dateoperation=$_POST['dateoperation'];

            // $stmt=$db->prepare("CALL updateprovision(:produit,:fournisseur,:quantite,:prix,:devise,:dateoperation,:id)");
            $stmt=$db->prepare("UPDATE approvision SET produit=:produit,fournisseur=:fournisseur,quantite=:quantite,prix=:prix,devise=:devise,dateoperation=:devise WHERE id=:id");
            $stmt->execute([
                'produit'=>$produit,
                'fournisseur'=>$fournisseur,                     
                'quantite'=>$quantite,                
                'prix'=>$prix,                
                'devise'=>$devise,                
                'dateoperation'=>$dateoperation,                
                'id'=>$id                
            ]);
         
        header('location:approvision.php'); 
          
        
    }
?>