if ('undefined' === typeof markdown)
    throw new Error('Markdown.js is required');
!function ($, markdown) {
    $.fn.extend({
        'markdown': function() {
            return this.each(function() {
                this.innerHTML = markdown.toHTML(this.innerHTML)
            })
        }
    });
    $('.markdown[data-markdown]').each(function(index, element){
        $.get($(this).attr('data-markdown'), function (data) {
            $(element).html(markdown.toHTML(data));
        });
    });
}(jQuery, markdown);
