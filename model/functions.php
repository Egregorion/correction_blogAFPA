<?php 

require 'connection.php';
session_start();

function getAllArticles(){
    $db = dbconnect();
    $query = $db->query('SELECT * FROM articles');
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getAllCategories(){
    $db = dbconnect();
    $query = $db->query('SELECT * FROM categories');
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function register($pseudo, $email, $password){
    $db = dbconnect();
    $query = $db->exec("INSERT INTO users VALUES (null, '$pseudo', '$email', '$password')");
}

function getUserInfosByMail($email){
    $db = dbconnect();
    $query = $db->query("SELECT * FROM users WHERE users.email='$email'");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getPostsByCategoryId($categoryId){
    $db = dbconnect();
    $query = $db->query("SELECT * FROM articles INNER JOIN article_category ON articles.id = article_category.article_id INNER JOIN categories ON article_category.category_id = categories.id WHERE categories.id = $categoryId");
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getPostById($postId){
    $db = dbconnect();
    $query = $db->query("SELECT * from articles WHERE id=$postId");
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result;
}

//récupérer l'auteur d'un article
function getPostAuthorByPostId($id){
    $db = dbconnect();
    $query = $db->query("SELECT users.id, users.pseudo FROM users INNER JOIN articles ON articles.author_id = users.id WHERE articles.id ='$id'");
    $auteur = $query->fetch(PDO::FETCH_ASSOC);
    return $auteur;
}

//récupérer les commentaires d'un article par son id
function getPostCommentsByPostId($id){
    $db = dbconnect();
    $query = $db->query("SELECT commentaires.pseudo, commentaires.content, commentaires.date FROM `commentaires` INNER JOIN articles ON commentaires.article_id = articles.id WHERE articles.id = '$id'");
    $comments = $query->fetchAll(PDO::FETCH_ASSOC);
    return $comments;
}

//ajouter un commentaire dans un article
function addComment($pseudo, $comment, $articleId){
    $db = dbconnect();
    $query = $db->prepare("INSERT INTO commentaires(pseudo, content, article_id) VALUES(:pseudo, :content, :article_id)");
    $query->bindParam(':pseudo', $pseudo);
    $query->bindParam(':content', $comment);
    $query->bindParam(':article_id', $articleId);
    $query->execute();
}

function addPost($title, $author, $image, $content){
    $db = dbconnect();
    $query = $db->prepare("INSERT INTO articles(title, author_id, image, content) VALUES(:title, :author_id, :image, :content)");
    $query->bindParam(':title', $title);
    $query->bindParam(':author_id', $author);
    $query->bindParam(':image', $image);
    $query->bindParam(':content', $content);
    $query->execute();
}

function editPost($id, $title, $image, $content){
    $db = dbconnect();
    $query = $db->prepare("UPDATE articles SET title=:title, image=:image, content=:content WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->bindParam(':title', $title);
    $query->bindParam(':image', $image);
    $query->bindParam(':content', $content);
    $query->execute();
}

function deletePostCommentariesByPostId($id){
    $db = dbconnect();
    $query = $db->exec("DELETE FROM commentaires WHERE article_id=$id");
}

function deletePost($id){
    $db = dbconnect();
    $query = $db->exec("DELETE FROM articles WHERE id=$id");
}

