<?php 
require 'model/functions.php'; 

if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
    $post = getPostById($id);
    if(!isset($_SESSION['user'])||empty($_SESSION['user'])||$_SESSION['user']['id'] !== $post['author_id']){
        header('location:single.php?id='.$id.'&status=danger&message=Vous devez être l\'auteur pour éditer un article');
    }else{    
        if(isset($_POST)&&!empty($_POST)){
            $userId = $_SESSION['user']['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            if(isset($_FILES['image'])&&!empty($_FILES['image']['name'])){
                $image = $_FILES['image'];
                $upload_dir = 'assets/uploads/';
                $from = $image['tmp_name'];
                $lastDot = strrpos($image['name'], '.');
                $name = uniqid();
                $ext = substr($image['name'], $lastDot);
                $to = $upload_dir.$name.$ext;
                move_uploaded_file($from,$to);
                unlink($post['image']);
            }else{
                $to = $post['image'];
            }
            editPost($id, $title, $to, $content);
            header('location:single.php?id='.$id.'&status=success&message=Votre article a bien été mis à jour');
        }   
    } 
} 

require 'views/editPostView.php';

