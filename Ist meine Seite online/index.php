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
  require("getstatus.php");
    $text = "Deine Webseite ist derzeit ".$statusofsite;
		$responseArray = [ 'version' => '1.0',
		    'response' => [
		          'outputSpeech' => [
		                'type' => 'PlainText',
		                'text' => $text,
		                'ssml' => null
		          ],
              'shouldEndSession' => false
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
