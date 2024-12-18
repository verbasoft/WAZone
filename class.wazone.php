<?PHP
/*
 * class.wazone.php  (vers. 1.5)
 * Libreria per invio messaggi WA tramite il servizio WAZone
 * funziona con PHP 5/7/8
 *
 * Modifiche:
 * 20230625 - 1.0 creazione della libreria, nessun controllo parametri
 * 20240315 - 1.1 fix minori sui messaggi di ritorno
 * 20240615 - 1.2 fix e aggiornamento
 * 20240714 - 1.5 aggiunta funzione CheckNumber
 *
 * @Copyright (c) 2023/2024 by Verbasoft
 * @Developer by Daniele Piselli <daniele@verbasoft.net>
 *
 */



// classe gestione API WAZone
class WAZone {
  var $sender, $token, $apiurl, $debug;

  # costruttore
  function __construct($sender = null, $token = null, $apiurl = null) {
    $this->debug = false;
    $this->sender = $sender;
    $this->token = $token;
    $this->apiurl = ($apiurl === null) ? 'https://api.wazone.app/' : $apiurl;
    
    // DEBUG VIEW ERROR
    if ($GLOBALS['DEBUG']['status'] ?? false) {
       if ($GLOBALS['DEBUG']['status'] == true) {
          $this->debug = true;
       }
    }
    // DEBUG APIURL
    if ($GLOBALS['DEBUG']['apiurl'] ?? false) {
       $this->apiurl = $GLOBALS['DEBUG']['apiurl'];
    }
    
  }


  // Invia messaggio testuale
  public function SendText($receiver = null, $msgtext = null) {

  $data = [
    'receiver'  => $receiver,
    'msgtext'   => $msgtext,
    'sender'    => $this->sender,
    'token'     => $this->token,
  ];
  $apiurl = $this->apiurl.'/send';

  return WAZone::sendAPI($data, $apiurl);
  }


  // Invia documento multimediale
  public function SendMedia($receiver = null, $mediaurl = null, $msgtext = null) {

  $data = [
    'receiver'  => $receiver,
    'msgtext'   => $msgtext,
    'mediaurl'  => $mediaurl,
    'sender'    => $this->sender,
    'token'     => $this->token,
  ];
  $apiurl = $this->apiurl.'/send';

  return WAZone::sendAPI($data, $apiurl);
  }


  // Controlla numero WA
  public function CheckNumber($receiver = null) {

    $data = [
      'receiver'  => $receiver,
      'sender'    => $this->sender,
      'token'     => $this->token,
    ];
    $apiurl = $this->apiurl.'/isonwa';
  
    return WAZone::sendAPI($data, $apiurl);
    }


  // funzione interna, ritorna versione server WAZone (major, minor, release)
  private function getVers() {
    $vers = [0,0,0];
    $version = @file_get_contents($this->apiurl.'/version.txt');
    $exp = "/[vV](?:ersion)?\s*\K[\d\.]+/";
    if (preg_match($exp, $version, $matches) !== 0) {
       $vers = explode('.', $matches[0]);
    }
    return $vers;
  }


  // funzione interna, invio API
  private function sendAPI($data, $apiurl) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_URL, $apiurl);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);

    $return = json_decode($response);
    if ($this->debug) { print "DEBUG => $response\n"; }
    return $return;
  }

}       // end class

?>
