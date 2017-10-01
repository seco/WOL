<?php
/*
Tout les renseignements sur l'adresses ip de l'esp ainsi que le nom de la page
web qui a pour fonction d'allumer ou d'éteindre l'ordi.
*/
/*
//Nom des ordis
$computerName = array("Routeur","La bete");

//adresses qui declenchent l'allumage
$powerOnAdress = array("192.168.2.1","192.168.1.32");

//adresses qui declenchent l'extinction
$powerOffAdress = array("192.168.2.7","192.168.2.7");
*/
$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
 <wolDB>
   <computer>
     <name>Routeur</name>
     <onAdress>192.168.2.1</onAdress>
     <offAdress>192.168.2.7</offAdress>
   </computer>
   <computer>
     <name>La bete</name>
     <onAdress>192.168.1.32</onAdress>
     <offAdress>192.168.1.32</offAdress>
   </computer>
 </wolDB>


XML;

 ?>
