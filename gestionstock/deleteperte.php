<?php
     include 'config/database.php';
 
    $id=$_GET['id'];

    $stmt=$db->prepare("DELETE FROM perteproduit WHERE id=:id");
    $stmt->execute([
        'id'=>$id
    ]);
    header('location:perte.php'); 
?>