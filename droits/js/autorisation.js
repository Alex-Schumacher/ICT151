$("#autorisation_form").validate(
    {
        rules: {

            nom_aut: {
                required: true,
                minlength: 2
            },
            code_aut: {
                required: true,
                minlength: 3,
                maxlength: 4
            },
            desc_aut: {
                required: true,
                minlength: 20
            }

        },
        message: {
            nom_aut: {
                required: "Ce champ est requis",
                minlength: "le nom de l'autorisation doit être supérieur à 2"
            },
            code_aut:
                {
                    required: "Ce champ est requis",
                    minlength: "le code doit être supérieur à 3",
                    maxlength: "le code doit être inférieur à 4"
                },
            desc_aut: {
                required: "Ce champ est requis",
                minlength: "Ce champ doit comporter au moins 20 charactères"
            }

        },
        submitHandler: function (form) {
            console.log("formulaire envoyé");
            $.post(
                "./json/autorisation.json.php?_=" + Date.now(),
                {
                    nom_aut: $("#nom_aut").val(),
                    code_aut: $("#code_aut").val(),
                    desc_aut: $("#desc_aut").val(),
                },
                function result(data,status){
                    $("#alert .message").html(data.message.texte);
                    $("#alert").attr("class","alert");
                    $("#alert").addClass("alert-"+data.message.type);
                    $("#alert").css("display","block");
                }
            )
        }
    }


)