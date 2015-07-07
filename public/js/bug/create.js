!function ($){
	var colors = {};

	function level_color(){
		var level = $(document.getElementById('level')).val(), color = colors[level] || 'ffffff';
		$(this).css({
			'color' : 'white',
			'background-color' : '#' + color,
			'font-weight' : 'bold'
		});
	}
	
	$.getJSON('/ajax/bug/color', function (data) {
		colors = data;
		level_color();
	});

	$(document.getElementById('level')).bind('change', level_color);
}(jQuery);