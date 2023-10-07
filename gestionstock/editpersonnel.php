<?php  

 function imgup()
{
  
  $url_img=basename($_FILES['photo']['name']);
  $nom=$_POST['nom'];
  $postnom=$_POST['postnom'];
  $prenom=$_POST['prenom'];
  $sexe=$_POST['sexe'];
  $datenaiss=$_POST['datenaiss'];
  $etatcivil=$_POST['etatcivil'];
  $adresse=$_POST['adresse'];
  $telephone=$_POST['telephone'];
  $mail=$_POST['mail']; 
  $id=$_POST['id']; 
  
  
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
  
            $stmt=$db->prepare('UPDATE personnel SET nom=:nom,postnom=:postnom,prenom=:prenom,sexe=:sexe,datenaiss=:datenaiss,etatcivil=:etatcivil,adresse=:adresse,telephone=:telephone,mail=:mail,photo=:photo WHERE id=:id');
            $stmt->execute(array(
            'photo' => $_FILES['photo']['name'],
            'nom' => $nom,
            'postnom'=>$postnom,
            'prenom'=>$prenom,
            'sexe'=>$sexe,
            'datenaiss'=>$datenaiss,
            'etatcivil'=>$etatcivil,
            'adresse'=>$adresse,
            'telephone'=>$telephone,
            'mail'=>$mail,
            'id'=>$id
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
    }else{
        require './config/database.php';
  
        $stmt=$db->prepare('UPDATE personnel SET nom=:nom,postnom=:postnom,prenom=:prenom,sexe=:sexe,datenaiss=:datenaiss,etatcivil=:etatcivil,adresse=:adresse,telephone=:telephone,mail=:mail WHERE id=:id');
        $stmt->execute(array(       
        'nom' => $nom,
        'postnom'=>$postnom,
        'prenom'=>$prenom,
        'sexe'=>$sexe,
        'datenaiss'=>$datenaiss,
        'etatcivil'=>$etatcivil,
        'adresse'=>$adresse,
        'telephone'=>$telephone,
        'mail'=>$mail,
        'id'=>$id
         ));
        
        header('location:personnel.php');
        return true;
    }
}



if(imgup()){



}
// var_dump($_FILES);

?>