<?php

function printtalentlevel($hero, $level) {
    include 'Database.inc';
    $db = new Database();

    echo "<div class=divTableRow>";
    echo "<div class=\"divTableCell divRowHeader\">" . $level . "</div>";
    echo "<div class=divTableCell>";
    $talents = $db->getHeroTalentsByLevel($hero, $level);

    echo "<div class=divTable>"; // Start interior table
    echo "<div class=divTableBody>"; // Start interior body
    
    foreach ($talents as &$talent) {
        printtalent($talent);
    }

    echo "</div>"; // End interior Body
    echo "</div>"; // End interior Table

    echo "</div>"; // End Cell 1
    echo "</div>"; // End Row
}

function printselectedtalentlevel($hero, $level, $build) {
    include 'Database.inc';
    $db = new Database();

    echo "<div class=divTableRow>";
    echo "<div class=\"divTableCell divRowHeader\">" . $level . "</div>";
    echo "<div class=divTableCell>";
    $talents = $db->getHeroTalentsByLevel($hero, $level);

    echo "<div class=divTable>"; // Start interior table
    echo "<div class=divTableBody>"; // Start interior body
    
    foreach ($talents as &$talent) {
        if ($talent["id"] == $build["level".$level]) {
            printselectedtalent($talent);
        } else {
            printtalent($talent);
        }
    }

    echo "</div>"; // End interior Body
    echo "</div>"; // End interior Table

    echo "</div>"; // End Cell 1
    echo "</div>"; // End Row
}
?>