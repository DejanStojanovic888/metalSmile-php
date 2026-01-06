<?php

isAdmin();

$id = $_GET["id"];

$statement = $pdo->prepare("SELECT * FROM patients WHERE id = ?");
$statement->execute([$id]);
$patient = $statement->fetch();   // samo jedan element. fetchAll() bi vracao vise elemenata

// Креирамо нову привремену табелу(тј. буџимо постојећу табелу termini) тако што покупимо 3 колоне из табеле termini па додамо нове две колоне под именом
// doktorka и service(у којима је редослед вредности дефинисан овако: users.id = termini.user_id
// и services.id = termini.service_id
$statement = $pdo->prepare("SELECT termini.id, termini.start_at, termini.end_at, 
                                    users.name AS doktorka, 
                                    services.name AS service
                                   FROM termini
                                    JOIN users ON users.id = termini.user_id
                                    JOIN services ON services.id = termini.service_id
                                   WHERE termini.patient_id = ?");
$statement->execute([$id]);
$termini = $statement->fetchAll();
//dd($termini);

view("admin/patient/profile.view", compact("patient", "termini"));