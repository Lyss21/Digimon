<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Obtém o ID do Digimon a ser excluído a partir da URL
$Id = $_GET["id"]; 

// Comando SQL para deletar o Digimon com o ID específico
$del = "DELETE FROM Digimons WHERE Id='$Id'";

// Executa a consulta no banco de dados
$r = mysqli_query($con, $del);

// Verifica se a consulta foi bem-sucedida
if ($r) 
{
    // Redireciona o usuário para a página exibir.php após a exclusão
    header("location:exibir.php");
}

else 
{
    // Exibe uma mensagem de erro caso a exclusão falhe
    echo "Erro ao excluir: " . mysqli_error($con); 
}
?>
