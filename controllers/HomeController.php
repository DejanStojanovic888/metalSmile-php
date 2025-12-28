<?php

$errors = [];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["name"])){
        $name = $_POST["name"];
    }else{
        $errors[] = "Name is required";  // isto kao push metoda u JS-u
    }

    if(!empty($_POST["password"])){
        $password = $_POST["password"];
    }else{
        $errors[] = "Password is required";
    }

    if(count($errors) == 0){      // prazan array je falsy value u PHP-u
        $statement = $pdo->prepare("SELECT * FROM users WHERE name = :name AND password = :password");
        $statement->execute(["name" => $name, "password" => $password]);
        $user = $statement->fetch();

        if($user){
            $_SESSION['user'] = $user->name; // ovde je bolje staviti id zbog toga sto moze da ima vise korisnika sa istim imenom
//            setcookie("user", $user->name, time() + 3600); // expitation time za cookie. Mislim da je ovo drugi tip cookie-ja. Sat vremena i nestaje tj. 3600s.
              // MOJE: Ako ovo ne namestimo onda se gasenjem browsera gasi i cookie i brise fajl u sesiji. Kada upalimo opet browser opet mora da se uloguje.
            header('Location: /admin/dashboard');
        }else{
            $errors[] = "Invalid username or password";
        }
    }
}

view("home.view", compact("errors"));  // compact() je funkcija koja pravi assoc-array


//$name = "Danilo";
//$age = 25;

//view("home", ["name" => $name, "age" => $age ]);
//view("home", compact("name", "age")); // funkcija compact vraca assoc-array