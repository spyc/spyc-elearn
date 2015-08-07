!function ($) {

    $.getJSON('/api/bug/level', function (data) {
        $.each(data, function (key, value){
           $('.' + key).css('background-color', '#' + value);
        });
    });

}(window.jQuery);