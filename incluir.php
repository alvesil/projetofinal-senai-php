<!DOCTYPE html>
<html>
<head>
    
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
			margin-left: 33%;
			margin-right: 33%;
		}
		form{
			width: 40%;
		}
		input{
			text-align: center;
		}
	</style>
	<title>Incluir</title>
</head>
<body>
    <?php 
	session_start();
	if (isset($_SESSION['login']) && isset($_SESSION['senha']) && $_SESSION['incluir'] == 's') {
		include "conexao.php";
		$chave = $_SESSION['chave'];
		if(strpos($chave, ' ')){
		    $_SESSION['spacechar'] = 's';
		    header('Location: ./dash.php');
		    exit();
		}
		$sql = "SELECT * FROM veiculos WHERE codigo = '$chave'";
		$resultado = mysqli_query($conexao, $sql);
		if (mysqli_num_rows($resultado) > 0) {
			//echo "<script type='text/javascript'>alert('Já existe um veículo cadastrado com o código $chave.');</script>";
			$_SESSION['alertaincluir'] = 's';
			header("Location: ./dash.php");
			//echo '<div align="center" style="margin-top: 200px; padding:30px;">Não existe um veículo cadastrado com o código'. $chave.', para ser excluido<br><br><a href="./dash.php"><button class="button alert" id="voltar">Voltar</button></a></div>';
			exit();
		}
	?>

	<div align="center">

		<h2>Incluir Veículos</h2>
		<form action="processar.php" enctype="multipart/form-data" method="POST">

			Código do Veículo:
			<input type="text" name="codigo" disabled value="<?php echo $chave; ?>">
			<input type="hidden" name="codigo" value="<?php echo $chave; ?>">
			<br>
			Nome do Veículo:
			<input type="text" name="veiculo">
			<br>
			Marca do Veículo:
			<select name="marca">
				<option value="Citroen">Citroen</option>
				<option value="Fiat">Fiat</option>
				<option value="Ford Motors">Ford Motors</option>
				<option value="General Motors">General Motors</option>
				<option value="Peugeot">Peugeot</option>
				<option value="Renault">Renault</option>
				<option value="VolksWagen">VolksWagen</option>
			</select>
			<br>
			Modelo do Veículo:
			<input type="text" name="modelo">
			<br>
			Data de Fabricação:
			<input type="date" name="ano">
			<br>
			Quantidade em Estoque:
			<input type="number" name="quantidade">
			<br>
			Foto do Veículo:
			<input type="file" name="foto">
			<br>
			<br>

			<button style="background-color: #9591F2;" class="button">Gravar</button>
		</form>
		<a href="dash.php"><button style="background-color: #242173;" class="button">Voltar</button></a>
	</div>
</body>
</html>
<?php
	}else{
		header('Location: ./index.php');
	    exit();
	}
?>