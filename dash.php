<?php
	session_start();
	//print_r($_SESSION);
	if (isset($_SESSION['login']) && isset($_SESSION['senha']) && $_SESSION['ativo'] == 's') {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Compressed CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css" integrity="sha256-ogmFxjqiTMnZhxCqVmcqTvjfe1Y/ec4WaRj/aQPvn+I=" crossorigin="anonymous">
    <link rel="icon" href="./img/mustang.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Compressed JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/js/foundation.min.js" integrity="sha256-pRF3zifJRA9jXGv++b06qwtSqX1byFQOLjqa2PTEb2o=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<style type="text/css">
		table, th, tr, td{
			border: 1px solid;
			text-align: center;
		}
		th{
			background-color: #cdcdcd;
		}
		#pDiv{
		    padding: 30px;
			background-color: #fffffa;
		}
		#collapseOne1{
			width: 90%;
		}
		body{
			background-color: #252275;
		}
		.button{
			background-color: #928FF2;
			margin-left: 5px;
			margin-top: 10px
		}
		.button:hover{
			background-color: #4B46F0;	
		}
		::placeholder{
			color: #9f99F5;
		}
	</style>
	<title>Carros S.A</title>
</head>
<body>
    <!--
    <audio autoplay>
      <source src="./audio/bemtevi.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
    </audio>-->
        <?php
		# code...
		//echo "<h1>logado</h1>";

		include "conexao.php";
		include "funcoes.php";
		$acao = $_GET['acao'] ?? '';
		$codigo = $_GET['codigo'] ?? '';
		$_SESSION['chave'] = $codigo;

		if ($acao == 'Incluir Veículos') {
			$_SESSION['acao'] = 'incluir';
			header("Location: ./incluir.php");
			exit();
		}

		if ($acao == 'Alterar Veículos') {
			$_SESSION['acao'] = 'alterar';
			header("Location: ./alterar.php");
			exit();
		}

		if ($acao == 'Excluir Veículos') {
			$_SESSION['acao'] = 'excluir';
			header("Location: ./excluir.php");
			exit();
		}

		if ($acao == 'Entrada Veículos') {
			$_SESSION['acao'] = 'entrada';
			header("Location: ./entrada.php");
			exit();
		}

		if ($acao == 'Saída Veículos') {
			$_SESSION['acao'] = 'saida';
			header("Location: ./saida.php");
			exit();
		}
		?>
		<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
          <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
          </symbol>
          <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
          </symbol>
          <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </symbol>
        </svg>
        <?php
            if($_SESSION['alerta1'] == true){
        		?>
                <div align="center" class="alert alert-success alert-dismissible fade show" role="alert">
        		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                  <strong>Logado!</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
               $_SESSION['alerta1'] = false;
                }
                //print_r($_SESSION);
            if(isset($_SESSION['alertaincluir'])){
            	if ($_SESSION['alertaincluir'] == 's') {
            		// code...
            		?>
            		<div align="center" class="alert alert-primary alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Já existe um veículo cadastrado com este código, por favor tente outro!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
		            <audio autoplay>
                      <source src="audio/alert.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
            	<?php
            		}
        		?>
       
            <?php
            $_SESSION['alertaincluir'] = 'n';
            }
            if(isset($_SESSION['alertaAlterar'])){
            	if ($_SESSION['alertaAlterar'] == 's') {
            		// code...
            		?>
            		<div align="center" class="alert alert-primary alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Não existe um veículo cadastrado com este código, por favor tente outro!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
		            <audio autoplay>
                      <source src="audio/alert.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
            		<?php
            			}
            $_SESSION['alertaAlterar'] = 'n';
            }
        	?>
        	<?php
            if(isset($_SESSION['alertaExcluir'])){
            	if ($_SESSION['alertaExcluir'] == 's') {
            		// code...
            		?>
            		<div align="center" class="alert alert-primary alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Não existe um veículo cadastrado com este código, por favor tente outro!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
		            <audio autoplay>
                      <source src="audio/alert.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
            		<?php
            			}
            $_SESSION['alertaExcluir'] = 'n';
            }
        	?>
        	<?php
            if(isset($_SESSION['alertaSaida'])){
            	if ($_SESSION['alertaSaida'] == 's') {
            		// code...
            		?>
            		<div align="center" class="alert alert-primary alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Não existe um veículo cadastrado com este código, por favor tente outro!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
		            <audio autoplay>
                      <source src="audio/alert.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
            		<?php
            			}
            $_SESSION['alertaSaida'] = 'n';
            }
        	?>
        	<?php
            if(isset($_SESSION['alertaEntrada'])){
            	if ($_SESSION['alertaEntrada'] == 's') {
            		// code...
            		?>
            		<div align="center" class="alert alert-primary alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Não existe um veículo cadastrado com este código, por favor tente outro!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
		            <audio autoplay>
                      <source src="audio/alert.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
            		<?php
            			}
            $_SESSION['alertaEntrada'] = 'n';
            }
        	?>
        	<?php
            if(isset($_SESSION['adicionadoAlert'])){
            	if ($_SESSION['adicionadoAlert'] == 's') {
            		// code...
            		?>
            		<div align="center" class="alert alert-success alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Veiculo Cadastrado!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
            		<?php
            	}else if($_SESSION['adicionadoAlert'] == 'n') {
            		// code...
            	
					?>
            		<div align="center" class="alert alert-alert alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Não foi possível cadastrar, contate o suporte!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
		            <audio autoplay>
                      <source src="audio/alert.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
            		<?php
            	}
            $_SESSION['adicionadoAlert'] = 'x';
            }
        	?>
        	<?php
            if(isset($_SESSION['alteradoAlert'])){
            	if ($_SESSION['alteradoAlert'] == 's') {
            		// code...
            		?>
            		<div align="center" class="alert alert-success alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Cadastro de veículo alterado!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
            		<?php
            	}else if($_SESSION['alteradoAlert'] == 'n') {
            		// code...
            	
					?>
            		<div align="center" class="alert alert-alert alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Não foi possível alterar o cadastro, contate o suporte!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
		            <audio autoplay>
                      <source src="audio/alert.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
            		<?php
            	}
            $_SESSION['alteradoAlert'] = 'x';
            }
        	?>
			<?php
            if(isset($_SESSION['excluirAlert'])){
            	if ($_SESSION['excluirAlert'] == 's') {
            		// code...
            		?>
            		<div align="center" class="alert alert-success alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Cadastro de veículo excluido!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
            		<?php
            	}else if($_SESSION['excluirAlert'] == 'n') {
            		// code...
            	
					?>
            		<div align="center" class="alert alert-alert alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Não foi possível excluir o cadastro, contate o suporte!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
		            <audio autoplay>
                      <source src="audio/alert.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
            		<?php
            	}
            $_SESSION['excluirAlert'] = 'x';
            }
        	?>
        	<?php
            if(isset($_SESSION['entradaAlert'])){
            	if ($_SESSION['entradaAlert'] == 's') {
            		// code...
            		?>
            		<div align="center" class="alert alert-success alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Entrada no estoque de veículo efetuada!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
            		<?php
            	}else if($_SESSION['entradaAlert'] == 'n') {
            		// code...
            	
					?>
            		<div align="center" class="alert alert-alert alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Não foi possível alterar o estoque, contate o suporte!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
		            <audio autoplay>
                      <source src="audio/alert.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
            		<?php
            	}
            $_SESSION['entradaAlert'] = 'x';
            }
        	?>
        	<?php
            if(isset($_SESSION['saidaAlert'])){
            	if ($_SESSION['saidaAlert'] == 's') {
            		// code...
            		?>
            		<div align="center" class="alert alert-success alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Saída no estoque de veículo efetuada!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
            		<?php
            	}else if($_SESSION['saidaAlert'] == 'n') {
            		// code...
            	
					?>
            		<div align="center" class="alert alert-alert alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>Não foi possível alterar o estoque, contate o suporte!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
		            <audio autoplay>
                      <source src="audio/alert.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
            		<?php
            	}
            $_SESSION['saidaAlert'] = 'x';
            }
        	?>
        	<?php
            if(isset($_SESSION['spacechar'])){
            	if ($_SESSION['spacechar'] == 's') {
            		// code...
            		?>
            		<div align="center" class="alert alert-danger alert-dismissible fade show" role="alert">
		    		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
		              <strong>O código não pode conter espaços!</strong>
		              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		            </div>
		            <audio autoplay>
                      <source src="audio/alert.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
            		<?php
            		$_SESSION['spacechar'] = 'n';
            	    }
					?>
            		<?php
            	}
            
        	?>
			<form action="dash.php" method="GET">
				<?php
					$acesso = $_SESSION['login'];
					$sql = "SELECT * FROM usuarios WHERE usuario = '$acesso'";
					if($resultado = mysqli_query($conexao, $sql)){
						$linhas = mysqli_fetch_array($resultado);
						$incluir = $linhas['incluir'];
						$alterar = $linhas['alterar'];
						$excluir = $linhas['excluir'];
						$entrada = $linhas['entrada'];
						$saida = $linhas['saida'];
						$ativo = $linhas['ativo'];
						$_SESSION['incluir'] = $incluir;
						$_SESSION['alterar'] = $alterar;
						$_SESSION['excluir'] = $excluir;
						$_SESSION['entrada'] = $entrada;
						$_SESSION['saida'] = $saida;
						$_SESSION['ativo'] = $ativo;
					}
				?>

				<nav style="background-color: #252275;" class="navbar navbar-expand-lg navbar-dark">
				<div class="container-fluid">
					<a class="navbar-brand" href="#"><img style="width: 75px;" src="./img/mustang.ico"></a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
						<input style="margin-top: 10px;" placeholder="Código do Veículo" type="text" name="codigo" required size="20" maxlength="7">
						</li>
						<li class="nav-item">
						<input <?php if($incluir != 's'){echo "disabled";}?> class="button" type="submit" name="acao" value='Incluir Veículos'>
						</li>
						<li class="nav-item dropdown">
						<input <?php if($alterar != 's'){echo "disabled";}?> class="button" type="submit" name="acao" value='Alterar Veículos'>
						</li>
						<li class="nav-item">
						<input <?php if($excluir != 's'){echo "disabled";}?> class="button" type="submit" name="acao" value='Excluir Veículos'>
						</li>
						<li class="nav-item">
						<input <?php if($entrada != 's'){echo "disabled";}?> class="button" type="submit" name="acao" value='Entrada Veículos'>
						</li>
						<li class="nav-item">				
						<input <?php if($saida != 's'){echo "disabled";}?> class="button" type="submit" name="acao" value='Saída Veículos'>
						</li>
						
					</ul>
					<ul class="navbar-nav mb-2 mb-lg-0">
						<li class="nav-item dropdown">
						<a style="height: auto; text-transform: capitalize;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Logado como <?php $usuario = $_SESSION['login']; echo "$usuario"; ?>
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a style="text-align: center; font-size: 15pt; color: #dc0310;" class="dropdown-item" href="./logout.php">Sair</a>
						</ul>
					</li>
					</ul>
					</div>
				</div>
				</nav>

				</form>
		<div id="pDiv" align="center">
			<h1 align="center">Sistema de Cadastro de Veículo</h1>
            <div class="dropdown d-inline" style="margin-left: 5%">
                
            </div>
			<p align="center">Este sistema cadastra os veiculos para saber quantos tem em estoque</p>
			<br>
			<br>
			
			
			<div class="accordion w-100" id="accordionExample">
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingOne">
				<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					<h3>Mostrar Gráfico</h3>
				</button>
				</h2>
				<div id="collapseOne" class="accordion-collapse collapse show text-center" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="height: 500px;">
				</div>
			</div>
			</div>
			
			<br>
		</div>

	
	?>
	<?php 
		$sql = "SELECT * FROM veiculos WHERE 1";
		if($resultado = mysqli_query($conexao, $sql)){
			// code...
			?>
			<!--<table class="hover">
					<tr>
						<th>Código do Veículo</th>
						<th>Nome do Veículo</th>
						<th>Marca do Veículo</th>
						<th>Modelo do Veículo</th>
						<th>Data de Fabricação</th>
						<th>Quantidade em Estoque</th>
					</tr>-->
			<?php
			$vW = 0;
			$gM = 0;
			$fT = 0;
			$cT = 0;
			$fD = 0;
			$vW = 0;
			$rN = 0;
			$pG = 0;
		
			while ($linhas = mysqli_fetch_array($resultado)) {
				// code...
				if ($linhas['marca'] == 'VolksWagen') {
					// code...
					$vW += $linhas['quantidade'];	
					
				}
				if ($linhas['marca'] == 'General Motors') {
					// code...
					$gM += $linhas['quantidade'];	
					
				}
				if ($linhas['marca'] == 'Fiat') {
					// code...
					$fT += $linhas['quantidade'];	
					
				}
				if ($linhas['marca'] == 'Renault') {
					// code...
					$rN += $linhas['quantidade'];	
					
				}
				if ($linhas['marca'] == 'Citroen') {
					// code...
					$cT += $linhas['quantidade'];	
					
				}
				if ($linhas['marca'] == 'Ford Motors') {
					// code...
					$fD += $linhas['quantidade'];	
					
				}
				if ($linhas['marca'] == 'Peugeot') {
					// code...
					$pG += $linhas['quantidade'];	
					
				}
				?>
					<!--<tr>
						<td><?php echo $linhas['codigo']; ?></td>
						<td><?php echo $linhas['veiculo']; ?></td>
						<td><?php echo $linhas['marca']; ?></td>
						<td><?php echo $linhas['modelo']; ?></td>
						<td><?php echo formataData($linhas['ano']); ?></td>
						<td><?php echo $linhas['quantidade']; ?></td>
					</tr>
					<tr>
						<td style="background-color: #dedede;" colspan="6">
							<img src="img/<?php echo $linhas['foto']; ?>">
						</td>
					</tr>-->
					<?php
					echo '
					<div align="center" class="container">
                        <div class="row">
                            <div class="col">
                                <div class="card mb-6" style="max-width: 1000px;">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                        <img style"height: auto;" src="img/'.$linhas['foto'].'" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">'.$linhas['marca'].'</h5>
                                            <p class="card-text">'.$linhas['veiculo'].'</p>
                                            <p class="card-text">'.$linhas['modelo'].'</p>
                                            <p class="card-text">Ano: '.formatadata($linhas['ano']).'</p>
                                            <p class="card-text">Código: '.$linhas['codigo'].'</p>
                                            <p class="card-text"><small class="text-muted">Estoque: '.$linhas['quantidade'].'</small></p> 
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                	?>
				<?php
			}
			?><!-- </table>--><?php
		}
	?>
<script>
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {
	var data = google.visualization.arrayToDataTable([
	  ['Carros', 'Estoque'],
	  ['VolksWagen',<?php echo $vW; ?>],
	  ['General Motors',<?php echo $gM; ?>],
	  ['Ford',<?php echo $fD; ?>],
	  ['Fiat',<?php echo $fT; ?>],	 
	  ['Renault',<?php echo $rN; ?>],
	  ['Peugeot',<?php echo $pG; ?>],
	  ['Citroen',<?php echo $cT; ?>]
	]);

	var options = {
	  title:'Quantidade de carros no sistema',
	  is3D:true
	};

	var chart = new google.visualization.PieChart(document.getElementById('collapseOne'));
	  chart.draw(data, options);
	}
	$(document).foundation();
</script>
<footer align="center" style=" background-color: #4B46F0; postition: fixed; left: 0; bottom: 0; width: 100%; padding: 30px; color: #ffffff;">
    <h4>Desenvolvido por @Eduardo Alves - 2021</h4>
</footer>
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