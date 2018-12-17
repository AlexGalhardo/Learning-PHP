$(function(){

	$('#busca').on('keyup', function(){
		var texto = $(this).val();

		$.ajax({
			url:'busca.php',
			type:'POST',
			dataType:'json',
			data:{texto:texto},
			success:function(json) {
				var html = '';

				for(var i in json) {
					html += '<li><a href="usuario.php?id='+json[i].id+'">'+json[i].nome+'</a></li>';
				}

				$('#resultado').html(html);
			}
		});
	});

});