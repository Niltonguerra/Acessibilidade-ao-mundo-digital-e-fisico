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
      const text = event.results[5][5].transcript;


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







///////////////////////////////////////////////////////////





