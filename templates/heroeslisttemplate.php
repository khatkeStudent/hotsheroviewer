<?php 
    include 'scripts/Database.inc';
    
    function displayPortraits($site) {
        $db = new Database();
        $heroes = $db->getHeroList();
        
        foreach ($heroes as &$hero) {
            echo "<li><a href=" . $site . "?heroid=" . $hero['id'] . "#divHeroDetails><img class=portrait title=" . $hero['name'] . " src=images\portraits\\" . $hero["name"] . 'portrait.png \></a>';
        }            
    }
?>