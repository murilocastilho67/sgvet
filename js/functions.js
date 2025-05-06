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
		var novo_usuario = $('input[name="novo_usuario"]').val();
		var nova_senha = $('input[name="nova_senha"]').val();
		var tipo_usuario = $('select[name="tipo_usuario"]').val();

		$.post('http://localhost/sgvet/api/cadastroUsuarios',{
			novo_usuario:novo_usuario, nova_senha:nova_senha, tipo_usuario:tipo_usuario
		})
		.done( console.log);
	});

});



