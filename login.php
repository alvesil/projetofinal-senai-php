<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="icon" href="./img/mustang.ico">
</head>
</html>
<?php
session_start();
    include_once "conexao.php";
    $nome = $_SESSION['login'] ?? '';
    $senha = $_SESSION['senha'] ?? '';
    $validar = md5($senha);
    $sql = "SELECT usuario, senha FROM usuarios WHERE usuario='$nome' AND senha='$validar'";
    if ($resultado = mysqli_query($conexao, $sql)) {
        # code...
        if (mysqli_num_rows($resultado) == 1) {
            # code...
            $sql = "SELECT * FROM usuarios WHERE usuario = '$nome'";
            if($resultado = mysqli_query($conexao, $sql)){
                $linhas = mysqli_fetch_array($resultado);
                $ativo = $linhas['ativo'];
                $_SESSION['ativo'] = $ativo;
                if ($ativo != 's') {
                    // code...
                    header("Location: ./index.php");
                    $_SESSION['active'] = 'n';
                    exit();
                }
                $_SESSION['alerta1'] = true;
                header("Location: ./dash.php");
                exit();
                /*
                echo "<div align='center' style='margin-top: 300px;'><h1>Bem vindo, <a style='text-transform: capitalize;'>$nome</a></h1>";
                echo '<a href="./dash.php"><button class="btn btn-primary">Fechar</button></a></div>';
                */
            }
            
        }else{
            /*
            echo "<div align='center' style='margin-top: 300px;'><h1>Usuário ou Senha inválidos!</h1>";
            echo '<a href="./index.php"><button class="btn btn-danger">Fechar</button></a></div>';
            */
            $_SESSION['wrongpass'] = 's';
            header("Location: ./index.php");
            exit();
            //session_unset();
            //session_destroy();
        }
       // echo $senha;
    }
$conexao->close();
?>