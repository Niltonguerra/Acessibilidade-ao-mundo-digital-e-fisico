<?php
include('conexao.php');

$sql = "SELECT nome_funcionario, data_nasc, sexo, cargo FROM funcionario";

$resultado = $mysqli->query($sql);

// Verificar se o resultado contém linhas
if (mysqli_num_rows($resultado) > 0) {
  // Exibir os dados de cada linha
  while($linha = mysqli_fetch_assoc($resultado)) {
    echo "- Nome: " . $linha["nome_funcionario"]. "<br>" . "- Data de nascimento: " . $linha["data_nasc"]. "<br>" . "- sexo: " . $linha["sexo"]. "<br>" . " - Cargo: " . $linha["cargo"]. "<br><br><br>";
  }
} else {
  echo "Nenhum resultado encontrado";
}
 


?>