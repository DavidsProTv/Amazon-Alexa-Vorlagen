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
$intent = !empty($data['request']['intent']['name']) ? $data['request']['intent']['name'] : 'default';
switch ($intent) {

  case 'play':
  file_put_contents('befehl.txt', 'play');
    $responseArray = [ 'version' => '1.0',
        'response' => [
              'outputSpeech' => [
                    'type' => 'SSML',
                    'text' => 'Okej',
                    'ssml' => '<speak>Okej</speak>'
              ],
              'shouldEndSession' => true
        ]
    ];
  break;
  case 'stop':
  file_put_contents('befehl.txt', 'stop');
    $responseArray = [ 'version' => '1.0',
        'response' => [
              'outputSpeech' => [
                    'type' => 'SSML',
                    'text' => 'Okej',
                    'ssml' => '<speak>Okej</speak>'
              ],
              'shouldEndSession' => true
        ]
    ];
  break;
	// Standart
	default:
		$responseArray = [ 'version' => '1.0',
		    'response' => [
		          'outputSpeech' => [
		                'type' => 'SSML',
		                'text' => 'Du öffnest grade den Browser Player! Was kann ich für dich tun?',
		                'ssml' => '<speak>Du öffnest grade den Browser Player! Was kann ich für dich tun?</speak>'
		          ],
              'shouldEndSession' => false
		    ]
		];
		break;
}

header ( 'Content-Type: application/json' );
echo json_encode ( $responseArray );
die();
?>
