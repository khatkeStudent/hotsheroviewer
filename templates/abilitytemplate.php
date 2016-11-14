<?php

function printability($ability) {
    echo "<div class=divTableRow>";
    echo "<div class=divTableCell>" . $ability['name'] . "</div>";
    echo "<div class=divTableCell>" . $ability['shortcut'] . "</div>";
    echo "<div class=divTableCell>" . $ability['description'] . "</div>";
    echo "<div class=divTableCell>" . $ability['cooldown'] . "</div>";
    echo "</div>";
}

?>