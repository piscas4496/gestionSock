<?php
   include 'config/database.php';
  
    if(isset($_POST['client']) && isset($_POST['produit']) && isset($_POST['quantite']) && isset($_POST['prix']) && isset($_POST['devise']) && isset($_POST['dateoperation'])){

        $client=$_POST['client'];
        $produit=$_POST['produit'];
        $quantite=$_POST['quantite'];
        $prix=$_POST['prix'];
        $devise=$_POST['devise'];
        $dateoperation=$_POST['dateoperation'];


            $stmt=$db->prepare("INSERT INTO commandeclient(client, produit, quantite, prix, devise, dateoperation) VALUES (:client, :produit, :quantite, :prix, :devise, :dateoperation)");
            $stmt->execute([
                'client'=>$client,                
                'produit'=>$produit,                
                'quantite'=>$quantite,                
                'prix'=>$prix,                
                'devise'=>$devise,                
                'dateoperation'=>$dateoperation                
            ]);
            
        header('location:commandeclient.php'); 
         
        
    }
?>