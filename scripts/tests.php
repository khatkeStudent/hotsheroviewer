<html>
<head>
</head>
<body>
<?php
    include 'Database.inc';
    $db = new Database();
    
    try {
        echo "Test 1: Print levels<br />";
        $Test1Results = $db->getLevels("Abathur");
        foreach ($Test1Results as &$row) {
            echo "" . $row["level"] . "<br />";
        }
    } catch(Exception $ex) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
    try {
        echo "Test 2: Print Talents for level 1<br />";
        $Test2Talents = $db->getHeroTalentsByLevel("Abathur", "1");
        foreach ($Test2Talents as &$test2row) {
            echo "" . htmlentities($test2row["name"]) . "<br />";
        }
    } catch(Exception $ex) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    
?>

</body>
</html>