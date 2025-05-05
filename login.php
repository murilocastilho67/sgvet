<?php
session_start();

if( isset($_SESSION['login']) ){
	header('Location: inicio.php');
} else {

?>


<html>
	<head>
		<meta charset="utf-8"/>
		<title>Login</title>
		<link rel="stylesheet" href="./css/login.css">
		<script>
			function validaForm(){
				var usuario = document.getElementById("cUsuario");
				var senha = document.getElementById("cSenha");
				var msg = document.getElementById("msg");
				if( usuario.value == "" || usuario.value == null){
					//alert("Digite o Usuário!");
					msg.style.display = "block";
					msg.innerHTML = "Digite o Usuário!";
					return false;
				}else{
					//digitou algo...
					if(usuario.value.length < 5){
						//alert("Usuário inválido");
						msg.style.display = "block";
						msg.innerHTML = "Usuário Inválido < 5!";
						return false;
					}
				}	
				if( senha.value == "" || senha.value == null){
					//alert("Digite a Senha!");
					msg.style.display = "block";
					msg.innerHTML = "Digite a Senha!";
					return false;
				}
				alert("Formulário enviado com sucesso!");
				return true; //se tudo estiver ok
			}	
		</script>
	</head>
	<body>
		<div id="telaLogin">
			<div class="logo"></div>
			<form action="http://localhost/sgvet/api/login" method="POST" onsubmit="return validaForm()">
				<input type="text" name="usuario" id="cUsuario" placeholder="Usuário" />
				<input type="password" name="senha" id="cSenha" placeholder="Senha"/>
				<input type="submit" value="ENTRAR"/>
				<span id="msg">

				</span>
				<span id="msgErro">
				<?php
					if( isset($_GET['erro']) ){
						echo "Usuário ou senha não existem no banco de dados!";
					}
				?>
				</span>				
				<small><br><br>Versão 0.0.1 <br>Curso de Análise e Des. Sistemas (UNIARP)</small>
			</form>
		</div>
	</body>
</html>

<?php 

}

?>