<?php

include('conexao.php');

if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $data = $_POST['data'];
    $sexo = $_POST['sexo'];
    $cargo = $_POST['cargo'];
    
    // $sql = "INSERT INTO alunos VALUES ($nome, $data, $sexo, $cargo)";
    // $res=mysqli_query($con,$sql);

    $mysqli->query("INSERT INTO funcionario (nome,data_nasc,sexo,cargo) VALUES ($nome, $data, $sexo, $cargo)") or die($mysqli->error);
    
    
}



?>


<div id="result">Clique no botão para falar!</div><br><br>


<form action="" method="post">
<div class="caixa">
<label for="">Nome:</label><br>
<input type="text" name="nome" id="nome" />
<label id="btn1" class="btn"></label><br><br>
</div>

<label for="">data:</label><br>
<input type="text" name="data" id="nome" />

<div class="caixa">
<label for="">sexo:</label><br>
<input type="text" name="sexo" id="sexo" />
<label id="btn3" class="btn"></label><br><br>
</div>

<div class="caixa">
<label for="">cargo:</label><br>
<input type="text" name="cargo" id="cargo" />
<label id="btn4" class="btn"></label><br><br>
</div>

<button name="cadastrar"> enviar</button>

  <br><br><br><br>
</div>



</form>


