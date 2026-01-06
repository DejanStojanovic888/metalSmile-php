<?php require base("views/partials/head.php") ?>
<?php require base("views/admin/partials/navbar.php") ?>

<div class="container">
    <div class="row pt-5">
        <?php require base("views/admin/partials/sidebar.php") ?>
        <div class="col-9">
            <h2>Add new patient</h2>
            <form method="post">
                <input type="text" class="form-control" name="name" placeholder="Name" required><br>
                <input type="text" class="form-control" name="phone" placeholder="Phone" required><br>
                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<?php require base("views/partials/bottom.php") ?>
