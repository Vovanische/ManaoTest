<?php


$userData = [
    "login" => $_POST['login'],
    "password" => $_POST['password'],
    "confirmPassword" => $_POST['confirmPassword'],
    "email" => $_POST['email'],
    "name" => $_POST['name']
];


foreach ($userData as $userParam) {
    if ($userParam === "") {
        return print (json_encode("You've got an empty field!"));
    }
}

if ($userData["password"] !== $userData["confirmPassword"]) {
    return print (json_encode("Passwords do not match!"));
}

$salt = "Just_add_salt";
$userData["password"] = md5($salt . $userData["password"]);

$userUniqueData = [
    "login" => $userData["login"],
    "email" => $userData["email"]
];


function addUserToDB($userData, $userUniqueData)
{
    $xmlDB = simplexml_load_file("../xml/userDB.xml");

    foreach ($xmlDB->user as $user) {
        if ((string)$user->login === $userUniqueData["login"]) {
            return "User with this login already exists!";
        }

        if ((string)$user->email === $userUniqueData["email"]) {
            return "User with this email already exists!";
        }
    }

    $newUser = $xmlDB->addChild("user");

    $newUser->addChild("login", $userData["login"]);
    $newUser->addChild("password", $userData["password"]);
    $newUser->addChild("email", $userData["email"]);
    $newUser->addChild("name", $userData["name"]);

    $xmlDB->asXML("../xml/userDB.xml");

    return "Registration successful";
}

return print json_encode(addUserToDB($userData, $userUniqueData));

?>