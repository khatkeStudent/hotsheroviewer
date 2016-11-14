<?php

function printtalent($talent) {
    echo "<div class=divTableRow>"; // Start Row
 
    echo '<div class="divTableCell divTalentSelect">' . 
            '<input type=radio name=level' . 
            htmlentities($talent['level']) . 
            ' id="' . htmlentities($talent['id']) . 
            '" value="' . htmlentities($talent['id']) . '" />' .
            '<label for=' . htmlentities($talent['id']) . 
            '><img class=imgTalents src="http://www.hotsitalia.com/heroesapi/B45024/buttons/' . 
            htmlentities($talent['icon']) . 
                '" title="' . htmlentities($talent['name']) . '" /></label>';
    echo '</div>';

    echo '<div class="divTableCell divTalentDescription">' . htmlentities($talent['description'])  . '</div>';
    echo '</div>'; // End  Row
}

function printselectedtalent($talent, $selectedtalent) {
    echo "<div class=divTableRow>"; // Start Row
    
    echo '<div class="divTableCell divTalentSelect">' . 
            '<input type=radio checked=checked name=level' . 
            htmlentities($talent['level']) .
            ' id="' . htmlentities($talent['id']) . 
            '" value="' . htmlentities($talent['id']) . '" />' .
            '<label for=' . htmlentities($talent['id']) . 
            '><img class=imgTalents src="http://www.hotsitalia.com/heroesapi/B45024/buttons/' . 
            htmlentities($talent['icon']) . 
                '" title="' . htmlentities($talent['name']) . '" /></label>';

    echo '</div>';

    echo '<div class="divTableCell divTalentDescription">' . htmlentities($talent['description'])  . '</div>';
    echo '</div>'; // End  Row
}
?>