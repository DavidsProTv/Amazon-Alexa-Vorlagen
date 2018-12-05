<?php
require("vendor/autoload.php");
$yt = new YouTubeDownloader();
$yt_key = "#####API KEY#####";

$d = file_get_contents("https://www.googleapis.com/youtube/v3/search?part=snippet&maxResults=1&type=video&q=".$suchesatz."&regionCode=de&key=".$yt_key);
$t = json_encode($d);
$r = json_decode($d, true);
$fileid = $r['items'][0]['id']['videoId'];
if(!file_exists($fileid.'.mp3')){
  $url2 = "https://www.youtube.com/watch?v=".$fileid;
  $links = $yt->getDownloadLinks($url2);
  $url = $links[22]['url'];
  $mp3 = file_get_contents($url);
  file_put_contents($fileid.'.mp3', $mp3);
}

?>
