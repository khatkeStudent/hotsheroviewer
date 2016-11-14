<?php
@session_start();
include "Database.inc";
include "User.inc";

if (validateForm()) {
    echo "Creating Account<br />";
    
    $user = new User();
    $user->name = $_POST["txtName"];
    $user->username = $_POST["txtUsername"];
    $user->email = $_POST["txtEmailAddress"];
    $user->password = hash("sha256", $_POST["txtPassword"], false);

    $database = new Database();
    $database->createUser($user);
    echo "db done<br />";
} else {
    header("Location: ../createaccount.php");
}

function validateForm() {
    if ($_POST["btnSubmit"] == null) {
        $_SESSION["error"] = "<li>Not Submitted";
        return false;
    }  else {
        unset($_SESSION["error"]);
    }
    
    if ($_POST["txtName"] == "") {
        $_SESSION["error"] = $_SESSION["error"] . "Enter your name.";
        unset($_SESSION["txtName"]);
    } else {
        if (isset($_SESSION["txtName"])) { unset($_SESSION["txtName"]); }
        $_SESSION["txtName"] = htmlentities($_POST["txtName"]);
    }
    
    if ($_POST["txtEmailAddress"] == ""){
        $_SESSION["error"] = $_SESSION["error"] . "<li>Enter your Email Address.";
        unset($_SESSION["txtEmailAddress"]);
    } else {
        if (isset($_SESSION["txtEmailAddress"])) { unset($_SESSION["txtEmailAddress"]); }
        $_SESSION["txtEmailAddress"] = $_POST["txtEmailAddress"];
    }
    
    if ($_POST["txtUsername"] == ""){
        $_SESSION["error"] = $_SESSION["error"] . "<li>Choose a username.";
        unset($_SESSION["txtUsername"]);
    } else {
        if (isset($_SESSION["txtUsername"])) { unset($_SESSION["txtUsername"]); }
        $_SESSION["txtUsername"] = $_POST["txtUsername"];
    }
    
    if ($_POST["txtPassword"] == "" || $_POST["txtConfirmPassword"] == ""){
        $_SESSION["error"] = $_SESSION["error"] . "<li>Enter and confirm a password.";
    } else if ($_POST["txtPassword"] === $_POST["txtConfirmPassword"]) {
        if (!preg_match("^[a-zA-Z0-9]{4,30}$", $_POST["txtPassword"])) { // Must be at least 8 to 20 characters
            $_SESSION["error"] = $_SESSION["error"] . "<li>Password does not meet the minimum requirements.";
        }
    } else {
        $_SESSION["error"] = $_SESSION["error"] . "<li>Passwords do not match.";
    }
    
    return $_SESSION["error"] == "";
}

?>