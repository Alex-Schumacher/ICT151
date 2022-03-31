<?php
header('Content-type: application/json');
session_start();


require("./../../config/config.inc.php");
require(WAY."/includes/autoload.inc.php");

$fnc = new Fonction();
$userFnc = new Fonction();
$tab = array();

$cacheArray = array();
$cacheArray['abr_fnc'] = "ADM_" . $_POST['abr_fnc'];
$cacheArray['desc_fnc'] = $_POST['desc_fnc'] . "-admin";
$cacheArray['nom_fnc'] = $_POST['nom_fnc'];




if(!$fnc->check_fonction($cacheArray['abr_fnc'])){
    $fnc->add($cacheArray);
    $cacheArray['abr_fnc'] = "USR_" . $_POST['abr_fnc'];
    $cacheArray['desc_fnc'] = $_POST['ut_desc_fnc'] . "-utilisateur";
    $userFnc->add($cacheArray);
    $tab['reponse'] = true;
    $tab['message']['texte'] = "Autorisation envoyée";
    $tab['message']['type'] = "success";
}else {
    $tab['reponse'] = false;
    $tab['message']['texte'] = "Cette autorisation existe déjà";
    $tab['message']['type'] = "danger";
}
echo json_encode($tab);