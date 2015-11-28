!function ($) {
    'use strict';

    function label() {
        var tags = $('.tag-label[data-level]');
        if (tags.length) {
            var color = [];
            if (color.length === 0 ) {
                $.getJSON('/api/bug/level', function (data) {
                    color = data;
                });
            }
            tags.each(function () {
                var level = $(this).attr('data-level');
                $(this).css('background-color', '#' + (color[level] || '000'));
            });
        }
    }

    label();

    $('[autofocus]').focus();
    $('html').niceScroll();

    $('[data-markdown-translate]').each(function (){
        $(this).html(markdown.toHTML($(this).html().trim()));
    });

    $('a.nav-slide').click(function (event) {
        event.preventDefault();
        $('html, body').animate({
           scrollTop: $($(this).attr('href')).offset().top
        }, 500);
    });

    $('[data-countdown]').each(function(){
       $(this).countdown(new Date($(this).attr('data-countdown')), function (event){
           var defaultFormat = '%-D Days(s) %-H hour(s) %-M Minute(s) %-S Second(s)';
          $(this).html(event.strftime($(this).attr('data-format') || defaultFormat));
       });
    });

    window.UI = {
        label: label
    };

    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

    trigger.click(function () {
        hamburger_cross();
    });

    function hamburger_cross() {

        if (isClosed == true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }

    $('[data-toggle="offcanvas"]').click(function () {
        $('.wrapper').toggleClass('toggled');
    });
}(window.jQuery);