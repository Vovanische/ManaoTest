<?php


function authenticateUser()
{
    $salt = "Just_add_salt";

    $authenticationData = [
        "authLogin" => $_POST["authLogin"],
        "authPassword" => $_POST["authPassword"]
    ];

    foreach ($authenticationData as $authenticationParam) {
        if ($authenticationParam === "") {
            return "You has an empty Authentication field!";
        }
    }

    $checkLogin = false;
    $checkPassword = false;
    $userIndex = -1;
    $targetUserIndex = 0;
    $xmlDB = simplexml_load_file("../xml/userDB.xml");

    foreach ($xmlDB->user as $user) {
        $userIndex++;
        if ((string)$user->login === $authenticationData["authLogin"]) {
            $checkLogin = true;
            $targetUserIndex = $userIndex;
        }
    }

    if (!$checkLogin) {
        return "You enter wrong Login!";
    }

    if ($checkLogin) {
        $protectedAuthPassword = md5($salt . $authenticationData["authPassword"]);

        if ($protectedAuthPassword === (string)$xmlDB->user[$targetUserIndex]->password) {
            $checkPassword = true;
        }

        if (!$checkPassword) {
            return "You enter wrong Password!";
        }
        if ($checkPassword) {

            $authenticateUserLogin = $authenticationData["authLogin"];
            $authenticateUserPassword = md5($salt . $authenticationData["authPassword"]);
            $dayInSeconds = 86400;
            $cookieLifeTime = $dayInSeconds;
            setcookie("authenticateUserLogin", $authenticateUserLogin, time() + $cookieLifeTime);
            setcookie("authenticateUserPassword", $authenticateUserPassword, time() + $cookieLifeTime);
            return $_COOKIE["authenticateUserLogin"];

            session_start();
            $_SESSION["authenticateUserIndexInDB"] = $targetUserIndex;

            $xmlDB = simplexml_load_file("../xml/userDB.xml");

            $activeUser = $xmlDB->user[$targetUserIndex];
            $activeUser->addChild("active", "true");

            $xmlDB->asXML("../xml/userDB.xml");

            return "Hello " . $authenticationData["authLogin"];
        }
    }

    return "All is fine!";
}

return print json_encode(authenticateUser());

?>