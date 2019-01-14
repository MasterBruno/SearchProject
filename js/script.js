window.onload = function (){
	document.getElementById("search").onkeyup = function() {
        autocomplet();
    };
	document.getElementById("navegar").onclick = function() {
		autocomplet();
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
	}
}

