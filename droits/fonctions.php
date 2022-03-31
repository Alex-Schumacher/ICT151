<?php
require "../config/config.inc.php";
require WAY."../includes/head.inc.php";

?>

<div class="row">
    <div class="header">
        <h3>Fonctions</h3>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        Mise en place des autorisations
    </div>
    <div class="panel-body">
        <form id="fonction_form" action="<?= ROOT ?>droits/json/fonction.json.php" method="post">
            <div class="form-group row">
                <label for="nom_fnc" class="col-sm-2 col-form-label">
                    Nom
                </label>
                <div class="col-sm-10">
                    <input  type="text" class="form-control" id="nom_fnc" name="nom_fnc" placeholder="le nom de la fonction">
                </div>

            </div>
            <div class="form-group row">
                <label for="abr_fnc" class="col-sm-2 col-form-label">
                    Abréviation
                </label>
                <div class="col-sm-4">
                    <input  type="text" class="form-control" id="abr_fnc" name="abr_fnc" placeholder="L'abbrévation">
                </div>
            </div>
            <div class="form-group row">
                <label for="desc_fnc" class="col-sm-2 col-form-label">
                    Description de la fonction pour un administrateur
                </label>
                <div class="col-sm-10">
                    <textarea  type="text" rows="3" class="form-control" id="desc_fnc" name="desc_fnc" placeholder="Description de la fonction pour l'admin"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="ut_desc_fnc" class="col-sm-2 col-form-label">
                    Description de la fonction pour un utilisateur
                </label>
                <div class="col-sm-10">
                    <textarea  type="text" rows="3" class="form-control" id="ut_desc_fnc" name="ut_desc_fnc" placeholder="Description de la fonction pour l'utilisateur"></textarea>
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
    <script src="js/fonctions.js"></script>