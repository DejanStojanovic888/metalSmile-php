<?php

isAdmin();

$statement = $pdo->prepare("SELECT * FROM patients");
$statement->execute();
$patients = $statement->fetchAll();

view("admin/dashboard.view",  compact('patients'));