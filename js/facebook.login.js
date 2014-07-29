window.fbAsyncInit = function() {
	FB.init({
		appId      : '675062689245409',
		cookie     : true,
		xfbml      : true,
		oauth      : true,
		version    : 'v2.0'
	});
}

$('.fb-login').click(function() {
	FB.login(function(response) {
		if (response.authResponse) {
			location.href = './painel';
		}
	});
});

$('.fb-logout').click(function() {
	if (FB.getAuthResponse()) {
		FB.logout();
	};
});
