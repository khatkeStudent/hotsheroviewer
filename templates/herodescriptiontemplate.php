<?php

function printherodescription($hero) {
        echo "<div id=herodetailsportrait><img src=images\\portraits\\" . 
            $hero['icon'] . " /></div>";
        echo "<div id=divHeroInfo>";
        echo "<div><div class=divHeroLabels>Name:</div>";
        echo "<div class=divHeroValues>" . $hero['name'] . "</div></div>";
        echo "<div><div class=divHeroLabels>Title:</div>";
        echo "<div class=divHeroValues>" . $hero['title'] . "</div></div>";
        echo "<div><div class=divHeroLabels>Description:</div>";
        echo "<div class=divHeroValues>" . $hero['description'] . "</div></div>";
        echo "<div><div class=divHeroLabels>Franchise:</div>";
        echo "<div class=divHeroValues>" . $hero['franchise'] . "</div></div>";
        echo "<div><div class=divHeroLabels>Role:</div>";
        echo "<div class=divHeroValues>" . $hero['role'] . "</div></div>";
}

?>