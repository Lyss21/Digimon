<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Obtém o ID do Digimon a partir da URL
$Id = $_GET['Id'];

// Comando SQL para selecionar todos Digimon 
$query = "SELECT * FROM Digimons";

// Comando SQL para selecionar o Digimon específico pelo ID
$query = "SELECT * FROM Digimons WHERE Id='$Id'";
$r = mysqli_query($con, $query);

// Recupera os dados do Digimon
$digimon = mysqli_fetch_assoc($r);

// Obtém os valores do formulário
$Nome = isset($_POST['v1']) ? $_POST['v1'] : '';  // Nome do Digimon
$Nivel = isset($_POST['v2']) ? $_POST['v2'] : ''; // Nível do Digimon

// Inicia a consulta de busca
$query = "SELECT * FROM Digimons WHERE 1=1";

// Verifica se o Nome foi digitado e adiciona à consulta
if (!empty($Nome)) 
{
    $query .= " AND Nome LIKE '%$Nome%'"; // Adiciona LIKE para buscar nomes que contenham o valor informado
}

// Verifica se o Nível foi digitado e adiciona à consulta
if (!empty($Nivel)) 
{
    $query .= " AND Nivel = '$Nivel'"; // Filtra pelo nível exato informado
}

// Executa a consulta no banco de dados
$r = mysqli_query($con, $query);

// Inclui o CSS
echo "<link rel='stylesheet' href='style.css'>";

// Cabeçalho da página
echo "<h1 class='h1'>Resultados da Busca</h1>";

// Verifica se há resultados da consulta
if ($r->num_rows > 0) 
{
    // Cria uma tabela para exibir os resultados
    echo "<table class='table'>";
    echo "<tr>";
    echo "<td>ID</td>";
    echo "<td>Nome</td>";
    echo "<td>Nível</td>";
    echo "<td>Imagem</td>"; 
    echo "<td>Editar</td>";
    echo "<td>Excluir</td>";
    echo "</tr>";
    
    // Laço para percorrer os resultados e exibir cada um em uma linha da tabela
    while ($linha = $r->fetch_assoc()) 
    {
        echo "<tr>";
        echo "<td>" . $linha["Id"] . "</td>"; // Exibe o ID do Digimon
        echo "<td>" . $linha["Nome"] . "</td>"; // Exibe o Nome do Digimon
        echo "<td>" . $linha["Nivel"] . "</td>"; // Exibe o Nível do Digimon

        // Exibe a imagem do Digimon com o tamanho especificado
        echo "<td><img src='" . $linha["Img"] . "' alt='" . $linha["Nome"] . "' style='width: 100px; height: auto;'></td>";

        // Link para editar o Digimon
        echo "<td><a href='editar.php?Id=" . $linha["Id"] . "'>Editar</a></td>";

        // Link para excluir o Digimon
        echo "<td><a href='excluir.php?id=" . $linha["Id"] . "'>Excluir</a></td>";
        echo "</tr>";
    }
    
    echo "</table>"; // Fecha a tabela
} 

else 
{
    // Mensagem caso nenhum resultado seja encontrado
    echo "<p>Nenhum resultado encontrado.</p>";
}

// Botão para voltar à página inicial
echo "<fieldset class='voltar'>";
echo "<a href='index.html'>Voltar</a>";
echo "</fieldset>";

// Fecha a conexão com o banco de dados
$con->close();
?>
