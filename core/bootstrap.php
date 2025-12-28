<?php

session_start();

define("ROOT", dirname(__DIR__) . "/");

$pdo = new PDO("mysql:host=localhost;dbname=metal", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);


require ROOT . "core/utils.php";

require base("router/index.php");