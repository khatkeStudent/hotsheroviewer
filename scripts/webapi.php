<?php
function populatedatabase() {
    $string = file_get_contents("../data/heroes.json");
    $json = json_decode($string, true);
    
}
  
?>