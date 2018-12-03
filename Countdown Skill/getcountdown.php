<?php
//Gib den Endzeitpunkt an!
$endTime = mktime(0, 0, 0, 12, 24, 2018); //Stunde, Minute, Sekunde, Monat, Tag, Jahr;

$timeNow = microtime(true);

//Berechnet differenz von der Endzeit vom jetzigen Zeitpunkt aus.
$diffTime = $endTime - $timeNow;

$milli = explode(".", round($diffTime, 2));
$millisec = round($milli[1]);

//Berechnung für Tage, Stunden, Minuten
$tag = floor($diffTime / (24*3600));
$diffTime = $diffTime % (24*3600);
$stunden = floor($diffTime / (60*60));
$diffTime = $diffTime % (60*60);
$min = floor($diffTime / 60);
$sec = $diffTime % 60;

$noch = "";
if($tag != 0){
  $noch .= $tag." Tage ";
}else if($houre != 0){
  $noch .= $houre." Stunden ";
}else if($min != 0){
  $noch .= $min." Minuten ";
}else if($sec != 0){
  $noch .= $sec." Sekunden ";
}else{
  $noch .= "0 Sekunden";
}

?>
