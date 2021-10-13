<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Compressed CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css" integrity="sha256-ogmFxjqiTMnZhxCqVmcqTvjfe1Y/ec4WaRj/aQPvn+I=" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Compressed JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/js/foundation.min.js" integrity="sha256-pRF3zifJRA9jXGv++b06qwtSqX1byFQOLjqa2PTEb2o=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
	<link rel="icon" href="./img/mustang.ico">
	<style type="text/css">
		body{
			background-color: #252275;
		}
		input{
		   text-align:center;
		}
	</style>
	<title>Carros S.A(Login)</title>
</head>
<?php
	session_start();
    //print_r($_SESSION);
    if (isset($_POST['log'])) {
        # code...
        $codigo = $_POST['nome'];
        $senha = $_POST['senha'];
        $_SESSION['login'] = $codigo;
        $_SESSION['senha'] = $senha;
        header("Location: ./login.php");
	    exit();
    }
?>
<body>
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

        if (isset($_SESSION['wrongpass'])) {
            // code...
            if($_SESSION['wrongpass'] == 's'){
            $_SESSION['wrongpass'] = 'n';
            ?>
            
            <div align="center" class="alert alert-danger alert-dismissible fade show" role="alert">
               <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
              <strong>Senha e/ou Usuário Incorretos! Tente novamente!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
        }
        if (isset($_SESSION['active'])) {
            // code...
            if($_SESSION['active'] == 'n'){
            $_SESSION['active'] = 's';
        ?>
        
        <div align="center" class="alert alert-danger alert-dismissible fade show" role="alert">
           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
          <strong>Usuário Bloqueado! Consulte o Suporte!</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
        }
        }
        if (isset($_GET['logout'])) {
            // code...
            if($_GET['logout'] == 'true'){
            ?>
            <div align="center" class="alert alert-danger alert-dismissible fade show" role="alert">
               <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
              <strong>Você Saiu! Faça Login novamente para acessar!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
        }
        if (isset($_GET['registered'])) {
            // code...
            if($_GET['registered'] == 's'){
            ?>
            <div align="center" class="alert alert-success alert-dismissible fade show" role="alert">
		    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <strong>Cadastro efetuado com sucesso!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
            }
        }
        
    ?>
    <div style="margin: 0; width: 100%;" align="center">
        
        <form style="width: 75%; height: 800px; background-color: #ffffff;" align="center" action="./index.php" method="post">
            <img src="./img/mustang-bgless.png">
            <div align="center" style="width:50%; margin-left:25%;">
                <label>Usuário</label>
                <input align="center" required name="nome" type="text">
            </div>
            <div align="center" style="width:50%; margin-left:25%;">
                <label>Senha</label>
                <input required name="senha" type="password" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Nunca compartilhe sua senha com terceiros.</div>
            </div>
            <br>
            <div>
                <label>Não tenho cadastro, <a href="./cadastro.php">cadastrar-me.</label>
            </div>
            <br>
            <br>
            <button style="background-color: #9591F7;" name="log" type="submit" class="button success w-25">Logar</button><br><br>
            
        </form>
    </div>
    
</body>
</html>


