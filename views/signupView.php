<?php include 'partials/head.php'; ?>

<div class="container">
    <main class="form-signin text-center">
    <form action="" method="post">
        <img class="mb-4" src="assets/icones/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
        <div class="form-floating">
        <input name="pseudo" type="text" class="form-control" id="floatingInput" placeholder="Pseudo">
        <label for="floatingInput">Pseudo</label>
        </div>
        <div class="form-floating">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
        <p class="mt-5 mb-3 text-muted">&copy; AFPA 2022</p>
    </form>
    </main>
</div>

<?php include 'partials/footer.php' ?>; 