<?php include 'partials/head.php' ?>

<div class="container mt-5">
    <div class="row">
    <?php foreach($articles as $post){?>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <img src="<?php echo $post['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['title'] ?></h5>
                    <a href="single.php?id=<?php echo $post['id'] ?>" class="btn btn-primary">Voir l'article</a>
                </div>
            </div>
        </div>
    <?php } ?> 
    </div>
</div>    

<?php include 'partials/footer.php' ?>