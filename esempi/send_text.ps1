##
## Esempio di invio messaggio WA in PowerShell
##
## @Una realizzazione (C) 2023/2024 Verbasoft
## @Sviluppato da Daniele Piselli <daniele@vebasoft.net>
##

## wa_device e wa_token sono il numero di telefono e il token del vostro cellulare
## si trovano nel pannello di gestione del servizio nelle proprietà del dispositivo
## registrarsi su https://wazone.app per avere un account di prova per 30gg
$wa_device = 'IL_TUO_NUMERO';
$wa_token = 'IL_TUO_TOKEN';

## numero di telefono del destinatario, ATTENZIONE: 
## i numeri di telefono devono essere nel formato 393123456789 
## (preceduti dal prefisso internazionale, '39' x l'italia)
$wa_dest='DESTINATARIO';

## Messaggio
$wa_text = 'Invio da PowerShell Windows!';


## chiamata RestAPI POST
$postParams = @{
    receiver=$wa_dest;
    msgtext=$wa_text;
    sender=$wa_device;
    token=$wa_token
}

$Response = Invoke-WebRequest -Uri https://api.wazone.app/send -Method POST -Body $postParams
if ($Response.Content -like "*true*") {
   Write-Output "OK";
} else {
   Write-Output "ERR";
}
