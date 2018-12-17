$(function(){

	$('#form').on('submit', function(e) {
		e.preventDefault();

		var email = $('input[name=email]').val();
		var senha = $('input[name=password]').val();

		$.ajax({
			type:'POST',
			url:'login.php',
			data:{email:email, senha:senha},
			success:function(msg) {
				alert(msg);
			}
		});

	});

});