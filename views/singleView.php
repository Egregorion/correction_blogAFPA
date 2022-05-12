<?php include 'partials/head.php'; ?>

<div class="banner">
    <img class="img-fluid" src="<?php echo $article['image']; ?>" alt="<?php echo $article['title']; ?>">
</div>
<div class="container">
    <div class="up">
        <h1 class="text-center"><?php echo $article['title']; ?></h1>
        <?php if($_SESSION['user']['id'] === $author['id']){ ?>
            <a class="btn btn-primary" href="editPost.php?id=<?php echo $id ?>">Editer</a>
            <a class="btn btn-danger" href="delete.php?id=<?php echo $id ?>">Effacer</a>
        <?php } ?>
        <h3><?php echo $author['pseudo']; ?></h3>
        <div>
            <?php echo $article['content']; ?>
        </div>
    </div>

    <div id="comments_list" class="list-group mt-3">
        <div >
            <span class="titre_commentaires">Commentaires</span>
            <span id="badge" class="badge bg-secondary"><?php echo count($comments) ?></span>
        </div>
        <div id="comments">
            <?php 
            foreach($comments as $comment){?>
            <div class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $comment['pseudo'] ?></h5>
                    <small><?php echo $comment['date'] ?></small>
                </div>
                <p class="mb-1"><?php echo $comment['content'] ?></p>
            </div>
            <?php } ?>
        </div>

    </div>
    <div class="jumbotron mt-3">
        <span class="titre_commentaires">Ajouter un commentaire</span>
        <form id="commentSubmit" action="traitement.php" method="post">
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo">
            </div>
            <div class="form-group">
                <label for="comment">Contenu</label>
                <textarea class="form-control" id="comment" name="comment"></textarea>
            </div>
            <input type="hidden" id="article_id" name="article_id" value="<?php echo $id ?>">
            <button class="btn btn-primary" type="submit">Envoyer</button>
        </form>
    </div>
</div>

<?php include 'partials/footer.php'; ?>