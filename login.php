<?php
require "./config/config.inc.php";
require WAY."/includes/head.inc.php";

?>
<!--<script src="./js/login.js"></script> -->
<div class="row">
<div class="header">
    <h3>Connexion</h3>
</div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        Connexion au portail de jeux
    </div>
    <div class="panel-body">
        <form id="connexion_form">
            <div class="form-group row">
                <label for="email_per" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email_per" name="email_per" placeholder="votre adresse email">
                </div>
            </div>
            <div class="form-group row">
                <label for="password_per" class="col-sm-2 col-form-label">Mot de passe</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password_per" name="password_per" placeholder="Votre mot de passe">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-offset-4 col-sm-2">
                    <input type="submit" class="form-control btn btn-primary submit" id="submit_conf" value="se connecter">
                </div>
                <div class="col-sm-2">
                    <input type="reset" class="form-control btn btn-warning" id="reset_conf" value="Annuler">
                </div>
                <div class="col-sm-2">
                    <a href="inscription.php" class="form-control btn btn-default" value="">S'inscrire</a>
                </div>
            </div>

        </form>
    </div>



</div>
<div class="panel-footer"></div>