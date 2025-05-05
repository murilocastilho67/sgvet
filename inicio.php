<?php
	$dir_views = "./views/";
	$controle = false;
	$interfaces = array(
		'home',
		'cadastroAnimais',
		'cadastroTutores',
		'novoAgendamento',
		'cadastroUsuarios'
	);
	$pag_carregar = $dir_views.'home.php';

	if( isset($_GET['action']) AND in_array($_GET['action'], $interfaces)){
		if(file_exists($dir_views.$_GET['action'].".php") ){
			
			$pag_carregar = $dir_views.$_GET['action'].".php";
			$controle = true;

		}
	}

	include("header.php");
	include("menu_superior.php");

?>
<div id="conteiner">

	<?php include($pag_carregar); ?>
		</div>
		<div id="modal"></div>
		<div id="popup">
			<a href="#" id="closePopUp">
				<i class="fa fa-close"></i>
			</a>

			<div class="conteudo-popup" data-id="ajuda">
				<h3><i class="fa fa-circle-question"></i>&nbsp; Ajuda</h3>
				<div class="texto">
					<p>Texto de ajuda sobre o sistema...</p>
				</div>
			</div>

			<div class="conteudo-popup" data-id="perfil">
				<h3><i class="fa fa-rotate"></i>&nbsp; Perfil do Usuário</h3>
				<div class="texto">
					<p>Deseja alterar o perfil...</p>
				</div>
			</div>	

			<div class="conteudo-popup" data-id="configuracoes">
				<h3><i class="fa fa-gear"></i>&nbsp; Configurações</h3>
				<div class="texto">
					<p>Suas Configurações...</p>
				</div>
			</div>

			<div class="conteudo-popup" data-id="usuario">
				<h3><i class="fa fa-user"></i>&nbsp; Informações do Usuário</h3>
				<div class="texto">
					<p>...</p>
				</div>
			</div>					


		</div>
		
	</body>
</html>

