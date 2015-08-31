!function ($) {
    'use strict';
    var
        $window = $(window),
        $body = $('body');

    var $sidebar = $('.sidebar');

    function label() {
        if ($('.tag-label[data-level]').length) {
            $.getJSON('/api/bug/level', function (data) {
                $('.tag-label[data-level]').each(function () {
                    var level = $(this).attr('data-level');
                    $(this).css('background-color', '#' + data[level]);
                });
            });
        }
    }

    label();

    $('[autofocus]').focus();
    $('html').niceScroll();

    $('[data-markdown-translate]').each(function (){
        $(this).html(markdown.toHTML($(this).html().trim()));
    });

    window.UI = {
        label: label
    }
}(window.jQuery);