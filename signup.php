<?php 
require 'model/functions.php'; 

if(isset($_POST) && !empty($_POST)){
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['email']);
    $password_clean = htmlspecialchars($_POST['password']);
    $hashed_password = password_hash($password_clean, PASSWORD_BCRYPT);  
    register($pseudo, $email, $hashed_password);  
}

require 'views/signupView.php';
