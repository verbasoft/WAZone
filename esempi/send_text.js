//
// Esempio di invio messaggio WA in NodeJS
//
// @Una realizzazione (C) 2023/2024 Verbasoft
// @Sviluppato da Daniele Piselli <daniele@verbasoft.net>
//

// Modulo per invio API usa axios
// se non installato usare: npm install axios
const axios = require('axios');

// wa_device e wa_token sono il numero di telefono e il token del vostro cellulare
// si trovano nel pannello di gestione del servizio nelle proprietà del dispositivo
// registrarsi su https://wazone.app per avere un account di prova per 30gg
wa_device='IL_TUO_NUMERO';
wa_token='IL_TUO_TOKEN';

// numero di telefono del destinatario, ATTENZIONE: 
// i numeri di telefono devono essere nel formato 393123456789 
// (preceduti dal prefisso internazionale, '39' x l'italia)
wa_dest='DESTINATARIO';

// Messaggio
wa_text='Prova invio da NodeJS!';

// chiamata API POST
axios.post("https://api.wazone.app/send", {
  receiver: wa_dest,
  msgtext: wa_text,
  sender: wa_device,
  token: wa_token
})
.then((response) => console.log(response.data))
.catch((err) => console.log(err));
