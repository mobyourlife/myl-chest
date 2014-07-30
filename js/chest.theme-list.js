var theme_stylesheet = null;

$('#theme-list > li > a').click(function() {
	var theme = $(this).data('theme');
	
	if (theme_stylesheet == null)
	{
		var lnk = document.createElement('link');
		lnk.href = 'css/bootstrap.min.css';
		lnk.rel = 'stylesheet';
		lnk.type = 'text/css';
		(document.head || document.documentElement).appendChild(lnk);
	}
	
	if (theme.length != 0)
	{
		lnk.href = 'themes/' + theme + '/bootstrap.min.css';
	}
	else
	{
		lnk.href = 'css/bootstrap.min.css';
	}
});
