$(function(){

    $(".product-area .topics:first-of-type .fade-in-title").addClass("scroll-in");
    $('.product-area .topics:first-of-type .fade-in-topics .fade-in-topic').each(function(i) {
        $(this).delay(100 * i).queue(function(next) {
            $(this).addClass("scroll-in");
            next();
        });
    });

    var fadeInTitle = $('.topics .fade-in-title');
    $(window).scroll(function () {
      $(fadeInTitle).each(function () {
        var offset = $(this).offset().top;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        if (scroll > offset - windowHeight + 150) {
            $(this).addClass("scroll-in");
        }
      });
    });

    var fadeInTopic = $('.fade-in-topics');
    $(window).scroll(function () {
      $(fadeInTopic).each(function () {
        var offset = $(this).offset().top;
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        if (scroll > offset - windowHeight + 150) {
            var test = $(this).find(".fade-in-topic")
            $(test).each(function(i) {
                $(this).delay(100 * i).queue(function(next) {
                    $(this).addClass("scroll-in");
                    next();
                });
            });
        }
      });
    });

});