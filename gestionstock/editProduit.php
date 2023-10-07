<?php
     include 'config/database.php';
  
    if(isset($_POST['id']) && isset($_POST['designation']) && isset($_POST['quantite']) && isset($_POST['prix']) && isset($_POST['devise']) && isset($_POST['dateoperation']) && isset($_POST['categorie'])){

        $id=$_POST['id'];
        $designation=$_POST['designation'];
        $quantite=$_POST['quantite'];
        $prix=$_POST['prix'];
        $devise=$_POST['devise'];
        $dateoperation=$_POST['dateoperation'];
        $categorie=$_POST['categorie'];


            $stmt=$db->prepare("UPDATE produit SET designation=:designation,quantite=:quantite,prix=:prix,devise=:devise,dateoperation=:dateoperation,categorie=:categorie WHERE id=:id");
            $stmt->execute([
                'designation'=>$designation,                
                'quantite'=>$quantite,                
                'prix'=>$prix,                
                'devise'=>$devise,                
                'dateoperation'=>$dateoperation,                
                'categorie'=>$categorie,                
                'id'=>$id                
            ]);
         
        header('location:produit.php'); 
             
    }
?>