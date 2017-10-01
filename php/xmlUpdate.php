
<html>
<body>
  added
</body>
<?php
include "config.php";
$xml = simplexml_load_file("db.xml");
echo "<pre>";
var_dump($xml);
echo "</pre>";
//print_r($xml);
$computerNameValue = $_POST['computerNameTextBox'];
$onAdressValue = $_POST['onAdressTextBox'];
$offAdressValue = $_POST['offAdressTextBox'];

$urls = $xml->wolDB;
$newComp = $xml->wolDB->addChild('computer');

$newComp->addChild('name', $computerNameValue);
$newComp->addChild('onAdress', $onAdressValue);
$newComp->addChild('offAdress', $offAdressValue);
?>
<!--
<?php
  /*//include "admin.php";
  include "config.php";

  $computerNameValue = $_POST['computerNameTextBox'];
  $onAdressValue = $_POST['onAdressTextBox'];
  $offAdressValue = $_POST['offAdressTextBox'];
  $computer = new SimpleXMLElement($xmlstr);

  $newComputer = $computer->wolDB[0]->addChild('computer');
  $newComputer->addChild('name', $computerNameValue);
  $newComputer->addChild('onAdress', $onAdressValue);
  $newComputer->addChild('offAdress', $offAdressValue);
*/
?>
-->
</html>
