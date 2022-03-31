<?php
require "../config/config.inc.php";
require WAY."../includes/head.inc.php";

?>

<div class="row">
    <div class="header">
        <h3>Autorisations</h3>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        Mise en place des autorisations
    </div>
<div class="panel-body">
<form id="autorisation_form" action="./json/autorisation.json.php" method="post">
    <div class="form-group row">
        <label for="nom_aut" class="col-sm-2 col-form-label">
            Nom
        </label>
        <div class="col-sm-10">
            <input  type="text" class="form-control" id="nom_aut" name="nom_aut" placeholder="le nom de l'autorisation">
        </div>

    </div>
    <div class="form-group row">
        <label for="code_aut" class="col-sm-2 col-form-label">
            Code de l'autorisation
        </label>
        <div class="col-sm-4">
            <input  type="text" class="form-control" id="code_aut" name="code_aut" placeholder="Le code">
        </div>
    </div>
    <div class="form-group row">
        <label for="desc_aut" class="col-sm-2 col-form-label">
            Description de l'autorisation pour un administrateur
        </label>
        <div class="col-sm-10">
            <textarea  type="text" rows="3" class="form-control" id="desc_aut" name="desc_aut" placeholder="Description de l'autorisation pour l'admin"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="ut_desc_aut" class="col-sm-2 col-form-label">
            Description de l'autorisation pour l'utilisateur
        </label>
        <div class="col-sm-10">
            <textarea  type="text" rows="3" class="form-control" id="ut_desc_aut" name="ut_desc_aut" placeholder="Description de l'autorisation pour l'utilisateur"></textarea>
        </div>
    </div>
<!---->
<!--    <div class="form-group row">-->
<!--        <label for="desc_aut_usr" class="col-sm-2 col-form-label">-->
<!--            Description de l'autorisation un utilisateur-->
<!--        </label>-->
<!--        <div class="col-sm-10">-->
<!--            <textarea  type="text" rows="3" class="form-control" id="desc_aut" name="desc_aut" placeholder="Description de l'autorisation pour l'utilisateur"</textarea>-->
<!--        </div>-->
<!--    </div>-->

    <div class="form-group row">
        <div class="col-sm-8"></div>

        <div class="col-sm-2">
            <button class="btn btn-primary">Créer</button>
        </div>
        <div class="col-sm-2 ">
            <button class="btn btn-warning">Annuler</button>
        </div>
    </div>


</form>


</div>
    <script src="./js/autorisation.js"></script>