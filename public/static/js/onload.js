$(function() {

    // TOGGLE IMAGE SIZES
    $("figure").on("click", function(){
        $(this).toggleClass("full");
    });

    // ADJUST TEXTAREA SIZE IF NEEDED
    $('textarea').autosize();

    // LOCAL LINKS CHANGE PAGE
    $("a[href^='#']").on("click", function(e){
        e.preventDefault();
        var tab = $(this).attr("href").replace("#","");
        $(".nav_pri li").removeClass("cur");
        $(".nav_pri a[href='#"+tab+"']").parents("li").addClass("cur");
        $(".section").addClass("hidden");
        $(".section." + tab).removeClass("hidden");
        $('html,body').animate({
            scrollTop: $(".content_pri").offset().top - 46
        }, 10);
        return false;
    });



});