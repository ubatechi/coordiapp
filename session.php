<?php
session_start();
include 'config/database.php';

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt=$db->prepare("SELECT * FROM utilisateur WHERE email=:email AND password=:password");
    $stmt->execute([
        'email' => $email,
        'password' => $password
    ]);
    $user=$stmt->fetch();

    if($user)
    {
        $_SESSION['user_id']=$user['iduser'];
        $_SESSION['user_name']=$user['noms'];
        $_SESSION['user_role']=$user['idrole'];
        header('location:index.php');
    }
    else
    {
        header('location:login.php?error=1');
    }
}