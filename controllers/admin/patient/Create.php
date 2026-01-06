<?php

isAdmin();

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // validate !!!!!!!
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $statement = "INSERT INTO patients (name, phone) VALUES (?,?)";
    $statement = $pdo->prepare($statement);
    $statement->execute([$name, $phone]);

    header('Location: /admin/dashboard');
}
//if($_SERVER['REQUEST_METHOD'] == 'POST'){
//    // validate !!!!!!!
//    if($_POST['name'] ?? false) {      // ranije se pisalo ovako: if(!isset($_POST['name']) && !empty($_POST['name'])) {
                                         // sada ova sintaksa: ($_POST['name'] ?? false)  zamenjuje ovo iznad
//        $name = $_POST['name'];
//    }else {
//        $errors[] = "Name is required";
//    }
//}


view("admin/patient/create.view");