<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<title>Alterar</title>
</head>
<body>
    <?php 
	session_start();
	if (isset($_SESSION['login']) && isset($_SESSION['senha']) && $_SESSION['alterar'] == 's') {
	
		include "conexao.php";
		$chave = $_SESSION['chave'];
		$sql = "SELECT codigo FROM veiculos WHERE codigo = '$chave'";
		$resultado = mysqli_query($conexao, $sql);
		if (mysqli_num_rows($resultado) > 0) {
			// code...
			$sql = "SELECT * FROM veiculos WHERE codigo = '$chave'";
			$resultado = mysqli_query($conexao, $sql);
			$linhas = mysqli_fetch_array($resultado);
			$chave = $linhas['codigo'];
			$codigo = $linhas['codigo'];
			$nome = $linhas['veiculo'];
			$marca = $linhas['marca'];
			$modelo = $linhas['modelo'];
			$data = $linhas['ano'];
			$quantidade = $linhas['quantidade'];
			$foto = $linhas['foto'];
			//print_r($linhas); 
		}else{
			//echo "<script type='text/javascript'>alert('Não existe um veículo cadastrado com o código $chave, para ser alterado.');</script>";
			
			//echo '<div align="center" style="margin-top: 200px; padding:30px;">Não existe um veículo cadastrado com o código'. $chave.', para ser excluido<br><br><a href="./dash.php"><button class="button alert" id="voltar">Voltar</button></a></div>';
			
			$_SESSION['alertaAlterar'] = 's';
			
			header("Location: ./dash.php");
			exit();
		}
		
	?>
	<div align="center">
		<h2>Alterar Veículos</h2>

		<form action="processar.php" enctype="multipart/form-data" method="POST">

			Código do Veículo:
			<input type="text" name="codigo" disabled value="<?php echo $chave; ?>">
			<br>
			Nome do Veículo:
			<input type="text" name="veiculo" value="<?php echo $nome; ?>">
			<br>
			Marca do Veículo:
			<select name="marca">
				<option <?php if($marca == 'Citroen'){echo "selected";}?> value="Citroen">Citroen</option>
				<option <?php if($marca == 'Fiat'){echo "selected";}?> value="Fiat">Fiat</option>
				<option <?php if($marca == 'Ford Motors'){echo "selected";}?> value="Ford Motors">Ford Motors</option>
				<option <?php if($marca == 'General Motors'){echo "selected";}?> value="General Motors">General Motors</option>
				<option <?php if($marca == 'Peugeot'){echo "selected";}?> value="Peugeot">Peugeot</option>
				<option <?php if($marca == 'Renault'){echo "selected";}?> value="Renault">Renault</option>
				<option <?php if($marca == 'VolksWagen'){echo "selected";}?> value="VolksWagen">VolksWagen</option>
			</select>
			<br>
			Modelo do Veículo:
			<input type="text" name="modelo" value="<?php echo $modelo; ?>">
			<br>
			Data de Fabricação:
			<input type="date" name="ano" value="<?php echo $data; ?>">
			<br>
			Quantidade em Estoque:
			<input type="number" name="quantidade" value="<?php echo $quantidade; ?>">
			<br>
			Foto do Veículo:
			<?php $fotoAntiga = $foto; echo $fotoAntiga; ?>
			<input type="file" name="foto">
			<input type="hidden" name="fotoAntiga" value="<?php echo $fotoAntiga; ?>">
			<img src="img/<?php echo $foto; ?>"> 
			<br>
			<br>

			<button style="background-color: #9591F2;" class="button success">Alterar</button>
			
		</form>
		<a  href="dash.php"><button style="background-color: #242173;" class="button alert">Voltar</button></a>
	</div>
</body>
</html>
<?php
	}else{
		header('Location: ./index.php');
		//echo "<div align='center' class='text-light '><h1>voce nao tem permissão para acessar esta página!</h1>";
		//echo '<a href="./index.php">Fechar</a></div>';
	}
?>