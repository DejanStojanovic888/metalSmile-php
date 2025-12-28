<?php


function dd($val) {
    echo "<pre>";
    var_dump($val);
    echo "</pre>";
    die();
}

function isAdmin() {
    // zabraniti nelogovanom da udje ovde promenom URL-a(to radimo preko sesije)
    if(!isset($_SESSION['user'])){
        header('Location: /');
    }
}

function base($path) {
    return ROOT . $path;
}

function view($path, $data = []) { //   $data = [] je default vrednost(u slucaju da ne posaljemo nista a ocekuje array)

    extract($data); // uzmi sve sto pise u array-u i napravi varijable(od key i value)
    //nikakve varijable odavde nece otici(jer su u okviru funkcije)
    // znaci moramo prvo da ovde rasporedimo varijable prvo( i zato imamo argument:  $data = [] )
    require base("views/$path.php");
}