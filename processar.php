<?php 
	session_start();
	if (isset($_SESSION['login']) && isset($_SESSION['senha'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Compressed CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css" integrity="sha256-ogmFxjqiTMnZhxCqVmcqTvjfe1Y/ec4WaRj/aQPvn+I=" crossorigin="anonymous">

	<!-- Compressed JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/js/foundation.min.js" integrity="sha256-pRF3zifJRA9jXGv++b06qwtSqX1byFQOLjqa2PTEb2o=" crossorigin="anonymous"></script>
	<link rel="icon" href="./img/mustang.ico">
	<style type="text/css">
		body{
			background-color: #333138;
		}
		div{
			background-color: #fffffa;
			margin-top: 10%;
			margin-left: 25%;
			margin-right: 25%;
			text-transform: uppercase;
			padding: 5%;
		}
		form{
			width: 40%;
		}
		input{
			text-align: center;
		}
	</style>
	<title>Processar</title>
</head>
<body>


<?php
 
include_once 'conexao.php';

$acao = $_SESSION['acao'];
$chave = $_SESSION['chave'];

echo "<div align='center'><h2>Processando - $acao - $chave </h2>";
	
	$nome = $_POST['veiculo'] ?? '';
	$marca = $_POST['marca'] ?? '';
	$modelo = $_POST['modelo'] ?? '';
	$data = $_POST['ano'] ?? '';
	$quantidade = $_POST['quantidade'] ?? '';
	$foto = $_FILES['foto']['name'] ?? '';
	$fotoAntiga = $_POST['fotoAntiga'] ?? '';
	$diretorio = "img/";
    $_UP['pasta'] = $diretorio;

if ($acao == 'incluir') {
	// incluir na tabela de veiculos (insert)

	$sql = "INSERT INTO veiculos(codigo, veiculo, marca, modelo, ano, quantidade, foto) VALUES ('$chave','$nome','$marca','$modelo','$data', '$quantidade','$foto')";

	if ($resultado = mysqli_query($conexao,$sql)) {
		// code...
		move_uploaded_file($_FILES['foto']['tmp_name'] ,$_UP['pasta'].$foto);
		//echo "veículo adicionado!";
		$_SESSION['adicionadoAlert'] = 's';
		header('Location: ./dash.php');
		exit();
	}else{
		//echo "veículo não adicionado!";
		$_SESSION['adicionadoAlert'] = 'n';
		header('Location: ./dash.php');
		exit();
		//$conexao->error;
	}
	
}
if ($acao == 'alterar') {
	// alterar na tabela de veiculos (update)
	if ($foto == null) {
		// code...
		$sql = "UPDATE veiculos SET veiculo='$nome',marca='$marca', modelo='$modelo',ano='$data',quantidade='$quantidade',foto='$fotoAntiga' WHERE codigo = '$chave'";
	}else{
		$sql = "UPDATE veiculos SET veiculo='$nome',marca='$marca', modelo='$modelo',ano='$data',quantidade='$quantidade',foto='$foto' WHERE codigo = '$chave'";
	}
	

	if ($resultado = mysqli_query($conexao,$sql)) {
		// code...
		move_uploaded_file($_FILES['foto']['tmp_name'] ,$_UP['pasta'].$foto);
		//echo "veículo alterado!";
		$_SESSION['alteradoAlert'] = 's';
		header('Location: ./dash.php');
		exit();
	}else{
		//echo "veículo não alterado!";
		//$conexao->error;
		$_SESSION['alteradoAlert'] = 'n';
		header('Location: ./dash.php');
		exit();
	}
}
if ($acao == 'excluir') {
	// excluir na tabela de veiculos (delete)
	$sql = "DELETE FROM veiculos WHERE codigo = '$chave'";
	if ($resultado = mysqli_query($conexao, $sql)) {
		//echo "veículo alterado!";
		$_SESSION['excluirAlert'] = 's';
		header('Location: ./dash.php');
		exit();
	}else{
		//echo "veículo alterado!";
		$_SESSION['excluirAlert'] = 'n';
		header('Location: ./dash.php');
		exit();
	}
}
if ($acao == 'entrada') {
	// adicionar na quantidade da tabela de veiculos o valor de entrada (update)
	$entrada = $_POST['entrada'];
	$codigo = $_POST['codigo'];
	$sql = "SELECT quantidade FROM veiculos WHERE codigo = '$codigo'";
	if ($resultado = mysqli_query($conexao, $sql)) {
		// code...
		$linhas = mysqli_fetch_array($resultado);
		$resultadoParcial = $linhas['quantidade'];
		$resultadoFinal = $resultadoParcial + $entrada;

		if ($resultadoFinal < 0) {
			// code...
			$resultadoFinal = 0;
		}

		$sql = "UPDATE veiculos SET quantidade='$resultadoFinal' WHERE codigo = '$codigo'";
		if($resultado = mysqli_query($conexao, $sql)){
			$_SESSION['entradaAlert'] = 's';
			header('Location: ./dash.php');
			exit();
		}else{
			$_SESSION['entradaAlert'] = 'n';
			header('Location: ./dash.php');
			exit();
		}
	}
}
if ($acao == 'saida') {
	// subtrair na quantidade da tabela de veiculos o valor de saida (update)
	$entrada = $_POST['saida'];
	$codigo = $_POST['codigo'];
	$sql = "SELECT quantidade FROM veiculos WHERE codigo = '$codigo'";
	if ($resultado = mysqli_query($conexao, $sql)) {
		// code...
		$linhas = mysqli_fetch_array($resultado);
		$resultadoParcial = $linhas['quantidade'];
		$resultadoFinal = $resultadoParcial - $entrada;

		if ($resultadoFinal < 0) {
			// code...
			$resultadoFinal = 0;
		}

		$sql = "UPDATE veiculos SET quantidade='$resultadoFinal' WHERE codigo = '$codigo'";
		if($resultado = mysqli_query($conexao, $sql)){
			$_SESSION['saidaAlert'] = 's';
			header('Location: ./dash.php');
			exit();
		}else{
			$_SESSION['saidaAlert'] = 'n';
			header('Location: ./dash.php');
			exit();
		}
	}
}

$conexao->close();

?>

<br>
<br>
<a href="dash.php"><button class="button alert">Voltar</button></a>
<br>
</body>
</html>
<?php
	}else{
		//echo "<div align='center' class='text-light '><h1>voce nao tem permissão para acessar esta página!</h1>";
		//echo '<a href="./index.php">Fechar</a></div>';
		session_unset();
		session_destroy();
		header('Location: ./index.php');
	    exit();
	}
?> 