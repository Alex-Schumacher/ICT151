<?php
session_start();


require("./../../config/config.inc.php");
require(WAY."/includes/autoload.inc.php");

$aut = new Autorisation();

$tab = array();


if(!$aut->check_autorisation($_POST['code_aut'])){
    $aut->add($_POST);
    $tab['reponse'] = true;
    $tab['message']['texte'] = "Autorisation envoyée";
    $tab['message']['type'] = "success";
}else {
    $tab['reponse'] = false;
    $tab['message']['texte'] = "Cette autorisation existe déjà";
    $tab['message']['type'] = "danger";
}
echo json_encode($tab);