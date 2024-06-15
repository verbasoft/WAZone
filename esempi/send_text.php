<?php
##
## Esempio di invio messaggio WA in PHP
##
## @Una realizzazione (C) 2023/2024 Verbasoft
## @Sviluppato da Daniele Piselli <daniele@vebasoft.net>
##

## wa_device e wa_token sono il numero di telefono e il token del vostro cellulare
## si trovano nel pannello di gestione del servizio nelle proprietà del dispositivo
## registrarsi su https://wazone.app per avere un account di prova per 30gg
$wa_device='IL_TUO_NUMERO';
$wa_token='IL_TUO_TOKEN';

## numero di telefono del destinatario, ATTENZIONE: 
## i numeri di telefono devono essere nel formato 393123456789 
## (preceduti dal prefisso internazionale, '39' x l'italia)
$wa_dest='DESTINATARIO';

## Messaggio
$wa_text='Prova invio da PHP!';


$data = [
   'receiver'  => $wa_dest,
   'msgtext'   => $wa_text,
   'sender'    => $wa_device,
   'token'     => $wa_token,
];

$nodeurl = 'https://api.wazone.app/send';

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_URL, $nodeurl);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);
 
echo $response;

?>
