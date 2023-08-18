(()=> {
  const btn = document.getElementById('btn');
  const result = document.getElementById('result')
  const tela = document.body;

  if (window.SpeechRecognition || window.webkitSpeechRecognition) {
    const MySpeech = new webkitSpeechRecognition();
    MySpeech.lang = 'pt-BR';


    const onClick = () => {

      try {
        MySpeech.start();
        result.innerHTML = 'Estou ouvindo...'
      } catch (error) {

        alert('Erro ::' + error.message)
      }

    }


    const onSpeech = (event) => {

      const text = event.results[0][0].transcript;

      if (text.toLowerCase() === 'claro') {
        tela.classList.add('light')
        tela.classList.remove('dark')
      }
        

      if (text.toLowerCase() === 'escuro'){
        tela.classList.add('dark')
        tela.classList.remove('light')
      }

      if (text.toLowerCase() === 'google'){
        window.open("https://www.google.com", "_blank");
      }

      if (text.toLowerCase() === 'calculadora'){
        window.open("https://www.calculadoraonline.com.br/basica", "_blank");
      }

      if (text.toLowerCase() === 'banco'){
        window.open("https://www.bancointer.com.br/", "_blank");
      }

      if (text.toLowerCase() === 'sou pobre'){
        window.open("https://www.gov.br/pt-br/servicos/consultar-dados-do-cadastro-unico-cadunico", "_blank");
      }
      


      result.innerHTML = text || 'Ocorreu um erro!';

    }

    
    MySpeech.addEventListener('result', onSpeech);
    btn.addEventListener('click', onClick);
  } else {
    result.innerHTML = 'Seu navegador não tem suporte a API'
  }


})()












var txtinput = document.querySelector('#txtInput')
  var voiceList = document.querySelector('#voiceList')
  var btnspeak = document.querySelector('#btnSpeak')
  var synth = window.speechSynthesis;
  var voices = []

  Newvoices()


  if (speechSynthesis !== undefined) {
    speechSynthesis.onvoiceschanged = Newvoices
  }

btnspeak.addEventListener('click', () => {
var tospeak = new SpeechSynthesisUtterance(txtinput.value)
var selectedVoiceName = voiceList.selectedOptions[0].getAttribute('data-name');
voices.forEach((voice) => {
  if(voice.name === selectedVoiceName) {
    tospeak.voice = voice
  }
})

if(synth.speaking){
 synth.cancel()
}else{
synth.speak(tospeak);
}
})

function Newvoices () {
  voices = synth.getVoices()
  var selectedindex = voiceList.selectedindex < 0 ? 0 : voiceList.selectedindex
  voiceList.inneHTML = ''
  voices.forEach((voice) => {
    var listItem = document.createElement('option')
    listItem.textContent = voice.name
    listItem.setAttribute('data-lang', voice.lang)
    listItem.setAttribute('data-name', voice.name)
    voiceList.appendChild(listItem)

})

voiceList.selectedindex = selectedindex


}











