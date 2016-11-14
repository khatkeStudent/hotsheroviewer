<html>
<head>
	<title>Heroes Little Black Book</title>
    <?php
        include 'templates/commonheaderstemplate.php'; 
    ?> 	
    <link rel="stylesheet" type="text/css" href="css\heroes.css" />
    <link rel="stylesheet" type="text/css" href="css\herodetails.css" />
    <script src="js\index.js"></script>
</head>

<body>
    <?php
        @session_start();
        include 'scripts/navbar.php'; 
    ?> 	
    
    <div class="divContent">
        <ul>
            <?php 
                include 'templates/heroeslisttemplate.php';
                displayPortraits('index.php');
            ?>
        </ul>    
        <?php 
            include ("templates/abilitytemplate.php");
            include ("templates/herodescriptiontemplate.php");
            
            
            if (isset($_GET['heroid'])) {
                $db2 = new Database();
                $hero = $db2->getHero($_GET['heroid']);
                echo "<div id=divHeroDetails>";
                printherodescription($hero);
                echo "</div>";
                echo "<div id=divHeroAbilities>";
                $abilities = $db2->getHeroAbilities($_GET['heroid']);
                
                echo "<div class=divTable>";
                echo "<div class=divTableBody>";
                echo "<div class=divTableRow>";
                echo "<div class=\"divTableCell divColHeader\">Ability</div>";
                echo "<div class=\"divTableCell divColHeader\">Shortcut</div>";
                echo "<div class=\"divTableCell divColHeader\">Description</div>";
                echo "<div class=\"divTableCell divColHeader\">Cooldown</div>";
                echo "</div>";
                
                foreach ($abilities as &$ability) {
                    printability($ability);
                    
                    /*echo "<div>Ability: " . $ability['name'] . "</div>";
                    echo "<div>Shortcut: " . $ability['shortcut'] . "</div>";
                    echo "<div>Description: " . $ability['description'] . "</div>";
                    echo "<div>Cooldown: " . $ability['cooldown'] . "</div>";
                    echo "<div>Cost: " . $ability['manaCost'] . "</div>";
                    */
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        ?>
    </div>

    <footer>
        <p>Copyright &copy; Kenneth Hatke</p>
    </footer>
</body>
</html>