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
        $(".section").addClass("hidden");
        $(".section." + tab).removeClass("hidden");
        return false;
    });

    // AJAX SUBMIT FORM
    $('.rsvp-form').submit(function (e) {
        e.preventDefault();
        $.getJSON(
        this.action + "?callback=?",
        $(this).serialize(),
        function (data) {
            if (data.Status === 400) {
                alert("Error: " + data.Message);
            } else { // 200
                if ($("html").hasClass("touch")){
                    $('html,body').animate({ scrollTop: $(".rsvp-form").offset().top }, 1000);
                }
                $(".rsvp-form input, .rsvp-form textarea").attr("disabled", "disabled");
                $(".rsvp-form").addClass("complete");
                $(".rsvp-form .thanks").removeClass("hidden");
            }
        });
    });

});