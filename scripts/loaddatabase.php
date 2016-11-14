<?php

include "Database.inc";
$db = new Database();

$json = file_get_contents('http://heroesjson.com/heroes.json');
$obj = json_decode($json);
//$db->cleardb();

foreach ($obj as &$value) {
    $heroid = $value->id;
    $value->name = str_replace('\'','',$value->name);
    $value->name = str_replace('-','',$value->name);
    $value->name = str_replace('.','',$value->name);
    $value->name = str_replace(' ','',$value->name);
    $value->icon = $value->name . "Portrait.png";
    //$db->uploadhero($value);
    foreach ($value->abilities as $target => $abilitylist) {
        foreach ($abilitylist as &$ability) {
            $ability->manacost = $abilitylist["manaCost"];
            $ability->heroid = $value->id;
            $heroid = $ability->heroid;
            $ability->hero = $target;
            $ability->icon = str_replace('dds','jpg',$ability->icon);
            
            if ($ability->cooldown < 1) {
                $ability->cooldown = 0;
            }
            
            if ($ability->manacost < 1) {
                $ability->manacost = 0;
            }
            
            $db->uploadAbility($ability);
        }
    }
    /*foreach ($value->talents as $target => $talentlist) {
        foreach ($talentlist as &$talent) {
            $talent->heroid = $heroid;
            $talent->hero = $value->name;
            $talent->level = $target;
            
            if ($talent->cooldown < 1) {
                $talent->cooldown = 0;
            }
            
            if ($talent->cooldown < 1) {
                $talent->cooldown = 0;
            }
            
            if ($talent->manaCost < 1) {
                $talent->manaCost = 0;
            }
            
            $talent->icon = str_replace("dds","jpg",$talent->icon);
            $db->uploadTalent($talent);
        }
    }
    */
}
?>