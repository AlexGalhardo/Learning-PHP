// função anônima que se chama sozinha
$(function(){
	$('button').on('click', function(){
		alert('clickou no button');
		var nome = $('#nome').val();
		$.ajax({
			url:'http://localhost/ajax/ajax',
			type:'POST',
			data:{nome:nome},
			dataType:'json',
			success: function(json){
				$('.borda').html(json.frase);
			}
		});
	});
});