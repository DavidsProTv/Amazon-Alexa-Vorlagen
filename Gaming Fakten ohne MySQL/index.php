<?php
// Alexas Aufforderung wird entgegengenommen
$jsonRequest = file_get_contents('php://input');
// Alexas Aufforderung wird entschlüsselt
$data        = json_decode($jsonRequest, true);
// Bei einerm Fehlendem Request von Alexa wird das ausgegeben.
if( empty($data) || (!isset($data) ) ) {
	die('Bad Request');
}


$fakten = array("Fakt 1", "Fakt 2", "Fakt 3", "Fakt 4");

//Falls kein Intent exestiert wird default aufgerufen
$intent = 'default';
switch ($intent) {
	default:
    $text = '<speak>'.$fakten[rand(0, count($fakten) - 1)].'</speak>';
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
