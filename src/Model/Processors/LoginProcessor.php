<?php


use Minuz\Skolie\Infrastructure\ConnectionCreator;
use Minuz\Skolie\Model\Entities\Users\{Student, Teacher};

session_start();



// Return the login data of the user or false if the login doesn´t exists

function loginExists($login): array|false
{
    $PDO = ConnectionCreator::connect();
    
    
    $email = $login["email"];
    $password = $login["password"];
    
    $order = "
    SELECT name, id FROM school_database.logins logins 
    WHERE email = '$email' AND  password = '$password';
    ";
    
    $statement = $PDO->query($order);
    
    if (! $statement) {
        return false;
    }
    
    $loginInfo = $statement->fetch(PDO::FETCH_ASSOC);
    
    return $loginInfo;
}





//Defines main login info and user category

function defineUserLogin($loginData): string
{
    $id = $loginData["id"];
    
    if (preg_match("~^MR [0-9]{4}~", $id)) {
        $userType = "student";
    }
    elseif (preg_match("~^EN [0-9]{4}~", $id)) {
        $userType = "teacher";
    }
    
    $name = $loginData["name"];
    $id = $loginData["id"];
    $_SESSION["user"] = ["name" => $name, "id" => $id]; 


    return $userType;
}



function Login($login): string|false
{
    if (! $loginData = loginExists($login)) {
        return false;
    }

    $userType = defineUserLogin($loginData);

    return $userType;
}