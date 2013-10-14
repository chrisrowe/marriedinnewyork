$(function() {

    $("figure").on("click", function(){
        $(this).toggleClass("full");
    });

    $(".nav_pri li").on("click", function(){
        $(".nav_pri li").removeClass("cur");
        $(this).addClass("cur");
        var section = $(this).attr("data-section");
    })

});