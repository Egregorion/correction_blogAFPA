<?php 
require 'model/functions.php'; 

if(!isset($_SESSION['user'])||empty($_SESSION['user'])){
    echo "Vous devez être connecté pour ajouter un article";
}else{
    if(isset($_POST)&&!empty($_POST)){
        $userId = $_SESSION['user']['id'];
        $title = $_POST['title'];
        $image = $_FILES['image'];
        $content = $_POST['content'];
        $upload_dir = 'assets/uploads/';
        $from = $image['tmp_name'];
        $lastDot = strrpos($image['name'], '.');
        $name = uniqid();
        $ext = substr($image['name'], $lastDot);
        $to = $upload_dir.$name.$ext;
        move_uploaded_file($from,$to);
        addPost($title, $userId, $to, $content);
        header('location:index.php?status=success&message=Votre article a bien été enregistré');
    } 
} 

require 'views/addPostView.php';

