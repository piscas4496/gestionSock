<?php
      include 'config/database.php';
 
    if(isset($_POST['id']) && isset($_POST['noms']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){

    
        $id=$_POST['id'];
        $noms=$_POST['noms'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $role=$_POST['role'];

        if($_POST===null){
            $res="";
        }else{
            $stmt=$db->prepare("UPDATE users SET noms=:noms,username=:username,password=:password,role=:role WHERE id=:id");
            $stmt->execute([
                'noms'=>$noms, 
                'username'=>$username, 
                'password'=>$password, 
                'role'=>$role,
                'id'=>$id
            ]);
        }

	header('location:user.php'); 
	 
      
    }
?>