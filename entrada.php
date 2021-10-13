<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<!-- Compressed CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css" integrity="sha256-ogmFxjqiTMnZhxCqVmcqTvjfe1Y/ec4WaRj/aQPvn+I=" crossorigin="anonymous">
    <link rel="icon" href="./img/mustang.ico">
	<!-- Compressed JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/js/foundation.min.js" integrity="sha256-pRF3zifJRA9jXGv++b06qwtSqX1byFQOLjqa2PTEb2o=" crossorigin="anonymous"></script>
	<style type="text/css">
		body{
			background-color: #252275;
		}
		div{
			background-color: #fffffa;
			margin-left: 5%;
			margin-right: 5%;
		}
		form{
			width: 40%;
		}
		input{
			text-align: center;
		}
	</style>
	<title>Entrada</title>
</head>
<body>
    <?php 
	session_start();
	if (isset($_SESSION['login']) && isset($_SESSION['senha']) && $_SESSION['entrada'] == 's') {
	   $_SESSION['processa'] = 's';

	include "conexao.php";
	$chave = $_SESSION['chave'];
	$sql = "SELECT codigo FROM veiculos WHERE codigo = '$chave'";
	$resultado = mysqli_query($conexao, $sql);
		if (mysqli_num_rows($resultado) > 0) {
			// code...
			$sql = "SELECT * FROM veiculos WHERE codigo = '$chave'";
			$resultado = mysqli_query($conexao, $sql);
			$linhas = mysqli_fetch_array($resultado);
			$nome = $linhas['veiculo'];
			$marca = $linhas['marca'];
			$modelo = $linhas['modelo'];
			$data = $linhas['ano'];
			$quantidade = $linhas['quantidade'];
			$foto = $linhas['foto'];
		}else{
			//echo "<script type='text/javascript'>alert('Não existe um veículo cadastrado com o código $chave, para alterar a  entrada.');</script>";
			$_SESSION['alertaEntrada'] = 's';
			header("Location: ./dash.php");
			//echo '<div align="center" style="margin-top: 200px; padding:30px;">Não existe um veículo cadastrado com o código'. $chave.', para ser excluido<br><br><a href="./dash.php"><button class="button alert" id="voltar">Voltar</button></a></div>';
			exit();
		}
	?>
	<div align="center">
		<h2>Entrada de Veículos</h2>

		<form action="processar.php" method="POST">
			Código do Veículo:
			<input type="text" name="codigo" disabled value="<?php echo $chave; ?>">
			<input type="hidden" name="codigo" value="<?php echo $chave; ?>">
			<br>
			Nome do Veículo:
			<input value="<?php echo $nome; ?>" type="text" name="veiculo" disabled>
			<br>
			Marca do Veículo:
			<input value="<?php echo $marca; ?>" type="text" name="marca" disabled>
			<br>
			Modelo do Veículo:
			<input value="<?php echo $modelo; ?>" type="text" name="modelo" disabled>
			<br>
			Data de Fabricação:
			<input value="<?php echo $data; ?>" type="date" name="ano" disabled>
			<br>
			Quantidade em Estoque:
			<input value="<?php echo $quantidade; ?>" type="number" name="quantidade" disabled>
			<br>
			
			Quantidade de Entrada:
			<input type="number" name="entrada" required>
			<br>
			Foto do Veículo:
			<img src="img/<?php echo $foto; ?>">
			<br>
			<br>
			<button style="background-color: #9591F2;" class="button">Entrada</button>

		</form>
		<a href="dash.php"><button style="background-color: #242173;" class="button">Voltar</button></a>
	</div>
</body>
</html>
<?php
	}else{
	    header('Location: ./index.php');
	    exit();
		//echo "<div align='center' class='text-light '><h1>voce nao tem permissão para acessar esta página!</h1>";
		//echo '<a href="./index.php">Fechar</a></div>';
	}
?>