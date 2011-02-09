    
$(document).ready(function (){
    var slides = $('.slide');
    var position = 0;

    $("#id_0").show();
    $("#flecheGauche").click(function(){
        changeSlide(slides, position, -1);
        if(position-1 >= 0)
            position--;
        else
            position = slides.size()-1;
    });
    $("#flecheDroite").click(function(){
        changeSlide(slides, position, 1);
        if(position+1 < slides.size())
            position++;
        else
            position = 0;
    });
});

function changeSlide(slidesListe, positionInitiale, direction){
    if( positionInitiale < (slidesListe.size()-1) || positionInitiale >= (slidesListe.size()-1) && direction < 0 ){
        if( positionInitiale > 0 || positionInitiale <= 0 && direction > 0){
            $("#id_"+positionInitiale.toString()).hide();
            $("#id_"+(positionInitiale+direction).toString()).fadeIn("slow");
        }
        else {
            $("#id_"+positionInitiale.toString()).hide();
            $("#id_"+(slidesListe.size()-1).toString()).fadeIn("slow");
        }
    }
    else{
        $("#id_"+positionInitiale.toString()).hide();
        $("#id_0").fadeIn("slow");
    }
}
