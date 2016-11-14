<html>
<head>
	<title>Heroes Little Black Book</title>
    <?php
        @session_start();
        include 'templates/commonheaderstemplate.php'; 
    ?> 	
    
	<link rel="stylesheet" type="text/css" href="css\home.css" />    
	<link rel="stylesheet" type="text/css" href="css\herodetails.css" />
    <link rel="stylesheet" type="text/css" href="css\buildsloggedin.css" />
</head>

<body>
    <?php
        @session_start();
        include 'scripts/navbar.php';
        include 'scripts/Database.inc'; 
        $db = new Database();
        ?> 	
        
	<div class="divContent">
        <fieldset>
            <legend>Saved Builds</legend>
            <form action="" method="post">
                <select name="buildid">
                    <option value="">--</option>
                    <?php
                        $results = $db->getBuildsByUser($_SESSION["userid"]);
                        
                        foreach ($results as &$result) {
                            echo '<option ';
                            
                            if (isset($_POST["buildid"]) &&
                                    $result["ID"] == $_POST["buildid"]) {
                                echo 'selected="selected" ';
                            }
                            
                            echo 'value=' . $result["ID"] . '>' . 
                                $result["name"] . '</option>';
                        }
                    ?>
                </select>
                <input type="submit" name="btnSubmit" value="Go" />
            </form>
        </fieldset>
        
        <?php 
            include "templates/talenttemplate.php";
            include "templates/talentleveltemplate.php";
            include "templates/herodescriptiontemplate.php";
            
            if (isset($_POST["buildid"])) {
                $build = $db->getBuildById($_POST["buildid"]);
                echo '<form action="scripts\builddelete_handler.php" method="post">';
                echo '<div id=divBuildSubmit>';
                echo htmlentities($build["name"]);
                echo '</div>';
                echo '<input style="visibility:hidden" name=buildid value='. $_POST["buildid"] . ' />';
                
                $hero = $db->getHeroByBuildId($_POST["buildid"]);
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
                    printselectedtalentlevel($hero['id'], $row["level"], $build);
                }
                
                echo '</div>'; // End divTableRow
                echo '</div>'; // End divTableBody
                echo '</div>'; // End divTable
                echo '<input id=btnDelete type="submit" value="Remove Build" name="btnDelete" />';
                echo '</form>';
                echo '</div>';
            }
        ?>
 
        <form action="scripts\logout_handler.php" method="post">
            <input name="btnLogout" class="btnsubmit" type="submit" value="Logout" />
        </form>
	</div>
    
    <footer>
        <p>Copyright &copy; Kenneth Hatke</p>
    </footer>
</body>
</html>