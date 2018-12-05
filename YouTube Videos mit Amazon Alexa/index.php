<?php
// Get Alexa Request
$jsonRequest = file_get_contents('php://input');

// Decode the Request
$data        = json_decode($jsonRequest, true);

// Abort when Empty
if( empty($data) || (!isset($data) ) ) {
	die('Bad Request');
}
$intent = !empty($data['request']['intent']['name']) ? $data['request']['intent']['name'] : 'default';
switch ($intent) {


    case 'AMAZON.StopIntent':
      $responseArray = [ 'version' => '1.0',
          'response' => [
                'outputSpeech' => [
                      'type' => 'SSML',
                      'text' => 'Bye',
                      'ssml' => '<speak>Bye</speak>'
                ],
								'directives' => array( 0 => [
											'type' => 'AudioPlayer.Stop',
								]),
                'shouldEndSession' => true
          ]
      ];
      break;

			case 'anhalten':
	      $responseArray = [ 'version' => '1.0',
	          'response' => [
	                'outputSpeech' => [
	                      'type' => 'SSML',
	                      'text' => 'Musik wurde gestoppt',
	                      'ssml' => '<speak>Musik wurde gestoppt</speak>'
	                ],
									'directives' => array( 0 => [
												'type' => 'AudioPlayer.Stop',
									]),
	                'shouldEndSession' => true
	          ]
	      ];
	      break;

				case 'nach':
				$suchesatz = !empty($data['request']['intent']['slots']['videoQuerie']['value']) ? $data['request']['intent']['slots']['videoQuerie']['value'] : 'default';;
				$fileid = "";
				$url = "";
				$url2 = "";
				require("Youtube/index.php");
				$fileid = $fileid;
				$responseArray = [ 'version' => '1.0',
		  		    'response' => [
		                    'directives' => array( 0 => [
		                          'type' => 'AudioPlayer.Play',
		                          'playBehavior' => 'REPLACE_ALL',
		                          'audioItem' => [
																'stream' => [
																	'token' => $fileid,
																	'url' => '########DEINE WEBSEITE########'.$fileid.'.mp3',
																	'offsetInMilliseconds' => 0
																]
															]
		                    ]),
				                'shouldEndSession' => true
		  		    ]
		  		];
		  	  break;

	// Default
	default:
		$responseArray = [ 'version' => '1.0',
		    'response' => [
		          'outputSpeech' => [
		                'type' => 'PlainText',
		                'text' => "Willkommen beim Musik Skill",
		                'ssml' => null
		          ],
              'shouldEndSession' => true
		    ]
		];
		break;
}

header ( 'Content-Type: application/json' );
echo json_encode ( $responseArray , JSON_PRETTY_PRINT);
die();
?>
