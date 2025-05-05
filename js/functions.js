$(document).ready(function(){
	var divModal = $("#modal"); 
	var divPopUp = $("#popup");
	var btnClosePopUp = $("#closePopUp"); //botão fechar PopUp

	btnClosePopUp.on('click', function( e ){
		divModal.toggle(); //esconder ou mostrar div Modal
		divPopUp.toggle(); //esconder ou mostrar div PopUp
	});

	$(".js-popup").on('click', function( e ){
		e.preventDefault();
		var dest = $(this).attr('href');
		console.log(dest);
		divModal.toggle();
		divPopUp.toggle();
		$(".conteudo-popup").css('display','none');
		$("[data-id='"+ dest +"']").toggle(true);
	});

	var cadastroUsuarios = $('#cadastrar_usuario');
	cadastroUsuarios.on('click', function( e ){
		e.preventDefault();
		//console.log('Botão Clicado!');
		$.post('http://localhost/sgvet/api/novoUsuario').done();
	});

});



