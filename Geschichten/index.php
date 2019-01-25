<?php
// Alexas Aufforderung wird entgegengenommen
$jsonRequest = file_get_contents('php://input');
// Alexas Aufforderung wird entschlüsselt
$data        = json_decode($jsonRequest, true);
// Bei einerm Fehlendem Request von Alexa wird das ausgegeben.
if( empty($data) || (!isset($data) ) ) {
	die('Bad Request');
}

$db_link = mysqli_connect('localhost', 'root', '', 'alexaskillyt');

//Falls kein Intent exestiert wird default aufgerufen
$intent = 'default';
switch ($intent) {

	default:
  $db_res = mysqli_query($db_link, "SELECT * FROM geschichten ORDER BY rand() LIMIT 1") or die("Fehler");
  while($row = mysqli_fetch_array($db_res))
  {
    $title = $row['name'];
    $geschichte = $row['geschichte'];
  }
    $text = '<speak>'.$title.'<break time="2s"/>'.$geschichte.'</speak>';
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
