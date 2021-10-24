<?= extend('/layout/head.php') ?>

<div class="container">
    <form action="" method="POST">
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input name="email" type="email" email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input name="password" type="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<a class="nav-link" href="/register">Registrarce</a>

<?= extend('/layout/footer.php') ?>