<?php
$apikey = "####APIKEY####";


$response = file_get_contents("https://www.googleapis.com/youtube/v3/channels?part=statistics&id=".$channelID."&key=".$apikey);
$abozahl = null;
$youtube_response_in_json = json_decode($response, true);
$abozahl = $youtube_response_in_json['items'][0]['statistics']['subscriberCount'];
?>
