!function ($) {
    if ($('.tag-label[data-level]').length) {
        $.getJSON('/ajax/bug/color', function (data) {
            $('.tag-label[data-level]').each(function () {
                var level = $(this).attr('data-level');
                $(this).css('background-color', '#' + data[level]);
            });
        });
    }

    $('html').niceScroll();

    $('[data-markdown-translate]').each(function (){
        $(this).html(markdown.toHTML($(this).html().trim()));
    });
}(window.jQuery);