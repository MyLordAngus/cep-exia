
/**
 * Profil
 */
$(document).ready(function(){
    hideForm();
    $('.modifier').click(function(){
        showForm();
    });
    $('.annuler').click(function(){
       hideForm();
    });
});

function showForm(){
    $('#form_profil input').css('border-width', 1);
    $('#form_profil input').attr("disabled", false);
    $('#form_profil input.submit').show();
    $('#form_profil input.annuler').show();
    $('#form_profil input.modifier').hide();
    $('.all_competences').show();
	CKEDITOR.replace( 'editor1', {toolbar : 'Basic', width : 655, height: 150} );
}
function hideForm(){
    $('#form_profil input').css('border-width', 0);
    $('#form_profil input').attr("disabled", true);
    $('#form_profil input.submit, #form_profil input.modifier').css('border-width', 1);
    $('#form_profil input.submit, #form_profil input.modifier').attr("disabled", false);
    $('#form_profil input.submit').hide();
    $('#form_profil input.annuler').hide();
    $('#form_profil input.modifier').show();
    $('#form_profil textarea').css('border-width', 0);
    $('.all_competences').hide();
}
