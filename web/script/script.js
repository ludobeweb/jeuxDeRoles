/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//quand le document est pret ( a la fin du chargement de la page )
$(document).ready(function(){
  centrerButton();
  centrerFormulaire();
    $("body").css("visibility","visible");
});
// quand on redimenssionne la fenetre
$(window).resize(function(){
   centrerButton();
   centrerFormulaire();

});


//quand on clique sur le bouton
$("button").click(function(){
    $(this).fadeOut(600, function(){
        $("#selection").fadeIn(600);
    });
});

/**
 * Fonction qui centre le bouton
 * @returns {undefined}
 */
function centrerButton(){
 
     
    // on recupère les dimensions de la fenetre
    var w = $(window).width();
    var h = $(window).height();
    //on récupère les dimension du bouton
    var buttonw = $("button").width();
    var buttonh = $("button").height();
    //on calcule la position du boutton afin qu'il soit au centre
    var top = (h - buttonh)/2;
    var left = (w - buttonw)/2;
    // on affecte les nouvelles positions calculées
    
    $("button").css({
        "left": left+"px",
        "top" : top+"px"
    });
}
    /**
     * 
     * @returns {undefined}
     */
    function centrerFormulaire(){
 
     
    // on recupère les dimensions de la fenetre
    var w = $(window).width();
    var h = $(window).height();
    //on récupère les dimension du bouton
    var buttonw = $("#selection").width();
    var buttonh = $("#selection").height();
    //on calcule la position du boutton afin qu'il soit au centre
    var top = (h - buttonh)/2;
    var left = (w - buttonw)/2;
    // on affecte les nouvelles positions calculées
    
    $("#selection").css({
        "left": left+"px",
        "top" : top+"px"
    });
    }

