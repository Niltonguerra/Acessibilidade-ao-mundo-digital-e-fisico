<?php
include('conexao.php');



if(isset($_POST['cadastrar'])){
    $nome = $_POST['nomee'];
    $sobrenome = $_POST['sobrenomee']; 
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // verifica o tamanho da senha
    $tamanhosenha = strlen($senha);

    // verifica o email
    $padrao = '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/';


    if($tamanhosenha>=6 && preg_match($padrao, $email)){

// envia para o banco de dados
      echo "Dados enviados com sucesso!";
      $mysqli->query("INSERT INTO usuario (nome,sobrenome, email, senha) VALUES ('$nome', '$sobrenome', '$email','$senha')") or die($mysqli->error);


    }else if($tamanhosenha>=6 || preg_match($padrao, $email) ){
       echo "Senha muito curta, ela deve ter no mínimo 6 caracteres ou o email foi preenchino incorretamente, por favor verifique os dados inseridos!";
      
    }
    else{
       echo "A senha é o email estão incorretos! ";
      
    }













  }


?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Speech</title>
  




  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="./style.css" />


  <!-- <script src="main.js" defer></script> -->

</head>


<body>


<div id="result">Clique no botão para falar!</div><br><br>


<form action="index.php" method="post">


<div class="caixa">
<label for="">Nome:</label><br>
<input type="text" name="nomee" id="nome"/>
<a id="btn1" class="btn"></a><br><br>

</div>


<div class="caixa">
<label for="">sobrenome:</label><br>
<input type="text" name="sobrenomee" id="sobrenome" />
<a id="btn3" class="btn"></a><br><br>
</div>

<div class="caixa">
<label for="">Email:</label><br>
<input type="text" name="email" id="email"/>
</div>

<div class="caixa">
<label for="">Senha:</label><br>
<input type="text" name="senha" id="senha"/>
</div><br>

<button id="btn__pr" name="cadastrar"> enviar</button>

  <br><br><br><br>
</div>
</form>

<a href="http://localhost/xampp_projetos/web-speech-main/atividade_web/lista.php">lista</a>
</body>



</script>

<script>



  const btn1 = document.getElementById('btn1');
  const btn3 = document.getElementById('btn3');
  const result = document.getElementById('result');
  const nome = document.getElementById('nome');
  const Sobrenome = document.getElementById('Sobrenome');
  


  














  if (window.SpeechRecognition || window.webkitSpeechRecognition) {
    const MySpeech1 = new webkitSpeechRecognition();
    MySpeech1.lang = 'pt-BR';

    const MySpeech2 = new webkitSpeechRecognition();
    MySpeech2.lang = 'pt-BR';

    const MySpeech3 = new webkitSpeechRecognition();
    MySpeech3.lang = 'pt-BR';







    const mensagem = new SpeechSynthesisUtterance();
    const vozes = speechSynthesis.getVoices();






    const onClick1 =(var1) => {

      try {
        //configuração da voz
        mensagem.text = var1;
        mensagem.voice = vozes[1]; 
        speechSynthesis.speak(mensagem);

        
        
        //execução da voz
        MySpeech1.start();
        var1.value = 'Estou ouvindo...'
      } catch (error) {
        
        alert('Erro ::' + error.message)
      }

    }

    
    const onClick2 = (var1) => {

      try {
        mensagem.text = var1;
        mensagem.voice = vozes[1]; 
        speechSynthesis.speak(mensagem);

        MySpeech2.start();
        var1.value = 'Estou ouvindo...'
      } catch (error) {

        alert('Erro ::' + error.message)
      }

    }




    const onSpeech1 =(event) => {
      const text = event.results[0][0].transcript;


      nome.value = text || 'Ocorreu um erro!';


        mensagem.text = nome.value;
        mensagem.voice = vozes[1]; 
        speechSynthesis.speak(mensagem);
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    const onSpeech2 = (event) => {

      const text = event.results[0][0].transcript;


      sobrenome.value = text || 'Ocorreu um erro!';


        mensagem.text = sobrenome.value;
        mensagem.voice = vozes[1]; 
        speechSynthesis.speak(mensagem);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




    // MySpeech.addEventListener('result', onSpeech);
    btn1.addEventListener('click', function() {onClick1('qual é o seu primeiro nome?');} );
    MySpeech1.addEventListener('result',onSpeech1);

    MySpeech2.addEventListener('result',onSpeech2);
    btn3.addEventListener('click', function() {onClick2('qual é o seu Sobrenome?');} );


  } else {
    result.innerHTML = 'Seu navegador não tem suporte a API'
  }









</script>

</html>

