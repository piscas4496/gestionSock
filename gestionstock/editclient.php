<?php
     include 'config/database.php';
 
    if(isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['adresse']) && isset($_POST['telephone']) && isset($_POST['mail'])){

        $id=$_POST['id'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $sexe=$_POST['sexe'];
        $adresse=$_POST['adresse'];
        $telephone=$_POST['telephone'];
        $mail=$_POST['mail'];


            $stmt=$db->prepare("UPDATE client SET nom=:nom,prenom=:prenom,sexe=:sexe,adresse=:adresse,telephone=:telephone,mail=:mail WHERE id=:id");
            $stmt->execute([
                'nom'=>$nom,                
                'prenom'=>$prenom,                
                'sexe'=>$sexe,                
                'adresse'=>$adresse,                
                'telephone'=>$telephone,                
                'mail'=>$mail,
                'id'=>$id                
            ]);
            if ($req) {
                header('location:client.php'); 
            }else{
                echo "err";
            }
        
    }
?>