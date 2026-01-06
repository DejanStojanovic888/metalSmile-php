<?php require base("views/partials/head.php") ?>
<?php require base("views/admin/partials/navbar.php") ?>

<div class="container">
    <div class="row pt-5">
        <?php require base("views/admin/partials/sidebar.php") ?>
        <div class="col-9">
            <h2><a href="/admin/patient/create" class="btn btn-danger">Add patient</a></h2>
            <div class="list-group">
                <?php foreach ($patients as $patient) : ?>
                <a href="/admin/patient/profile?id=<?= $patient->id ?>" class="list-group-item list-group-item-action"><?= $patient->name ?></a>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php require base("views/partials/bottom.php") ?>

