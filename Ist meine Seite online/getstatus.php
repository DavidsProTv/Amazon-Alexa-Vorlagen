<?php
$host = 'google.com';
$statusofsite = null;
if($socket =@ fsockopen($host, 80, $errno, $errstr, 30)) {
$statusofsite = "online.";
fclose($socket);
} else {
$statusofsite=  'offline.';
}

?>
