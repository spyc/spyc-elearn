!function ($) {
    $('[data-countdown]').on('finish.countdown', function (event) {
       $(this).parentsUntil('.row').hide();
    });
}(window.jQuery);