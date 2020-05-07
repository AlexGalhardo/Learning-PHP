function verificarNotificacao() {

	$.ajax({
		url:'verificar.php',
		type:'POST',
		dataType:'json',
		success:function(json) {

			if(json.qt > 0) {
				$('.notificacoes').addClass('tem_notif');
				$('.notificacoes').html(json.qt);
			} else {
				$('.notificacoes').removeClass('tem_notif');
				$('.notificacoes').html('0');
			}
		}
	});
}

$(function(){
	setInterval(verificarNotificacao, 2000);
	verificarNotificacao();

	$('.notificacoes').on('click', function(){

	});

	$('.addNotif').on('click', function(){
		$.ajax({
			url:'add.php'
		});
	});
});