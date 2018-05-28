$(document).ready(function){
	var $descri = $('#descri'),
		$price = $('#price'),
		$stock = $('#stock'),
		$weight = $('#weight'),
		$size = $('#size'),
		$color = $('#color'),
		$age = $('#age'),
		$e_descri = $('#erreur_descri'),
		$e_price = $('#erreur_price'),
		$e_stock = $('#erreur_stock'),
		$e_weight = $('#erreur_weight'),
		$e_size = $('#erreur_size'),
		$e_color = $('#erreur_color'),
		$e_age= $('#erreur_age');

	$e_descri.css('display', 'none');
	$e_price.css('display', 'none');
	$e_stock.css('display', 'none');
	$e_size.css('display', 'none');
	$e_color.css('display', 'none');

	$descri.keyup(function(){
		if ($(this).val().length < 3) {
			$(this).css({
				borderColor : 'red';
				color : 'red';
			});
			$e_descri.css('display', 'block')
		} else {
			$(this).css({
				borderColor : 'green';
				color : 'green';
			});
		}
	});

	$price.keyup(function(){
		if ($(this).val().length < 1) {
			$(this).css({
				borderColor : 'red';
				color : 'red';
			});
			$e_price.css('display', 'block');
		} else {
			$(this).css({
				borderColor : 'green';
				color : 'green'
			});
		}
	});

	$stock.keyup(function(){
		if ($(this).val() == "0") {
			$(this).css({
				borderColor : 'red';
				color : 'red';
			});
			$e_stock.css('display', 'block');
		} else {
			$(this).css({
				borderColor : 'green';
				color : 'green';
			});
		}
	});	

	$size.keyup(function(){
		if ($(this).val().length < 1) {
			$(this).css({
				borderColor : 'red';
				color : 'red';
			});
			$e_size.css('display', 'block');
		} else {
			$(this).css({
				borderColor : 'green';
				color : 'green';
			});
		}
	});

	$color.keyup(function(){
		if ($(this).val().length < 3) {
			$(this).css({
				borderColor : 'red';
				color : 'red';
			});
			$e_color.css('display', 'block');
		} else {
			$(this).css({
				borderColor : 'green';
				color : 'green';
			});
		}
	});



}