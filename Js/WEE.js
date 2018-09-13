$( document ).ready(function() {
    $('#comment_Modal').on('show.bs.modal', function (e) {
        comment_ModalLabel_SET_info();
    })

    $("#New_event").submit(function () {
        var titre = $("#NE_input_titre").val();
        var description = $("#NE_input_description").val();
        var date_crea = $.now();
        var date_debut = $("#NE_input_date_deb").val();
        var date_fin = $("#NE_input_date_fin").val();
        var lieu = $("#NE_input_lieu").val();
        var id_compte = 2;
        var id_categorie = $("#NE_input_categorie").val();

        $.post('Controller/ajax.php',
            {titre:titre,
            description:description,
            date_crea:date_crea,
            date_debut:date_debut,
            date_fin:date_fin,
            lieu:lieu,
            id_compte:id_compte,
            id_categorie:id_categorie},
            function (data_event) {
                console.log(data_event);
            });
        return false;
    });
});