<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Obtém os dados enviados
$Nome = $_POST['v1']; // Armazena Nome do Digimon fornecido pelo usuário
$Nivel = $_POST['v2']; // Armazena Nível do Digimon fornecido pelo usuário

// Define uma imagem padrão para o Digimon
$Img = 'https://digimon.shadowsmith.com/img/default.jpg'; // URL da imagem padrão

// Comando SQL para inserir os dados na tabela 'Digimons'
$inserir = "INSERT INTO Digimons(Nome, Nivel, Img) VALUES('$Nome', '$Nivel', '$Img')";

// Executa a consulta no banco de dados
$r = mysqli_query($con, $inserir);

// Redireciona o usuário para a página index.html após a inserção
header("location:index.html");
?>
