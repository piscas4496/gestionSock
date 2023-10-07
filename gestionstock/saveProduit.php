<?php
   include 'config/database.php';

    if(isset($_POST['designation']) && isset($_POST['quantite']) && isset($_POST['prix']) && isset($_POST['devise']) && isset($_POST['dateoperation']) && isset($_POST['categorie'])){

        $designation=$_POST['designation'];
        $quantite=$_POST['quantite'];
        $prix=$_POST['prix'];
        $devise=$_POST['devise'];
        $dateoperation=$_POST['dateoperation'];
        $categorie=$_POST['categorie'];     


            $stmt=$db->prepare("INSERT INTO produit(designation, quantite, prix, devise, dateoperation, categorie) VALUES (:designation, :quantite, :prix, :devise, :dateoperation, :categorie)");
            $stmt->execute([
                'designation'=>$designation,                
                'quantite'=>$quantite,                
                'prix'=>$prix,                
                'devise'=>$devise,                
                'dateoperation'=>$dateoperation,                
                'categorie'=>$categorie                 
            ]);
          
        header('location:produit.php'); 
                
    }
?>