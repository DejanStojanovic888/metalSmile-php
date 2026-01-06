<?php require base("views/partials/head.php") ?>
<?php require base("views/admin/partials/navbar.php") ?>

<div class="container">
    <div class="row pt-5">
        <?php require base("views/admin/partials/sidebar.php") ?>
        <div class="col-9">
            <h2><?= $patient->name ?> Profile</h2>
            <div class="list-group">
                <div class="list-group-item"><strong>Name:</strong> <?= $patient->name ?></div>
                <div class="list-group-item"><strong>Phone:</strong> <?= $patient->phone ?></div>
                <div class="list-group-item"><a href="/admin/termin?id=<?= $patient->id ?>" class="btn btn-danger">Novi termin</a></div>
                <div class="list-group">
                    <div class="list-group-item"><strong>TERMINI:</strong></div>
                    <?php foreach($termini as $termin): ?>
                        <div class="list-group-item"><?= date("d.m.Y H:i", strtotime($termin->start_at)) ?>
                            <span class="badge bg-primary"><?= $termin->doktorka ?></span>
                            <span class="badge bg-primary"><?= $termin->service ?></span>
                        </div>
                    <?php endforeach ?>
                </div>

            </div>

        </div>
    </div>
</div>

<?php require base("views/partials/bottom.php") ?>
