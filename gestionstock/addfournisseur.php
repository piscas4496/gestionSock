<?php
    include 'config/database.php';
  
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['sexe']) && isset($_POST['adresse']) && isset($_POST['telephone']) && isset($_POST['mail'])){

        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $sexe=$_POST['sexe'];
        $adresse=$_POST['adresse'];
        $telephone=$_POST['telephone'];
        $mail=$_POST['mail'];


            $stmt=$db->prepare("INSERT INTO fournisseur(nom, prenom, sexe, adresse, telephone, mail) VALUES (:nom, :prenom, :sexe, :adresse, :telephone, :mail)");
            $stmt->execute([
                'nom'=>$nom,                
                'prenom'=>$prenom,                
                'sexe'=>$sexe,                
                'adresse'=>$adresse,                
                'telephone'=>$telephone,                
                'mail'=>$mail                
            ]);
          
        header('location:noscommandes.php');           
        
    }
?>