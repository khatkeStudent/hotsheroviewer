<?php
    @session_start();
    include 'Database.inc';
    
if (!isset($_SESSION["userid"])) {
    header("Location: ../login.php");
} else {
    if (removebuild()) {
        header("Location: ../home.php");
    } else {
        $_SESSION['error'] = "Unable to save build.";
        header("Location: ../home.php");
    }
}
    
function removebuild() {
    if (isset($_POST["buildid"])) {
        $db = new Database();
        $db->deleteBuild($_POST["buildid"]);
    }
    
    return true;
}
?>