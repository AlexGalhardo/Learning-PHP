$(function(){

	$('button').on('click', function(){
		var data = new FormData();

		var arquivos = $('#foto')[0].files;

		if(arquivos.length > 0) {

			data.append('nome', $('#nome').val());

			data.append('foto', arquivos[0]);

			$.ajax({
				type:'POST',
				url:'recebedor.php',
				data:data,
				contentType:false,
				processData:false,
				success:function(msg){
					alert(msg);
				}
			});
		}
	});

});