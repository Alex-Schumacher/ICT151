<?php
session_start();
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);


require ("./config/config.inc.php");
require("./class/Personne.class.php");


$per = new Personne($_SESSION['id']+1);
// si le code au dessus ne marche pas, utilise ce code : $_SESSION['login_string'] = 'changed';
if($per->check_connect()){
    echo "logué";
}else{
    echo "Pas logué";
}

?>