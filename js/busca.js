$(document).ready(function(){
	$('#campo').keyup(function(){
		$('#form').submit(function(){
			var dados = $(this).serialize();

			$.ajax({
				url: 'busca.php',
				type: 'POST',
				dataType: 'html',
				data: dados,
				sucess: function(data){
					$('#resultado').empty().html(data);
				}
			});

			//	Não Submeter ao padrão comum
			return false;
		});
		$('#form').trigger('submit');
	});
});