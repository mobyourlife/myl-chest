$('#mail-form').submit(function() {
	var nome = $('#name').val();
	var email = $('#email').val();
	var mensagem = $('#message').val();
	
	if (nome.length == 0) {
		alert('Digite o seu nome!');
	} else if (email.length == 0) {
		alert('Digite o seu email!');
	} else if (mensagem.length == 0) {
		alert('Digite a sua mensagem!');
	} else {
		$.post($(this).attr('action'), { 'nome': nome, 'email': email, 'mensagem': mensagem }, function(data) {
			if (data.enviado == true) {
				location.href = './obrigado';
			} else {
				alert('Falha ao tentar enviar seu email!\nPor favor tente novamente!');
			}
		});
	}

	return false;
});

$('.thumbnail').click(function() {
	$('#full-screen').css('height', $(window).height()).css('display', 'inline').css('background-image', 'url(' + $(this).attr('href') + ')');
	return false;
});

$('#full-screen').click(function () {
	$('#full-screen').css('display', 'none');
});