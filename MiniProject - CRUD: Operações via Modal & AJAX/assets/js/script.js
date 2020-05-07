$(function(){

	$('.modal_ajax').on('click', function(e){
		e.preventDefault();

		$('.modal').html('Carregando...');
		$('.modal_bg').show();

		var link = $(this).attr('href');

		$.ajax({
			url:link,
			type:'GET',
			success:function(html){
				$('.modal').html(html);
			}
		});


	});

});