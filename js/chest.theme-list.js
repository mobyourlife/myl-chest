$('#theme-list > li > a').click(function() {
	var $theme = $(this).data('theme');
	var $lnk = $('link#theme-test');
	
	if ($lnk.length == 0)
	{
		$lnk = $('<link>');
		$lnk.attr('id', 'theme-test');
		$lnk.attr('rel', 'stylesheet');
		$lnk.attr('type', 'text/css');
		$('head').append($lnk);
	}
	
	if ($theme.length != 0)
	{
		$lnk.attr('href', 'themes/' + $theme + '/bootstrap.min.css');
	}
	else
	{
		$lnk.attr('href', 'css/bootstrap.min.css');
	}
	
});
