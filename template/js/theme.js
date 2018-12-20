//////////////////////////////////////////////////////////////////////////////////
////                                                                          ////
////                               JS                                         ////
////                               20/12/2018                                 ////
////                               V0.1.0                                     ////
////                                                                          ////
//////////////////////////////////////////////////////////////////////////////////
;(function ($) {
    "use strict";

    //* SearchFrom
    function searchFrom(){
        if ( $('.search_here').length ){
             $('.search_icon').on('click',function(){
                $('.search_from').toggleClass('show');
                return false
            });
            $('.form_hide').on('click',function(){
                $('.searchForm').removeClass('show')
            });
        };
    };

    // Code Here
    function calendar() {
        if ($('.calendar').length) {
            $('.calendar').dcalendar();
        }
    }

    //* modal_popup
    function modal_popup() {
        if ($('body').length) {
              $('.modal').modal({
                  dismissible: true,
                  opacity: 1,
              });
        }
    }

    //* Tags
    function tagPlaceholder() {
        if ($('body').length) {
                $('.chips-placeholder').material_chip({
                    placeholder: 'Add tags...',
                    secondaryPlaceholder: '+Tag',
                });
        }
    }

    // Loding next
    function infiniteScroll() {
        if ($('.middle_section, .notifications_area').length) {
           $('.middle_section').jscroll({
                loadingHtml: '<img src="images/preloader.svg" alt="Loading" />',
                padding: 0,
                autoTriggerUntil: 2,
                nextSelector: 'a.load-mor:last',
                contentSelector: '.post',
                callback: false,
           });

           $('.notifications_content').jscroll({
                loadingHtml: '<img src="images/preloader.svg" alt="Loading" />',
                padding: 0,
                autoTriggerUntil: 3,
                contentSelector: '.notifications_content li',
                callback: false,
           });
        }
    }

    //* Check button
    function flipswitch() {
        if ($('.flipswitch').length) {
            $(".flipswitch").flipswitch({
                texts : {
                    left  : "YES",
                    right : "NO"
                }
            });
        };
    };

    //* Graph Chart
    function graphChart() {
        if ($('#bars').length) {
              $("#bars li .bar").each(function (key, bar) {
                  var percentage = $(this).data('percentage');
                  $(this).css('height', percentage + '%');
              });
        };
    };


    /*Function Calls*/
    $(".button-collapse").sideNav();
    $('select').material_select();
    searchFrom();
    calendar();
    infiniteScroll();
    modal_popup ();
    tagPlaceholder ();
    flipswitch ();
    graphChart ();

})(jQuery);

function postuler(id_offre,id_ent,id_user){

    var id_offre  = id_offre;
    var id_user  = id_user;
    var id_ent  = id_ent;

    $.ajax({
        url: '../ToolBox/trait_ajax.php',
        type: "GET",
        data: {
            'postule' : 1,
            'id_offre' : id_offre,
            'id_user' : id_user,
            'id_ent' : id_ent,
        }
    });
    var div = "paspostule"+id_offre;
    document.getElementById(div).style.display="none";
    var divaff = "postule"+id_offre;
    document.getElementById(divaff).style.display="block";
}

function annuldemande(id_offre,id_ent,id_user){
    var id_offre  = id_offre;
    var id_user  = id_user;
    var id_ent  = id_ent;


    $.ajax({
        url: '../ToolBox/trait_ajax.php',
        type: "GET",
        data: {
            'canceldemande' : 1,
            'id_offre' : id_offre,
            'id_user' : id_user,
            'id_ent' : id_ent,
        }
    });
    var div = "paspostule"+id_offre;
    document.getElementById(div).style.display="block";
    var divaff = "postule"+id_offre;
    document.getElementById(divaff).style.display="none";
}

function modifpreferences(id_user){
    var preferences = new Array();
    $('.checkedpref:checked').each(function() {
        preferences.push(this.value);
    });

    prefjs = JSON.stringify(preferences);

    $.ajax({
        url: '../ToolBox/trait_ajax.php',
        type: "GET",
        data: {
            'modifpref' : 1,
            'preferences' : prefjs,
            'id_user' : id_user,
        },
        sucess:console.log('ajax marche')
    });

}


function acceptedemande(id_demande){
  if (confirm("Etes vous sur de vouloir accepter cette demande ?")) {

    $.ajax({
        url: '../ToolBox/trait_ajax.php',
        type: "GET",
        data: {
            'acceptedemande' : 1,
            'id_demande' : id_demande,
        },
        sucess:console.log('demande accepter')
    });

      var div = "demandeaccepte"+id_demande;
      document.getElementById(div).style.display="block";
      var divaff = "demandeencours"+id_demande;
      document.getElementById(divaff).style.display="none";

  }
}

function refuserdemande(id_demande){

  if (confirm('Etes vous sur de vouloir refuser cette demande?')) {


    $.ajax({
        url: '../ToolBox/trait_ajax.php',
        type: "GET",
        data: {
            'refuserdemande' : 1,
            'id_demande' : id_demande,
        },
        sucess:console.log('demande supp')
    });
    var div = "demande"+id_demande;
    document.getElementById(div).style.display="none";
  }
}

function annuldemande(id_demande){
  if (confirm('Etes vous sur de vouloir annuler cette demande?')) {


    $.ajax({
        url: '../ToolBox/trait_ajax.php',
        type: "GET",
        data: {
            'annuldemande' : 1,
            'id_demande' : id_demande,
        },
        sucess:console.log('demande supp')
    });
    var div = "demande"+id_demande;
    document.getElementById(div).style.display="none";
  }
}
