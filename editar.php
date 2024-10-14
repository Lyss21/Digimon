<!DOCTYPE html>
<html>
 <head>
    <!-- Título da página que aparece na aba do navegador -->
    <title>Atualizar Lista</title>
    
    <!-- Engloba todos os caracteres especiais -->
    <meta charset="utf-8">
    
    <!-- Inclui um arquivo CSS externo -->
    <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <body>

   <?php
    // Inclui o arquivo de conexão com o banco de dados
    include 'conexao.php';
   
    // Obtém o ID do Digimon a ser atualizado a partir da URL
    $Id = $_GET["Id"];
	
    // Comando SQL para selecionar o Digimon com o ID específico
	$selc = "SELECT * FROM Digimons WHERE Id='$Id'";
	
    // Executa a consulta no banco de dados
	$r = mysqli_query($con, $selc);
	
    // Armazena os dados do Digimon
	$recebe = mysqli_fetch_assoc($r);
   ?>

   <!-- Cabeçalho principal da página -->
   <h1 class="h1">Atualizar</h1>
   
   <!-- Tabela que contém o formulário para atualização dos dados -->
   <table class="field">

    <!-- Formulário que será enviado para 'update.php' -->
    <form method="post" action="update.php">
      <tr>
        <!-- Campo oculto para armazenar o ID do Digimon -->
		<input type="hidden" name="v0" value="<?php echo $recebe["Id"]; ?>">

		<!-- Campo para o usuário digitar o nome do Digimon -->
		<td> Digite o Nome do Digimon:
         <input type="text" required name="v1" value="<?php echo $recebe["Nome"]; ?>"> <!-- O valor pré-preenchido é o nome atual do Digimon -->
        </td>
		 
        <!-- Campo para o usuário digitar o level do Digimon -->
        <td> Digite o Level do Digimon:
         <input type="text" required name="v2" value="<?php echo $recebe["Nivel"]; ?>"> <!-- O valor pré-preenchido é o nível atual do Digimon -->
        </td>
      </tr>

	  <!-- Botão de envio do formulário, que exibe "Atualizar" -->
	  <td colspan="2"><p><input type="submit" value="Atualizar"></p></td>
    </form> 
	</table>
 </body>
</html>
