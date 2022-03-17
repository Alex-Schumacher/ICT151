<pre>
<?php
session_start();

ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

require ("./config/config.inc.php");
require(WAY."./Includes/autoload.inc.php");
$per = new Personne(2);
$per->check_login("russell.westbrook@gmail.com","Password");
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$per = new Personne($_SESSION['id']);
if($per->check_connect()){
    echo "logué";
}else{
    echo "Pas logué";
}
?>
<a href="./controle_login.php">Logué ?</a>
<?php
/*
$per->set_nom("Saquet");
$per->set_prenom("Bilbo");
$per->set_email("bilbo.saquet@naz.ger");
echo $per->set_password("salut");
echo $per->set_news_letter(1);
*/




//echo $hash = password_hash($per->get_password(),PASSWORD_DEFAULT);
//
//if(password_verify($per->get_password(),$hash)){
//    echo "\nPassword Ok";
//}
$tab=array();
$tab['nom_per'] = "Westbrook";
$tab['prenom_per'] = "Russell";
$tab['email_per'] = "russell.westbrook@gmail.com";
$tab['news_letter_per'] = "1";
$tab['password_per'] = "Password";



if(!$per->check_email($tab['email_per'])){
    $per->add($tab);
}


?>
</pre>
