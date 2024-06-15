@echo off
::
:: Esempio di invio messaggio WA in Batch
::
:: @Una realizzazione (C) 2023/2024 Verbasoft
:: @Sviluppato da Daniele Piselli <daniele@vebasoft.net>
::

:: wa_device e wa_token sono il numero di telefono e il token del vostro cellulare
:: si trovano nel pannello di gestione del servizio nelle proprietà del dispositivo
:: registrarsi su https://wazone.app per avere un account di prova per 30gg
set wa_device=IL_TUO_NUMERO
set wa_token=IL_TUO_TOKEN

:: numero di telefono del destinatario, ATTENZIONE: 
:: i numeri di telefono devono essere nel formato 393123456789 
:: (preceduti dal prefisso internazionale, '39' x l'italia)
set wa_dest=DESTINATARIO

:: testo da inviare e destinatorio
set wa_text=Invio da BATCH DOS 

curl -s -H "Content-type: application/x-www-form-urlencoded" -d "receiver=%wa_dest%" -d "msgtext=%wa_text%" -d "sender=%wa_device%" -d "token=%wa_token%" -X POST https://api.wazone.app/send
