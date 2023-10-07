<?php
session_start();
include 'config/database.php';

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt=$db->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
    $stmt->execute([
        'username' => $username,
        'password' => $password
    ]);
    $user=$stmt->fetch();

    if($user)
    {
        $_SESSION['user_id']=$user['id'];
        $_SESSION['user_name']=$user['noms'];
        $_SESSION['user_role']=$user['role'];
        header('location:index.php');
    }
    else
    {
        header('location:login.php?error=1');
    }
}