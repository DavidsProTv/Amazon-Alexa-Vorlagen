<?php
header('Access-Control-Allow-Origin: *');
echo file_get_contents('befehl.txt');
file_put_contents('befehl.txt', 'nichts');
?>
 
