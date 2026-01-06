<?php require base("views/partials/head.php") ?>
<?php require base("views/admin/partials/navbar.php") ?>

<div class="container">
    <div class="row pt-5">
        <?php require base("views/admin/partials/sidebar.php") ?>
        <div class="col-9">
            <h2>Dodaj Novi Termin</h2>
            <form action="" method="post">
                <!--  hidden-->
                <input type="hidden" name="patient_id" value="<?= $id ?>" class="form-control"> <br>
                <label for="services">Services</label>
                <select name="service_id" id="services" class="form-control">
                    <?php foreach ($services as $service): ?>
                        <!--    Ovde u value stavljamo id a u tekst stavljamo name jer je u bazi tabela termini takva -->
                        <option value="<?= $service->id ?>"><?= $service->name ?></option>
                    <?php endforeach; ?>
                </select><br>
                <label for="users">Users</label>
                <select name="user_id" id="users" class="form-control">
                    <?php foreach($users as $user): ?>
                        <!--    Ovde u value stavljamo id a u tekst stavljamo name  -->
                        <option value="<?= $user->id ?>"><?= $user->name ?></option>
                    <?php endforeach; ?>
                </select><br>
                <h4>Start Termina</h4>
                <!--  input type="datetime-local"-->
                <input type="datetime-local" name="start_at" class="form-control"><br>
                <!--  mora button type="submit"-->
                <h4>Kraj Termina</h4>
                <input type="datetime-local" name="end_at" class="form-control"><br>
                <button type="submit" class="btn btn-primary">Dodaj Termin</button>
            </form>
        </div>
    </div>
</div>

<?php require base("views/partials/bottom.php") ?>

