$( document ).ready(function() {
    $('#comment_Modal').on('show.bs.modal', function (e) {
        comment_ModalLabel_SET_info();
    })

    recupEvents()
    $("#New_event").submit(function () {

        var titre = $("#NE_input_titre").val();
        var description = $("#NE_input_description").val();
        var date_crea = null;
        var date_debut = convertdateformat($("#NE_input_date_deb").val());
        var date_fin = convertdateformat($("#NE_input_date_fin").val());
        var lieu = $("#NE_input_lieu").val();
        var id_categorie = $("#NE_input_categorie").val();
        console.log(id_categorie);
        recupEvents();

        $.post('Controller/ajax.php',
            {titre:titre,
            description:description,
            date_debut:date_debut,
            date_fin:date_fin,
            lieu:lieu,
            id_categorie:id_categorie},
            function (data_event) {
                //console.log(data_event);
            });
        return false;
    });

    function recupEvents() {
        $.post('Controller/ajax_recup.php', function (data_events) {
            $('#timeline').empty().prepend(data_events);
        });
    }

    setInterval(recupEvents,5000);
});