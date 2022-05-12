<?php 

session_start();
session_destroy();

header('location:index.php?status=success&message=Vous êtes bien déconnecté');