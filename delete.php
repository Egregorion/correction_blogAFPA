<?php 
require 'model/functions.php'; 

if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
    $post = getPostById($id);
    $image = $post['image'];
    unlink($image);
    deletePostCommentariesByPostId($id);
    deletePost($id);
    header('location:index.php?status=success&message=L\'article a bien été supprimé');
}