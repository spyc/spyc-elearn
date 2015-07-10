!function ($) {

    $.getJSON('/ajax/bug/color', function (data) {
        $.each(data, function (key, value){
           $('.' + key).css('background-color', '#' + value);
        });
    });

}(window.jQuery);