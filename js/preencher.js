$document().ready(function(){
	$("input[name='search'").blur(function(){
		var $codigo = $("input[name='codigo'");
		var $nome = $("input[name='nome'");
		var $conceito = $("input[name='conceito'");
		var $situacao = $("input[name='situacao'");

		$.getJSON('function.php', {
			search : $(this).val()
		}, function(json) {
			$$codigo.val(json.codigo);
			$$nome.val(json.nome);
			$$conceito.val(json.conceito);
			$$situacao.val(json.situacao);
		});
	});
});