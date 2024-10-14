<?php
// Definição das variáveis para conexão com o banco de dados
$servidor = "localhost"; // Endereço do servidor de banco de dados
$usuario = "root";       // Nome de usuário para acessar o banco de dados
$senha = "sql24";        // Senha do usuário do banco de dados
$bd = "Digimon";         // Nome do banco de dados que será acessado

// Estabelecendo a conexão com o banco de dados usando MySQLi
$con = mysqli_connect($servidor, $usuario, $senha, $bd) 
    or die('Erro na conexão'); // Se a conexão falhar, exibe uma mensagem de erro

?>
