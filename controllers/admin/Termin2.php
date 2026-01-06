<?php

isAdmin();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $patient_id = $_POST['patient_id'] ?? null;
    $service_id = $_POST['service_id'] ?? null;
    $user_id = $_POST['user_id'] ?? null;
    $start_input = $_POST['start_at'] ?? '';
    $end_input = $_POST['end_at'] ?? '';

    // parse html datetime-local (with or without seconds)
    $parse = function($s){
        foreach (['Y-m-d\TH:i:s','Y-m-d\TH:i'] as $fmt){
            $d = DateTime::createFromFormat($fmt, $s);
            if ($d) return $d;
        }
        return false;
    };

    $start_dt = $parse($start_input);
    $end_dt   = $parse($end_input);

    if (!$start_dt || !$end_dt){
        dd("Molimo popunite oba vremena start i end u ispravnom formatu.");
    }

    if ($end_dt <= $start_dt){
        dd("Kraj termina mora biti posle pocetka.");
    }

    $now = new DateTime();
    if ($start_dt < $now){
        dd("Pocetak termina ne moze biti u proslosti.");
    }

    $start_at = $start_dt->format('Y-m-d H:i:s');
    $end_at   = $end_dt->format('Y-m-d H:i:s');

    // overlap check (works if DB columns are DATETIME)
    $checkStatement = $pdo->prepare("SELECT * FROM termini WHERE user_id = ? AND start_at < ? AND end_at > ?");
    $checkStatement->execute([$user_id, $end_at, $start_at]);
    $oldTermini = $checkStatement->fetchAll();

    if(count($oldTermini) > 0){
        dd("Upssss vec ima termina u ovom vremenu");
    }else{
        $statement = $pdo->prepare("INSERT INTO termini (patient_id, service_id, user_id, start_at, end_at) VALUES (?,?,?,?,?)");
        $statement->execute([$patient_id, $service_id, $user_id, $start_at, $end_at]);
        header('Location: /admin/dashboard');
        exit;
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