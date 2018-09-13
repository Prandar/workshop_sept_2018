$( document ).ready(function() {
    liste_filtre_act = [];
    $('#comment_Modal').on('show.bs.modal', function (e) {
        comment_ModalLabel_SET_info();
    });

    recupEvents();
    $("#New_event").submit(function () {

        var titre = $("#NE_input_titre").val();
        var description = $("#NE_input_description").val();
        var date_debut = convertdateformat($("#NE_input_date_deb").val());
        var date_fin = convertdateformat($("#NE_input_date_fin").val());
        var lieu = $("#NE_input_lieu").val();
        var id_categorie = convertion_categorie($("#NE_input_categorie").val());
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


    function Verif_Events_Avenir() {
        $.post('Controller/Ajax_verif_event_avenir.php', function (data_events_av) {
            $('#content_left').empty().append('<div class="card">' +
                                                '<div class="card-header">' +
                                                    'Vos prochain event' +
                                                '</div>' +
                                                '<ul id="ul_events_av" class="list-group list-group-flush">');
            $("#ul_events_av").append(data_events_av) ;
            $('#content_left').append('</ul></div');
        });
    }

    setInterval(Verif_Events_Avenir,5000);


    function Verif_Events_Trending() {
        $.post('Controller/Ajax_event_trend.php', function (data_events_tr) {
            $('#content_right').empty().append('<div class="card">' +
                                                '<div class="card-header">' +
                                                    'Top Event' +
                                                '</div>' +
                                                '<ul id="ul_events_tr" class="list-group list-group-flush">');
            $("#ul_events_tr").append(data_events_tr);
            $('#content_right').append('</ul></div');
        });
    }

    setInterval(Verif_Events_Trending,5000);
});