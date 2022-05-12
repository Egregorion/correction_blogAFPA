<?php include 'partials/head.php' ?>

<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="title">Titre de l'article</label>
            <input id="title" type="text" name="title" class="form-control">
        </div>
        <div>
            <label for="image">Image à la une</label>
            <input id="image" name="image" type="file" class="form-control">
        </div>
        <div>
            <label for="content">Contenu de l'article</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="publier">
    </form>
</div>

<?php include 'partials/footer.php' ?>