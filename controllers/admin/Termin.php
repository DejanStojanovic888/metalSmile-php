<?php

isAdmin();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $patient_id = $_POST['patient_id'];
    $service_id = $_POST['service_id'];
    $user_id = $_POST['user_id'];
    $start_at = $_POST['start_at'];
    $end_at = $_POST['end_at'];

    $checkStatement = $pdo->prepare("SELECT * FROM termini WHERE termini.user_id = ?
    AND start_at < ? AND end_at > ?");
    $checkStatement->execute([$user_id, $end_at, $start_at]);

    $oldTermini = $checkStatement->fetchAll();
//    dd($oldTermini);

    if(count($oldTermini) > 0){
        dd("Upssss vec ima termina u ovom vremenu");
    }else{
        //mislim da ovde  treba provera pre INSERTovanja, da vidimo da li smo zadali greskom da kraj
        // termina bude manji od pocetka termina). Tu bi nam trebao TIMESTAMP
        // plus provera da pocetak termina nije manji od sadasnjeg vremena
        // Molimo popunite oba vremena start i end
        $statement = $pdo->prepare("INSERT INTO termini (patient_id, service_id, user_id, start_at, end_at) VALUES (?,?,?,?,?)");
        $statement->execute([$patient_id, $service_id, $user_id, $start_at, $end_at]);
        header('Location: /admin/dashboard');
    }
}

$id = $_GET['id'];

$statement = $pdo->prepare("SELECT * FROM services");
$statement->execute();
$services = $statement->fetchAll();

$statement = $pdo->prepare("SELECT * FROM users");
$statement->execute();
$users = $statement->fetchAll();

view("admin/termin.view", compact("id", "services", "users"));