$(document).ready(function(){

	$('.ir-arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 1);
	});

	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){
			$('.ir-arriba').slideDown(1);
		} else {
			$('.ir-arriba').slideUp(300);
		}
	});

    $('#esborrarFiltres').click(function(){

        $("#order").val("");
        $('#totsPreus').prop("checked", true);
        $('#totesMarcas').prop("checked", true);
        $('#Nike').prop("checked", false);
        $('#Adidas').prop("checked", false);
        $('#Converse').prop("checked", false);
        $('#newBalance').prop("checked", false);
        $('#Puma').prop("checked", false);
        $('#ASICS').prop("checked", false);
        $('#FILA').prop("checked", false);
        $('#Lacoste').prop("checked", false);
        $('#totesCategories').prop("checked", true);
        $('#Atletisme').prop("checked", false);
        $('#Skateboard').prop("checked", false);
        $('#LifeStyle').prop("checked", false);
        $('#Futbol').prop("checked", false);
        $('#Basquet').prop("checked", false);
        $('#Padel').prop("checked", false);
        $('#Tenis').prop("checked", false);
        $('#todasTallas').prop("checked", true);
        $('#talla34').prop("checked", false);
        $('#talla35').prop("checked", false);
        $('#talla36').prop("checked", false);
        $('#talla37').prop("checked", false);
        $('#talla38').prop("checked", false);
        $('#talla39').prop("checked", false);
        $('#talla40').prop("checked", false);
        $('#talla41').prop("checked", false);
        $('#talla42').prop("checked", false);
        $('#talla43').prop("checked", false);
        $('#talla44').prop("checked", false);
        $('#talla45').prop("checked", false);
        $('#talla46').prop("checked", false);
        $('#talla47').prop("checked", false);
        
    });

});

