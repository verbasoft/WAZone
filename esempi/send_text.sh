#!/bin/bash
##
## Esempio di invio messaggio WA in Batch
##
## @Una realizzazione (C) 2023/2024 Verbasoft
## @Sviluppato da Daniele Piselli <daniele@vebasoft.net>
##

## wa_device e wa_token sono il numero di telefono e il token del vostro cellulare
## si trovano nel pannello di gestione del servizio nelle proprietà del dispositivo
## registrarsi su https://wazone.app per avere un account di prova per 30gg
wa_device='IL_TUO_NUMERO'
wa_token='IL_TUO_TOKEN'

## numero di telefono del destinatario, ATTENZIONE: 
## i numeri di telefono devono essere nel formato 393123456789 
## (preceduti dal prefisso internazionale, '39' x l'italia)
wa_dest='DESTINATARIO'

## Messaggio
wa_text='Prova invio da Bash Linux!'

# Set the URL to send the request to
url='https://api.wazone.app/send'

curl -H "Content-type: application/x-www-form-urlencoded" \
     -d "receiver=$wa_dest" \
     -d "msgtext=$wa_text" \
     -d "sender=$wa_device" \
     -d "token=$wa_token" \
     -X POST \
     https://api.wazone.app/send
