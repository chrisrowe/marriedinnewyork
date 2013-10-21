$(document).ready(function(){

    // TOGGLE IMAGE SIZES
    $("figure").on("click", function(){
        $(this).toggleClass("full");
    });

    // ADJUST TEXTAREA SIZE IF NEEDED
    $('textarea').autosize();

    // LOCAL LINKS CHANGE PAGE
    $("a[href^='#']").on("click", function(e){
        e.preventDefault();
        if ($(this).hasClass("nav") == false) {
            $('html,body').animate({ scrollTop: $(".nav_pri").offset().top }, 1000);
        }
        var tab = $(this).attr("href").replace("#","");
        $(".nav_pri li").removeClass("cur");
        $(".nav_pri a[href='#"+tab+"']").parents("li").addClass("cur");
        $(".section .content").addClass("hidden");
        $(".section." + tab + " .content").removeClass("hidden");
        return false;
    });

});

$( window ).resize(function() {
    $(".content_pri").height($(".section.us-and-ny").height());
});