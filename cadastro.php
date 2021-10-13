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
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<style type="text/css">
		body{
			background-color: #252275;
		}
		input{
			text-align: center;
		}
	</style>
	<title>Carros S.A(Login)</title>
</head>
<?php
	session_start();

    if (isset($_POST['log'])) {
        # code...
        $codigo = $_POST['nome'];
        $senha = $_POST['senha'];
        $senhar = $_POST['senhar'];
        $_SESSION['cadastrologin'] = $codigo;
        $_SESSION['cadastrosenha'] = md5($senha);
        $_SESSION['cadastrosenhar'] = md5($senhar);
        header("Location: ./cadastrar.php");
	    exit();
    }
     if (isset($_GET['hasregister'])) {
        // code...
        if($_GET['hasregister'] == 's'){
        ?>
        <div align="center" class="alert alert-danger alert-dismissible fade show" role="alert">
           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <strong>Usuário já cadastrado, por favor escolha outro nome de usuário!</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        }
    }
?>
<body>
    <div align="center" style="margin: 0; width: 100%;" align="center">
    <form class="bg-light" style="width: 75%; height: 800px;" align="center" action="./cadastro.php" method="post">
        <img src="./img/mustang-bgless.png">
        <div >
            <label>Usuário</label>
            <input align="center" style="width:50%; margin-left:25%;" required name="nome" type="text">
            </div>
            <div>
            <label>Senha</label>
            <input align="center" style="width:50%; margin-left:25%;" required name="senha" type="password">
            <label>Confirme a Senha</label>
            <input align="center" style="width:50%; margin-left:25%;" required name="senhar" type="password" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Nunca compartilhe sua senha com terceiros.</div>
            </div>
            <br>
            <label>Já tenho cadastro, <a href="./index.php">Logar-me.</label><br><br>
        <button style="background-color: #9591F7;" name="log" type="submit" class="button success w-25">Cadastrar</button><br><br>
    </form>
    </div>
</body>
</html>

