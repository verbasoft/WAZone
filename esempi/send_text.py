##
## Esempio di invio messaggio WA in Python
##
## @Una realizzazione (C) 2023/2024 Verbasoft
## @Sviluppato da Daniele Piselli <daniele@verbasoft.net>
##
##
## installare il modulo 'requests' digitando #>pip3 install requests
##

## wa_device e wa_token sono il numero di telefono e il token del vostro cellulare
## si trovano nel pannello di gestione del servizio nelle proprietà del dispositivo
## registrarsi su https://wazone.app per avere un account di prova per 30gg
wa_device = 'IL_TUO_NUMERO'
wa_token = 'IL_TUO_TOKEN'

## numero di telefono del destinatario, ATTENZIONE:
## i numeri di telefono devono essere nel formato 393123456789
## (preceduti dal prefisso internazionale, '39' x l'italia)
wa_dest='DESTINATARIO'

## Messaggio
wa_text = 'Invio messaggio da Python!'


# importing the requests library
import requests

## preparazione parametri POST
data = {'receiver': wa_dest,
        'msgtext': wa_text,
        'sender': wa_device,
        'token': wa_token}

# chiamata RestAPI POST
ret = requests.post(url='https://api.wazone.app/send', data=data)

# extracting response text
#val = ret.text
#print("%s" %val)
