<?php
include('conexao.php');

$sql = "SELECT nome,sobrenome, email,senha FROM usuario";

$resultado = $mysqli->query($sql);

// Verificar se o resultado contém linhas
if (mysqli_num_rows($resultado) > 0) {
  // Exibir os dados de cada linha
  while($linha = mysqli_fetch_assoc($resultado)) {
    echo "- Nome: " . $linha["nome"]. "<br>" . "- Sobrenome: " . $linha["sobrenome"]. "<br>" . "- Email: " . $linha["email"]. "<br>" . " - Senha: " . $linha["senha"]. "<br><br><br>";
  }
} else {
  echo "Nenhum resultado encontrado";
}
 


?>