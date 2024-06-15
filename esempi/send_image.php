<?PHP
//
// Esempio di invio messaggio multimediale WA con immagine (PNG)
//


// include la libreria wazone
include("../class.wazone.php");


// user e token sono il numero di telefono e il token del vostro cellulare
// si trovano nel pannello di gestione del servizio nelle proprietà del dispositivo.
// registrarsi su https://wazone.app per avere un account di prova per 30gg

$wa_user = 'IL_TUO_NUMERO';
$wa_token = 'IL_TUO_TOKEN';


// numero di telefono del destinatario, ATTENZIONE: i numeri di telefono devono
// essere nel formato 3934812345678 (preceduti dal prefisso internazionale, esempio: '39' x l'italia)

$wa_number = 'DESTINATARIO';

include "config.inc.php";

// url del file multimediale da inviare al destinatario
$urlmedia = "https://verbasoft.github.io/WAZone-API/docs/software.png";


// creazione della classe WAZone
$WA = new WAZone($wa_user, $wa_token);

// invio messaggio testuale
$API = $WA->SendMedia($wa_number, $urlmedia);

if (!$API->success) {
   print "Errore invio messaggio!! \n";
} else {
   print "Messaggio inviato a $wa_number!!\n";
}


?>
