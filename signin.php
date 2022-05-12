<?php 
require 'model/functions.php'; 

if(isset($_POST) && !empty($_POST)){
    $email = htmlspecialchars($_POST['email']);
    $entering_password = htmlspecialchars($_POST['password']);
    //etape 1 : récupérer les données de l'utilisateur
    $userInfos = getUserInfosByMail($email);
    //etape 2 : comparer le mot de pass saisie avec celui de la base, problème celui ci est chiffré => password_verify
    $hashed_password = $userInfos['password'];
    $isConfirmed = password_verify($entering_password, $hashed_password);
    if($isConfirmed){
        session_start();
        $_SESSION['user'] = $userInfos;
        header('location:index.php?status=success&message=Vous êtes bien connecté');
    }
}

require 'views/signinView.php';



