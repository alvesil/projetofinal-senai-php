<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="icon" href="./img/mustang.ico">
</head>
</html>
<?php
    require_once "./conexao.php";
    session_start();
    $usuario = $_SESSION['cadastrologin'];
    $senha = $_SESSION['cadastrosenha'];
    $senhar = $_SESSION['cadastrosenhar'];
    $sql = "SELECT usuario, senha FROM usuarios WHERE usuario='$usuario' AND senha ='$senha'";
    if ($resultado = mysqli_query($conexao, $sql)) {
        # code...
        $teste = mysqli_num_rows($resultado);
        if (mysqli_num_rows($resultado) == 1) {
            # code...
            //echo '<div align="center" style="margin-top: 250px;"><h1>Usuário já cadastrado!</h1><a href="./cadastro.php"><button class="btn btn-outline-danger">Fechar</button></div>';
            header('Location: ./cadastro.php?hasregister=s');
            exit();
        }
        else{ 
            # code...
            $sql = "INSERT INTO usuarios(usuario, senha, incluir, alterar, excluir, consultar, entrada, saida, ativo) VALUES ('$usuario', '$senha','','','','','','','s')";
            if ($resultado = mysqli_query($conexao, $sql)) {
                # code...
                //echo '<div align="center" style="margin-top: 250px;"><h1>Cadastrado</h1><a href="./index.php"><button class="btn btn-primary">Fechar</button></a></div>';
                header('Location: ./index.php?registered=s');
                 exit();
            }else{
                //echo '<div align="center" style="margin-top: 250px;"><h1>Usuário já cadastrado!</h1><a href="./cadastro.php"><button class="btn btn-outline-danger">Fechar</button></a></div>';
                header('Location: ./cadastro.php?hasregister=s');
                $conexao->error;
            }
        }
        
        //  echo $teste."<br>";
        //  echo $usuario."<br>";
          echo $senha."<br>";
          echo $senhar;
    }
    $conexao->close();
?>