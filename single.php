<?php 
require 'model/functions.php';

if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
    $article = getPostById($id);
    $author = getPostAuthorByPostId($id);
    $comments = getPostCommentsByPostId($id);
} else {
    header('location:single.php?id=1');
}

require 'views/singleView.php';
