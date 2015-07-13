!function ($) {
    $.getJSON('/ajax/bug/color', function (data) {
        $('.tag-label[data-level]').each(function () {
            var level = $(this).attr('data-level');
            $(this).css('background-color', '#' + data[level]);
        });
    });

    $('[data-markdown-translate]').each(function (){
        $(this).html(markdown.toHTML($(this).html().trim()));
    });
}(window.jQuery);