<html>
<head>
	<title>Heroes Little Black Book</title>
    <?php
        @session_start();
        include 'templates/commonheaderstemplate.php'; 
    ?> 	
    
    <?php
        if (isset($_SESSION["username"])) {
            echo '<link rel="stylesheet" type="text/css" href="css\buildsloggedin.css" />';
        } 
    ?>
	<link rel="stylesheet" type="text/css" href="css\builds.css" />
    <link rel="stylesheet" type="text/css" href="css\herodetails.css" />
</head>

<body>
    <?php
        include 'scripts/navbar.php' ?> 	
    
    <div class="divContent">
        <ul>
            <?php 
                include 'templates/heroeslisttemplate.php';
                displayPortraits('builds.php');
            ?>
        </ul>    
        <?php 
            include "templates/talenttemplate.php";
            include "templates/talentleveltemplate.php";
            include "templates/herodescriptiontemplate.php";
            
            if (isset($_GET['heroid'])) {
                echo '<form action="scripts\buildsave_handler.php" method="post">';
                $db = new Database();
                $hero = $db->getHero($_GET['heroid']);
                echo '<input style="visibility:collapsed" name="heroid" value="'.
                        $_GET['heroid'] . '" />';
                echo "<div id=divHeroDetails>";
                printherodescription($hero);
                echo '</div>';
                echo '<div id=divHeroAbilities>';
                
                echo '<div class=divTable>';
                echo '<div class=divTableBody>';
                echo '<div class=divTableRow>';
                echo '<div class="divTableCell divColHeader">Level</div>';
                echo '<div class="divTableCell divColHeader">Description</div>';
                echo '</div>'; // Head header row
                
                $table = $db->getLevels($hero['id']);
                foreach ($table as &$row) {
                    printtalentlevel($hero['id'], $row["level"]);
                }
                
                echo '</div>'; // End divTableRow
                echo '</div>'; // End divTableBody
                echo '</div>'; // End divTable
                echo '</form>';
                
                echo '<div id=divBuildSubmit>';
                echo '<span>Build Name:</span>';
                echo '<input id="txtBuildName" type="text" name="txtBuildName" />';
                echo '<input id="btnSubmit" value="Save" type="Submit" name="btnSubmit" />';
                echo '</div>';
                
                echo '</div>';
            }
        ?>
    </div>

    <footer>
        <p>Copyright &copy; Kenneth Hatke</p>
    </footer>
</body>
</html>