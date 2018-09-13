function draw_card(_id, _categorie, _heure, _jour, _mois, _annee, _titre, _content) {
    var categorie = convertion_categorie(_categorie);
    console.log(categorie);
    carte_event = '<article id="carte_' +_id +'">\
                        <div id="carte_body_' +_id +'" class="inner">\
                            <span class="date">\
                                <span class="day">' +_heure +'</span>\
                                <span class="month">' +_jour +' ' +_mois +'</span>\
                                <span class="year">' +_annee +'</span>\
                            </span>\
                            <h2 class="' +categorie +'">' +_titre +'</h2>\
                            <p id="p_' +_id +'">' +_content  +'\
                            <br><button class="btn" data-toggle="modal" data-target="#comment_Modal" onclick="comment(' +_id +')"><i class="fas fa-comments"></i></button>\
                            <button class="btn" onclick="suppr_event()"><i class="fas fa-trash"></i></button>\
                            <button class="btn"><i class="fas fa-plus-circle"></i></button></p>\
                        </div>\
                    </article>';
    $("#timeline").prepend(carte_event);
}

function test(_categorie) {
    draw_card(1,_categorie, "11:00", "11", "juill", "2018", "Soiree pizza nanard", "je vous invite tous chez moi pour un marathon " +
        "des meilleur film nanard vietnamo/moldav des années 50/60 en sous titre coreain! Vennez nombreux svp!")
}

function gent_info_event() {
    the_data = $.get( "data.php", function( data ) {
        console.log(  data );
        $.each(data, function(index, value) {
            draw_card(data[index].id_e,
                data[index].id_cat,
                "11:00", "01", "Jan", "2018",
                data[index].titre,
                data[index].description);
        });
    });
    //console.log('test1234');
}

function actualiser_timeline() {
    $("#timeline").empty();
    recupEvents();
    //console.log("marche ou pas ?");
    //$('#EVENT_Modal').modal('hide');
}

function draw_event_modal(_id, _categorie, _heure, _jour, _mois, _annee, _titre, _content) {
    comment_section = '<span class="divider"></span><br>\
                       <input type="text" class="form-control" placeholder="Recipient\'s username" aria-label="Recipient\'s username" aria-describedby="basic-addon2">\
                       <br>';

    $("#comment_ModalLabel").html(_titre +' '+ _heure +' '+ _jour +' '+ _mois +' '+ _annee).addClass(_categorie);
    $("#comment_Modal_body").html(_content).append(comment_section);
    console.log("sos");
}

function comment(_id) {
    //$("#comment_Modal_body")
    //console.log(the_id);
}

function comment_ModalLabel_SET_info(_id_event) {
    $.get( "data.php", _id_event, function( data ) {
        $.each(data, function(index, value) {
            draw_event_modal(data[index].id_e,
                data[index].id_cat,
                "11:00", "01", "Jan", "2018",
                data[index].titre,
                data[index].description);
        });
    });

/*    $.get( "comments.php", _id_event, function( data ) {
        $.each(data, function(index, value) {
            draw_event_modal(data[index].id_e,
                data[index].id_cat,
                "11:00", "01", "Jan", "2018",
                data[index].titre,
                data[index].description);
        });
    });*/
}

function showdatepicker(_id) {
    $("#"+_id).datepicker($.datepicker.regional[ "fr" ] );
}

function convertdateformat(_date_euro) {
    _date_euro = _date_euro.split('-');
    var _date_us = _date_euro.reverse().join('-');
    return _date_us;
}

function convertion_categorie(_id_cat) {
    switch (_id_cat) {
        case 2 :
            return 'cinema';
            break;
        case 3 :
            return 'sport';
            break;
        case 4 :
            return 'culture';
            break;
        case 5 :
            return 'loisir';
            break;
        case 6 :
            return 'musique';
            break;
        case 7 :
            return 'soiree';
            break;
        case 8 :
            return 'autre';
            break;
    }
}

function filtre_act(_filtre_click) {
/*    liste_filtre_act.push(_filtre_click);
    if (liste_filtre_act.length >= 7) {
        liste_filtre_act=[];
    } else {
        $(".filtre_cinema").hide();
        $(".filtre_sport").hide();
        $(".filtre_culture").hide();
        $(".filtre_loisir").hide();
        $(".filtre_musique").hide();
        $(".filtre_soiree").hide();
        $(".filtre_autre").hide();
        
        $.each(liste_filtre_act,function (key,value) {
            $("."+value);
        });
    }*/
}



