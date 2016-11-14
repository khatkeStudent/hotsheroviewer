<?php
    @session_start();
    include 'Build.inc';
    include 'Database.inc';
    $build = new Build();
    
if (!isset($_SESSION["userid"])) {
    header("Location: ../login.php");
} else {
    if (savebuild()) {
        header("Location: ../home.php");
    } else {
        $_SESSION['error'] = "Unable to save build.";
        header("Location: ../build.php");
    }
}
    
function savebuild() {
    if (isset($_POST["buildid"])) {
        $build->id = $_POST["buildid"];
    }
    
    $build->name = htmlentities($_POST["txtBuildName"]);
    $build->heroid = $_POST["heroid"];
    $build->userid = $_SESSION["userid"];
    $build->level1 = $_POST["level1"];
    $build->level4 = $_POST["level4"];
    $build->level7 = $_POST["level7"];
    $build->level10 = $_POST["level10"];
    $build->level13 = $_POST["level13"];
    $build->level16 = $_POST["level16"];
    $build->level20 = $_POST["level20"];
    
    $db = new Database();
    $db->saveBuild($build);

    return true;
}
?>