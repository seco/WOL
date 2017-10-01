<?php
include "config.php";
  //get the selected list item
  $selectedComputer = $_POST['computerName'];
  //instance of the xml DB
  $data = new SimpleXMLElement($xmlstr);
  //get the parent of the selectedComputer name with xpath
  $nodes = $data->xpath('//wolDB/computer/name[.="'. $selectedComputer .'"]/parent::*');
  $result = $nodes[0];
  $adress = $result->offAdress;

  exec("ping -c 3 $adress", $output, $status);
  //echo "$status";
  if($status == "0"){
    echo "computer is on";
    $state = "power off";
  }
  elseif($status == "1" OR $status =="2"){
    echo "computer is off";
    $state = "power on";
  }
  else{
    echo "no status";
    $state = "power on";
  }

 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <meta charset="utf-8" />
         <title>wake on lan</title>
     </head>
     <body>
       <h2>WOL server</h2>
       <div>
         <form>
          <input type="button" value="dzd" onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />
         </form>
       </div>
     </body>
 </html>
