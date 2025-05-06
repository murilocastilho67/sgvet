<?php

// Definir o tipo de saída
header("Content-type: application/json"); 

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '123456789');
define('DB_NAME', 'db_sgvet');

require_once "../conect.php";

try{
	$Conexao = Conexao::getConnection();
	//echo "Conexao OK";
} catch( Exception $erro){
	echo $erro->getMessage();
}


$acao = '';
$param = '';

if ( isset($_REQUEST['path'])){
	$path = explode("/", $_REQUEST['path']);
	$method = $_SERVER['REQUEST_METHOD'];

	if( isset($path[0]) ){
	$acao = $path[0];
	}
	if( isset($path[1]) ){
	$param = $path[1];
	}

	#################### Ação: login
	if ($acao == 'login' AND $method == 'POST'){
		if( isset($_POST['usuario']) AND isset($_POST['senha'])){
			$usuario = $_POST['usuario'];
			$senha = $_POST['senha'];
			$senha = hash('sha256', $senha);
			//CONSULTAR NA BASE...
			$consultaLogin = $Conexao->prepare("
				SELECT * FROM usuarios 
				WHERE usuario = :usuario AND senha = :senha");
	$consultaLogin->bindParam(':usuario', $usuario, PDO::PARAM_STR);
	$consultaLogin->bindParam(':senha', $senha, PDO::PARAM_STR);
			$consultaLogin->execute();
			$res = $consultaLogin->fetchAll();
			if(count( $res ) > 0 ){
				session_start();
				$_SESSION['login'] = 1; #cria a sessão
				header('Location: ../inicio.php');
			}else{
				header('Location: ../login.php?erro');
			}
			
		}
	}
	#################### Ação: cadastro de usuario
	if($acao == 'cadastroUsuarios' AND $method == 'POST'){
		if( isset($_POST['novo_usuario'] ) ){
			$novo_usuario = $_POST['novo_usuario'];
			$nova_senha = $_POST['nova_senha'];
			$tipo_usuario = $_POST['tipo_usuario'];
			// CONSULTA NA BASE
			$verificaUsuario = $Conexao->prepare("
			SELECT * FROM usuarios WHERE usuario = :usuario");
			$verificaUsuario->bindParam(':usuario', $novo_usuario,
				PDO::PARAM_STR);
			$verificaUsuario->execute();
			$res = $verificaUsuario->fetchAll();
			if( count($res) > 0 ){
				//usuário já existe
				echo json_encode("jaexiste");
			}else{
				//posso cadastrar...
				echo json_encode("naoexiste");
			}
		}
	}
}








?>