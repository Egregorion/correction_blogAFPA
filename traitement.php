<?php 

require 'model/functions.php'; 

if(isset($_POST)&& !empty($_POST)){
    $pseudo = $_POST['pseudo'];
    $comment = $_POST['comment'];
    $articleId = $_POST['article'];
    addComment($pseudo, $comment, $articleId);
}