<?php require base("views/partials/head.php") ?>
<div class="login-div">
<!--    namerno ostavljamo da ide na istu stranicu sa forme-->
    <form action="/" method="post">
        <input type="text" name="name" placeholder="Name" class="form-control"><br>
        <input type="password" name="password" placeholder="Password" class="form-control"><br>
        <button class="form-control btn btn-primary">Log in</button>
        <?php if($errors) : ?>
            <p class="text-dark">Login failed!</p>
        <?php endif ?>
    </form>
</div>
<?php require base("views/partials/bottom.php") ?>

