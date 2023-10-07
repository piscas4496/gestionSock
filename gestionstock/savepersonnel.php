<?php  

 function imgup()
{
  
  $url_img=basename($_FILES['photo']['name']);
  $nom=htmlspecialchars($_POST['nom']);
  $postnom=htmlspecialchars($_POST['postnom']);
  $prenom=htmlspecialchars($_POST['prenom']);
  $sexe=htmlspecialchars($_POST['sexe']);
  $datenaiss=htmlspecialchars($_POST['datenaiss']);
  $etatcivil=htmlspecialchars($_POST['etatcivil']);
  $adresse=htmlspecialchars($_POST['adresse']);
  $telephone=htmlspecialchars($_POST['telephone']);
  $mail=htmlspecialchars($_POST['mail']);
  
  
$verif_img=getimagesize($_FILES['photo']['tmp_name']);

  if (isset($_FILES['photo']) AND $_FILES['photo']['error']== 0){
if ($_FILES['photo']['size'] <= 2000000){


$infosfichier = pathinfo($_FILES['photo']['name']);
$extension_upload = $infosfichier['extension'];
$extensions_autorisees = array('jpg', 'jpeg', 'gif','png','JPG','JPEG','GIF','PNG');
// if (in_array($extension_upload,$extensions_autorisees)){
  if ($verif_img AND $verif_img[2] < 4){
if(move_uploaded_file($_FILES['photo']['tmp_name'],'./images/'.$url_img)){
   require './config/database.php';
  
            $req=$db->prepare('INSERT INTO `personnel`(nom, postnom, prenom, sexe, datenaiss, etatcivil, adresse, telephone, mail, photo) VALUES (:nom, :postnom, :prenom, :sexe, :datenaiss, :etatcivil, :adresse, :telephone, :mail, :photo)');
            $req->execute(array(
            'photo' => $_FILES['photo']['name'],
            'nom' => $nom,            
            'postnom' => $postnom,            
            'prenom' => $prenom,            
            'sexe' => $sexe,            
            'datenaiss' => $datenaiss,            
            'etatcivil' => $etatcivil,            
            'adresse' => $adresse,            
            'telephone' => $telephone,            
            'mail' => $mail           
             ));
            
            header('location:personnel.php');
return true;

}

}


      }

      else{

          unlink($_FILES['photo']['tmp_name']);
          unset($_FILES['photo']);



      }
    }


}



if(imgup()){



}
// var_dump($_FILES);

?>