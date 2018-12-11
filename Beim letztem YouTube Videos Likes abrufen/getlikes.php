<?php
$apikey = "###API KEY###";
$likes = null;
$videoid = null;
$response = file_get_contents("https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=".$channelID."&maxResults=1&type=video&key=".$apikey);
$youtube_response_in_json = json_decode($response, true);
$videoid = $youtube_response_in_json['items'][0]['id']['videoId'];
$response2 = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics&id=".$videoid."&key=".$apikey);
$youtube_response2_in_json = json_decode($response2, true);
$likes = $youtube_response2_in_json['items'][0]['statistics']['likeCount'];
?>
