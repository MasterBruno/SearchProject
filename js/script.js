
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
