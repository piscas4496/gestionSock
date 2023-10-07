<?php
    include 'config/database.php';
  
    if(isset($_POST['id']) && isset($_POST['client']) && isset($_POST['produit']) && isset($_POST['quantite']) && isset($_POST['prix']) && isset($_POST['devise']) && isset($_POST['dateoperation'])){

        $id=$_POST['id'];
        $client=$_POST['client'];
        $produit=$_POST['produit'];
        $quantite=$_POST['quantite'];
        $prix=$_POST['prix'];
        $devise=$_POST['devise'];
        $dateoperation=$_POST['dateoperation'];

            // $stmt=$db->prepare("CALL updatesortie(:client,:produit,:quantite,:prix,:devise,:dateoperation,:id)");
            $stmt=$db->prepare("UPDATE sortie SET client=:client,produit=:produit,quantite=:quantite,prix=:prix,devise=:devise,dateoperation=:dateoperation WHERE id=:id");
            $stmt->execute([
                'client'=>$client,                
                'produit'=>$produit,                
                'quantite'=>$quantite,                
                'prix'=>$prix,                
                'devise'=>$devise,                
                'dateoperation'=>$dateoperation,
                'id'=>$id               
            ]); 
        
        header('location:sortie.php'); 
           
    }
?>