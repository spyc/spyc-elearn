!function ($){
	var colors = {};

	function level_color(){
		var level = $(document.getElementById('level')).val(), color = colors[level] || '000000';
		$(this).css('background-color', '#' + color);
	}
	
	$.getJSON('/ajax/bug/color', function (data) {
		colors = data;
		level_color();
	});

	$(document.getElementById('level')).bind('change', level_color);

	$('.nav-tabs a').bind('click', function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	$('a[aria-controls=preview]').bind('show.bs.tab', function (e) {
		var content = $('textarea').val() || '#Nothing to preview', t = $(document.getElementById('preview'));
		t.css({
			'height': '174px',
			'border': '1px solid #cccccc',
			'box-shadow': 'inset 0 1px 1px rgba(0,0,0,.075)',
			'border-radius': '5px'
		});
		t.html(markdown.toHTML(content));
	});
}(jQuery);