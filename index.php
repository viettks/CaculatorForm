<?php 
require_once('Caculator.php');
require_once('Print.php');
$cal = new Caculator();
$print = new Printer();
echo $cal->getForm($print);

?>