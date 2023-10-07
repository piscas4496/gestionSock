<?php
  include 'config/database.php';

    if(isset($_POST['noms']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){

        $noms=$_POST['noms'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $role=$_POST['role'];

            $stmt=$db->prepare("CALL pro_users(:noms, :username, :password, :role);");
            $stmt->execute([
                'noms'=>$noms, 
                'username'=>$username, 
                'password'=>$password, 
                'role'=>$role
            ]);

		header('location:user.php'); 
			 
        
    }

?>