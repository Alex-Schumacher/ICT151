$("#fonction_form").validate(
    {
        rules: {

            nom_fnc: {
                required: true,
                minlength: 2
            },
            abr_fnc: {
                required: true,
                minlength: 3,
                maxlength: 4
            },
            desc_fnc: {
                required: true,
                minlength: 20
            },
            ut_desc_fnc:{
                required:true,
                minlength:20
            }


        },
        messages: {
            nom_fnc: {
                required: "Ce champ est requis",
                minlength: "le nom de la fonction  doit être supérieur à 2"
            },
            abr_fnc:
                {
                    required: "Ce champ est requis",
                    minlength: "l'abrévation doit être supérieur à 3",
                    maxlength: "l'abrévation doit être inférieur à 4"
                },
            desc_fnc: {
                required: "Ce champ est requis",
                minlength: "Ce champ doit comporter au moins 20 charactères"
            },
            ut_desc_fnc: {
                required: "Ce champ est requis",
                minlength: "Ce champ doit comporter au moins 20 charactères"
            }

        },
        submitHandler: function (form) {
            console.log("formulaire envoyé");
            $.post(
                "./json/fonction.json.php?_=" + Date.now(),
                {
                    nom_fnc: $("#nom_fnc").val(),
                    abr_fnc: $("#abr_fnc").val(),
                    desc_fnc: $("#desc_fnc").val(),
                    ut_desc_fnc: $("#ut_desc_fnc").val(),
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