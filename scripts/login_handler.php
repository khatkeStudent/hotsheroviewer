<?php
@session_start();
include "Database.inc";

if (!isset($_POST["btnSubmit"])) {
    header("Location: ../login.php");
} else { 
    if (login()) {
        $_SESSION["username"] = $_POST["txtUsername"];
        header("Location: ../home.php");
    } else {
        header("Location: ../login.php");
    }
}

function login() {
    if (!isset($_POST["txtUsername"]) || $_POST["txtUsername"] == "") {
        $_SESSION["error"] = "Enter your username.";
        return false;
    } else {
        $_SESSION["tempusername"] = $_POST["txtUsername"];
    }
    
    if (!isset($_POST["txtPassword"]) ||
        $_POST["txtPassword"] == "") {
        $_SESSION["error"] = "Enter your password.";
        return false;
    } 
    
    $db = new Database();
    $result = $db->login($_POST["txtUsername"], hash("sha256", $_POST["txtPassword"], false));
    
    if (!isset($result) || $result["name"] == "") {
        $_SESSION["error"] = "Invalid username or password.";
        return false;
    } else {
        $_SESSION["name"] = $result["name"];
        $_SESSION["userid"] = $result["id"];
        $_SESSION["username"] = $result["username"];
        return true;
    }
}

?>