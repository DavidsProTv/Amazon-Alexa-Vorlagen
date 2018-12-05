<?php
// Alexas Aufforderung wird entgegengenommen
$jsonRequest = file_get_contents('php://input');
// Alexas Aufforderung wird entschlüsselt
$data        = json_decode($jsonRequest, true);
// Bei einerm Fehlendem Request von Alexa wird das ausgegeben.
if( empty($data) || (!isset($data) ) ) {
	die('Bad Request');
}
 

//Falls kein Intent exestiert wird default aufgerufen
$intent = 'default';
switch ($intent) {

	default:
  $moeglichkeiten = array("Schere", "Stein", "Papier");
    $text = '<speak>3 <break time="1s"/> 2 <break time="1s"/> 1 <break time="1s"/> '.$moeglichkeiten[rand(0, count($moeglichkeiten) - 1)].'</speak>';
		$responseArray = [ 'version' => '1.0',
		    'response' => [
		          'outputSpeech' => [
		                'type' => 'SSML',
		                'text' => $text,
		                'ssml' => $text
		          ],
              'shouldEndSession' => true
		    ]
		];
		break;
}
//Macht die Datei zu einer Json Datei
header ( 'Content-Type: application/json' );
//Gibt den Code aus
echo json_encode ( $responseArray );
//beendet die Datei
die();
?>
