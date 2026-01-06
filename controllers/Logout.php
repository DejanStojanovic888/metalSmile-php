<?php

session_destroy(); // MOJE: unisti sesiju samo za jednog korisnika kod nas na serveru(u browseru ostaje PHPSESSID i value isti posle kliktanja dugmeta Logout) i on vise ne moze da ide na stranicu /admin/dashboard
//unset($_SESSION['user']);  ako hocemo da ubijemo samo jedan key
// register nismo radili jer je on jako prost. Samo uzmemo username i password i stavimo u bazu

header("location: /");
exit();  // tehnicki znaci die. Da nikada ne ide dalje kod.


// Odemo na Settings > Languages & Frameworks > JavaScript > Libraries pa ukljucimo bootstrap(ima i za HTML koji je vec bio ukljucen po defaultu)
