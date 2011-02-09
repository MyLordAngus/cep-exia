/**
 * Inscription
 */

//Formulaires d'inscription'
$(document).ready(function (){
    $("#form_prestataire").hide();
    $("#form_entreprise").hide();
    
    var choix;
    //SI on clique sur entreprise
    $("#choix #entreprise").click(function (){
        choix = 'entreprise';
        afficherForm(choix);
    });
    //SI on clique sur prestataire
    $("#choix #prestataire").click(function (){
        choix = 'prestataire';
        afficherForm(choix);
    });

    //Validation des formulaires
    $('input.required').blur(function(){
        required($(this));
    });
    $('input.email').blur(function(){
        email($(this));
    });
    $('input.tel').blur(function(){
        min_lenght($(this), 10);
    });
    $('input.siret').blur(function(){
        min_lenght($(this), 15);
    });
    $('input.password_confirm').blur(function(){
        password($(this).parent().parent().find('.password'), $(this));
    });
    $('form').submit(function(){
        var InputsRequired = $(this).find('.required');
        var InputsEmail = $(this).find('.email');
        var InputsTel = $(this).find('.tel');
        var InputsSiret = $(this).find('.siret');
        var InputsPassword = $(this).find('.password_confirm');
        var valide = 0;
        
        $.each(InputsRequired, function(i){
            if(!required($(this)))
                valide++;
        });
        if(!email($(InputsEmail)))
            valide++;
        if(!min_lenght($(InputsTel), 10))
            valide++;
        if(!min_lenght($(InputsSiret), 15))
            valide++;
        if(!password($(InputsPassword).parent().parent().find('.password'), InputsPassword))
            valide++;
        if(valide == 0)
            return true;
        return false;
    });
});

function afficherForm( choix ){
    $('#choix a').hide(function(){
        $('#choix').fadeOut('fast', function(){
            $('#form_'+choix).fadeIn('slow');
        });
    });
}
function required(input){
    if(input.val() == ''){
        input.css('background-color', '#ffe5d2');
        return false;
    }
    input.css('background-color', 'white');
    return true;
}
function min_lenght(input, min){
    if(input.val().length < min){
        input.css('background-color', '#ffe5d2');
        return false;
    }
    input.css('background-color', 'white');
    return true;
}
function email(input){
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(!regex.test(input.val())){
        input.css('background-color', '#ffe5d2');
        return false;
    }
    input.css('background-color', 'white');
    return true;
}
function password(mdp, mdp_confirm){
    if(mdp.val() != mdp_confirm.val()){
        mdp_confirm.css('background-color', '#ffe5d2');
        return false;
    }
    mdp_confirm.css('background-color', 'white');
    return true;
}

/**
 * Messages
 */

$(document).ready(function(){
    $.each($("#messages p"), function(){
        $(this).fadeOut(5000);
    })
});
