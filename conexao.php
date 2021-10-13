<?php 

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'projetovespertino';

if ($conexao = mysqli_connect($servidor,$usuario,$senha,$banco)) {
	// tudo ok
}
else
{
	die('Não foi possivel conectar no banco de dados' . $conexao->error );
}

?>