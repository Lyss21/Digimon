<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Obtém os dados enviados via método POST
$Id = $_POST['v0']; // ID do Digimon a ser atualizado
$Nome = $_POST['v1']; // Novo nome do Digimon
$Nivel = $_POST['v2']; // Novo nível do Digimon

// Comando SQL para atualizar os dados do Digimon
$upd = "UPDATE Digimons SET Nome='$Nome', Nivel='$Nivel' WHERE Id='$Id'";

// Executa a consulta no banco de dados
$r = mysqli_query($con, $upd);

// Verifica se a consulta foi bem-sucedida antes de redirecionar
if ($r) 
{
    // Se a atualização foi bem-sucedida, redireciona para a página exibir.php
    header("Location: exibir.php");
    exit(); // Para que não continue
} 

else
{
    // Se houver um erro, exibe a mensagem de erro
    echo "Erro ao atualizar: " . mysqli_error($con);
}
?>
