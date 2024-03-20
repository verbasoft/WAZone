<?PHP
//
// Esempio di invio messaggio multimediale WA con PDF
//


// include la libreria wazone
include("../class.wazone.php");


// user e token sono il numero di telefono e il token del vostro cellulare
// si trovano nel pannello di gestione del servizio nelle proprietà del dispositivo
// registrarsi su https://wazone.app per avere un account di prova per 30gg

$wa_user = 'il_tuo_numero';
$wa_token = 'il_tuo_token';


// numero di telefono del destinatario, ATTENZIONE: i numeri di telefono devono
// essere nel formato 3934812345678 (preceduti dal prefisso internazionale, esempio: '39' x l'italia)

$wa_number = 'destinatario';


// url del file multimediale da inviare al destinatario
$urlmedia = "https://dev2.verbasoft.net/docs/documento.pdf";


// creazione della classe WAZone
$WA = new WAZone($wa_user, $wa_token);

// invio messaggio testuale
$API = $WA->SendMedia($wa_number, $urlmedia, "Prova invio documento pdf...");

if (!$API->success) {
   print "Errore invio messaggio!! \n";
} else {
   print "Messaggio inviato a $wa_number!!\n";
}


?>
