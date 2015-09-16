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

    window.UI = {
        label: label
    }
}(window.jQuery);