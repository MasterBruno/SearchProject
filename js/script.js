window.onload = function (){
	document.getElementById("search").onkeyup = function() {
        autocomplet();
    };
	document.getElementById("navegar").onclick = function() {
		set_item('');
	};	
}

function autocomplet() {
	var keyword = $('#search').val();
	var tab = $('.tab-content .active').attr('id');
	if(keyword != '') {
		$.ajax({
			url: 'fetch.php',
			type: 'POST',
			data: {keyword:keyword, tab:tab},
			success:function(data){
				$('#sugestao').show();
				$('#sugestao').html(data);
			}
		}); 
	} else {
		$('#sugestao').fadeOut();
		$('#sugestao').html("");
	}
}

function verificaCod(){
	var key = $("input[name=codigo]").val();
	var tab = $("input[name=tipo_Motiv]").val();
	var query = "SELECT * FROM `" + tab + "` WHERE `codigo` = '" + key + "';";
	//alert(query);
	if(key != '') {
		if(key.length == 1){
			key = "0" + key;
		}
		$.ajax({
			url: 'buscaCod.php',
			type: 'POST',
			data: {key:key, tab:tab},
			success:function(data){
				//alert(data);
				if(data >= 0){
					//alert("Existe registro!");
					//$("input[name=codigo]").classList.remove("has-success");
					$('#cod').addClass("has-success");
				} else {
					//alert("Não Existe registro!");
					//$("input[name=codigo]").classList.remove("has-danger");
					$("input[name=codigo]").addClass("has-danger");
				}
			}
		}); 
	} else {
	}
}  

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#search').val(item);
	// hide proposition list
	$('#sugestao').hide();
}

function enviar() {
	var keyword = $('#search').val().split(' - ');
	var codigo = keyword[0];
	var tab = $('.tab-content .active').attr('id');
	if(codigo != '') {
		$.ajax({
			url: 'search.php',
			type: 'POST',
			data: {codigo:codigo, tab:tab},
			success:function(data){
				setTimeout(function() {
					$('#resultado').show();
					$('#resultado').html(data);
					$('#result')[0].scrollIntoView(true);
				}, 100);
			}
		}); 
	} else {
		$('#resultado').fadeOut();
		$('#resultado').html("");
		alert("Informe e selecione um motivo!");
	}
}

function toTopo(){
	var subir = $('#scroll_top');
	
	subir.on('click', function(){
		$('body, html').animate({scrollTop: 0 },500)
		setTimeout(function(){
			set_item('');
			$('#resultado').fadeOut();
			$('#resultado').html("");
			$('#scroll_top').fadeOut();
		},450);
	});
}

function fechar(){
	var fechar = $('#fechar');

	fechar.on('click', function(){
		$('body, html').animate({scrollTop: 0 },500)
		setTimeout(function(){
			set_item('');
			$('#resultado').fadeOut();
			$('#resultado').html("");
			$('#scroll_top').fadeOut();
		},450);
	});
}

