<?php
    include 'config/database.php';

    $id=$_GET['id'];

    $stmt=$db->prepare("DELETE FROM fournisseur WHERE id=:id");
    $stmt->execute([
        'id'=>$id
    ]);
    header('location:fournisseur.php'); 
  
?>