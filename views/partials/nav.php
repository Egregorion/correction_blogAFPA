<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">Mon super mini blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
                $categories = getAllCategories();
                foreach($categories as $category){ ?>
                    <li><a class="dropdown-item" href="category.php?id=<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a></li>
                <?php } 
            ?>
          </ul>
        </li>
        <?php 
        if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){?>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">Déconnexion</a>
          </li>
          <li class="nav-item">
            <a href="addPost.php" class="nav-link">Ajouter un article</a>
          </li>
        <?php }else{ ?>
        <li class="nav-item">
          <a href="signin.php" class="nav-link">Se connecter</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>