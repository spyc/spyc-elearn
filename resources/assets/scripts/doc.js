!function ($) {
    'use strict';
    $('h1, h2, h3, h4, h5').each(function (){
       $(this).attr('id', $(this).text().replace(/\s/g, '-').toLowerCase());
    });
}(window.jQuery);