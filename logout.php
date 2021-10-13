<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="icon" href="./img/mustang.ico">
</head>
</html>
<?php
session_start();
$nome = $_SESSION['login'];
/*echo "<div align='center' style='margin-top: 300px;'><h1>Até logo, <a style='text-transform: capitalize;'>$nome</a></h1>";
echo '<a href="./index.php"><button class="btn btn-primary">Fechar</button></a></div>';*/
session_unset();
session_destroy();
header("Location: ./index.php?logout=true");
exit();
?>