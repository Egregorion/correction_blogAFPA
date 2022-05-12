<?php 
require 'model/functions.php'; 

if(isset($_GET)&& !empty($_GET)){
    $id = $_GET['id'];
    $posts = getPostsByCategoryId($id);
}

require 'views/categoryView.php';

