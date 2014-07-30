$('#theme-list > li > a').click(function() {
	var $current = $('#theme-current');
	var $theme_id = $(this).data('theme-id');
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
	
	$current.data('theme-id', $theme_id);
	
});

var $btn_original = null;

$('#btn-salvar-painel').click(function() {
	var $theme_id = $('#theme-current').data('theme-id');
	$btn = $(this);
	
	if ($btn_original == null)
	{
		$btn_original = $(this).html();
	}
	
	$(this).removeClass('btn-info').removeClass('btn-danger').addClass('btn-warning').text('Salvando...');
	
	$.post($(this).data('action'), { 'theme_id': $theme_id }, function(data) {
		if (data.salvo == true) {
			$btn.removeClass('btn-warning').addClass('btn-success').html('Salvo!');
			setTimeout(function() { $btn.removeClass('btn-success').addClass('btn-info').html($btn_original); }, 3000);
		} else {
			$btn.removeClass('btn-warning').addClass('btn-danger').html('Falha!');
			setTimeout(function() { $btn.removeClass('btn-danger').addClass('btn-info').html($btn_original); }, 3000);
		}
	}).fail(function() {
		$btn.removeClass('btn-warning').addClass('btn-danger').html('Falha!');
		setTimeout(function() { $btn.removeClass('btn-danger').addClass('btn-info').html($btn_original); }, 3000);
	});
});
