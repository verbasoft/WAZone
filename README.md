
<p style="text-align:center"><a href="https://wazone.it"><img src="https://verbasoft.github.io/WAZone/docs/logo_wazone_small.png"></a></p>

# [WAZone](https://wazone.it)

## Un incredibile servizio di Marketing e comunicazione.
Tramite il servizio WAZone puoi rivoluzionare la tua comunicazione digitale su WhatsApp.<br>
In pochi minuti puoi integrare il tuo programma o sistema informatico collegandolo a WA.

## Caratteristiche
- Invia messaggi testuali o multimediali immediati e/o schedulati
- Associazione di più numeri sul proprio account in base al profilo
- Importa o crea rubriche per gestire l'invio ai tuoi contatti
- ChatBot con autorisponditore per messaggi vocali o testuali
- WebHook per automatizzare eventi ai messaggi ricevuti
- RestAPI per integrare la tua applicazione, sito o portale internet
- Modulo mail2WA per inviare messaggi usando la posta elettronica
- Plugin di integrazione wordpress/woocommerce e altri ambienti

## Alcuni esempi
La libreria per gestire le API è scritta in PHP tuttavia nella cartella **esempi** potete trovare alcuni esempi di invio messaggi a WA usando diversi linguaggi di programmazione oltre a **PHP** anche **Javascript/NodeJS**, **Python**, **Bash**, **Powershell** e **Batch**.

## Uso della libreria API
Puoi usare questa libreria integrandola nel tuo sistema per inviare  messaggi testuali o multimediali, organizzare campagne massive, gestire prenotazioni e appuntamenti, avvisi e monitoraggio di sistemi informatici, autenticazione 2FA e molto altro!

## Come iniziare

#### Crea un account
- Crea un account WAZone [qui](https://wazone.app).
- Una volta attivato l'account, associa il tuo dispositivo tramite il QR-Code per accedere alle tue credenziali
- Per usare la libreria servono il DeviceID e il TokenAPI

#### Scarica la libreria
- Scarica la libreria PHP o clona usando **git** e inseriscila nel tuo progetto, oppure includila con **Composer** si trova su [**Packagist**](https://packagist.org/)


## Alcuni esempi d'uso della libreria PHP
Non tutti i parametri sono obbligatori. Fai riferimento alla Documentazione

#### Inizializza la libreria
```PHP

// include la libreria wazone (con composer usare l'autoloading)
include("class.wazone.php");

// wa_device e wa_token sono il numero di telefono e il token del cellulare
// si trovano nel pannello di gestione WAZone nelle proprietà del dispositivo
// registrarsi su https://wazone.app per avere un account di prova per 30gg
$wa_device = 'IL_TUO_NUMERO';
$wa_token = 'IL_TUO_TOKEN';

// numero di telefono del destinatario, ATTENZIONE: 
// i numeri di telefono devono essere nel formato 393123456789 
// (preceduti dal prefisso internazionale, '39' x l'italia)
$wa_number = 'DESTINATARIO';

// istanziare la classe WAZone
$WA = new WAZone($wa_device, $wa_token);

```

#### Invia messaggio testuale 
```PHP
// invio messaggio testuale
$API = $WA->SendText($wa_number, "Prova invio messaggio!");
if (!$API->success) {
   print "Errore invio messaggio \n";
} else {
   print "Messaggio inviato a $wa_number!!\n";
}

```

#### Invia immagine
```PHP
// url del file multimediale da inviare al destinatario
$urlmedia = "https://verbasoft.github.io/WAZone/docs/software.png";

// invia messaggio multimediale
$API = $WA->SendMedia($wa_number, $urlmedia);
if (!$API->success) {
   print "Errore invio messaggio!! \n";
} else {
   print "Messaggio inviato a $wa_number!!\n";
}
```

#### Invia documento pdf con testo
```PHP
// url del file multimediale da inviare al destinatario
$urlmedia = "https://verbasoft.github.io/WAZone/docs/mail2wa.pdf";

// invia messaggio multimediale
$API = $WA->SendMedia($wa_number, $urlmedia, "prova invio documento pdf...");
if (!$API->success) {
   print "Errore invio messaggio!! \n";
} else {
   print "Messaggio inviato a $wa_number!!\n";
}
```

## Documentazione
Puoi trovare la documentazione relativa all'uso del servizio WAZone  [quì](https://manuale.wazone.app)

## Assistenza
Se hai bisogno di aiuto puoi contattarci scrivendo a [supporto@verbasoft.net](mailto:supporto@verbasoft.net) o visitando la [pagina di supporto del servizio ](https://wazone.it/#CONTATTACI)

## Realizzazione
WAZone è una realizzazione by [Verbasoft.net](https://verbasoft.net)


<p style="text-align:center"><a href="https://wverbasoft.net"><img src="https://verbasoft.github.io/WAZone/docs/logo_verba.png"></a></p>