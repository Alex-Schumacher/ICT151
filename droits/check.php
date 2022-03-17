<?php
session_start();
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);


require ("./config/config.inc.php");
require(WAY."./Includes/autoload.inc.php");
/*
$per = new Autorisation($_SESSION['id']);
if(!$per->check_email($tab['email_per'])){
    $per->add($tab);
}
*/