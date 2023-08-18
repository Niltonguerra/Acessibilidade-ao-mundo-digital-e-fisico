<?php
include('conexao.php');

// if(isset($_POST['cadastrar'])){
//     $nome = $_POST['nomee'];
//     $data = $_POST['dataa']; 
//     $sexo = $_POST['sexoo'];
//     $cargo = $_POST['cargoo'];
    
//     $mysqli->query("INSERT INTO usuario (nome_funcionario, data_nasc, sexo, cargo) VALUES ('$nome', '$data', '$sexo','$cargo')") or die($mysqli->error);

//   }


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
<label for="">data de nascimento:</label><br>
<input type="text" class="form-control datepicker" id="data" name="dataa">
</div>

<div class="caixa">
<label for="">sexo:</label><br>
<input type="text" name="sexoo" id="sexo" />
<a id="btn3" class="btn"></a><br><br>
</div>

<div class="caixa">
<label for="">cargo:</label><br>
<input type="text" name="cargoo" id="cargo"/>
<a id="btn4" class="btn"></a><br><br>
</div>


<button id="btn__pr" name="cadastrar"> enviar</button>

  <br><br><br><br>
</div>
</form>

<a href="http://localhost/web-speech-main/web-speech-main-alterado/lista.php">lista</a>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
  // Inicializa o Bootstrap Datepicker
  $(document).ready(function(){
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy', // Define o formato da data
      language: 'pt-BR', // Define o idioma do datepicker
      autoclose: true // Fecha o datepicker após selecionar uma data
    });
  });
</script>

<script>
    var botao = document.getElementById("btn__pr");


  
function primeiraFuncao(){
  return new Promise((resolve) =>{
      setTimeout(() => {
          console.log("esperou aqui");
          resolve();
      }, 1000)
  })
}

botao.onclick = async function (){
  var minhaJanela = window.open( "http://localhost:8180/toggle/1/rota","_blank","width=30,height=30,top=30000,left=30000");

  await primeiraFuncao();
  minhaJanela.close();
}


const btn1 = document.getElementById('btn1');
  const btn3 = document.getElementById('btn3');
  const btn4 = document.getElementById('btn4');
  const result = document.getElementById('result');
  const nome = document.getElementById('nome');
  const cargo = document.getElementById('cargo');
  const sexo = document.getElementById('sexo');
  


  














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

    
    const onClick3 = (var1) => {

      try {
        mensagem.text = var1;
        mensagem.voice = vozes[1]; 
        speechSynthesis.speak(mensagem);

        MySpeech3.start();
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


      sexo.value = text || 'Ocorreu um erro!';


        mensagem.text = sexo.value;
        mensagem.voice = vozes[1]; 
        speechSynthesis.speak(mensagem);


    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    const onSpeech3 = (event) => {

      const text = event.results[0][0].transcript;


      cargo.value = text || 'Ocorreu um erro!';


        mensagem.text = cargo.value;
        mensagem.voice = vozes[1]; 
        speechSynthesis.speak(mensagem);


    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    // MySpeech.addEventListener('result', onSpeech);
        btn1.addEventListener('click', function() {onClick1('qual é o seu primeiro nome?');} );
        primeiraFuncao();
        MySpeech1.addEventListener('result',onSpeech1);

    


    MySpeech2.addEventListener('result',onSpeech2);
    btn3.addEventListener('click', function() {onClick2('qual é o seu sexo?');} );

    MySpeech3.addEventListener('result',onSpeech3);
    btn4.addEventListener('click', function() {onClick3('qual é o seu cargo no trabalho?');} );












  } else {
    result.innerHTML = 'Seu navegador não tem suporte a API'
  }









</script>

</html>

