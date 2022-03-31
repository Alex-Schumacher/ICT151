<?php
header('Content-type: application/json');
session_start();


require("./../../config/config.inc.php");
require(WAY."/includes/autoload.inc.php");

$aut = new Autorisation();
$userAut = new Autorisation();
$tab = array();


$cacheArray = array();
/*
$cacheArray['abr_fnc'] = "ADM_" . $_POST['abr_fnc'];
$cacheArray['desc_fnc'] = $_POST['desc_fnc'] . "-admin";
$cacheArray['nom_fnc'] = $_POST['nom_fnc'];*/
$cacheArray['nom_aut'] =  $_POST['nom_aut'];
$cacheArray['code_aut'] ="ADM_" . $_POST['code_aut'];
$cacheArray['desc_aut'] = $_POST['desc_aut'] . "-admin";




if(!$aut->check_autorisation($cacheArray['code_aut'])){
    $aut->add($cacheArray);
    $cacheArray['code_aut'] ="USR_" . $_POST['code_aut'];
    $cacheArray['desc_aut'] = $_POST['ut_desc_aut'] . "-user";
    $userAut->add($cacheArray);
    $tab['reponse'] = true;
    $tab['message']['texte'] = "Autorisation envoyee";
    $tab['message']['type'] = "success";
}else {
    $tab['reponse'] = false;
    $tab['message'] = array();
    $tab['message']['texte'] = "Cette autorisation existe ";
    $tab['message']['type'] = "danger";
}
echo json_encode($tab);