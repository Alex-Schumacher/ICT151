<pre>
<?php
require ("./config/config.inc.php");
require("./class/Personne.class.php");

$per = new Personne();

$per->set_nom("Saquet");
$per->set_prenom("Bilbo");
$per->set_email("bilbo.saquet@naz.ger");
echo $per->set_password("Pa/w0rd$");
echo $per->set_news_letter(1);

echo $per;
?>
</pre>
